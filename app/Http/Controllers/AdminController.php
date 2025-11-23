<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Data statistik dari tabel users dan reports
        $totalUsers = User::count();
        $totalReports = Report::count();
        
        // Statistik berdasarkan report_type (kita tidak punya kolom status/resolved)
        $lostReports = Report::where('report_type', 'lost')->count();
        $foundReports = Report::where('report_type', 'found')->count();
        
        // Data untuk chart reports over time
        $reportsOverTime = Report::select(
            DB::raw('DATE(COALESCE(time_lost, time_found, created_at)) as date'),
            DB::raw('COUNT(*) as count')
        )
        ->where(function($query) {
            $query->whereNotNull('time_lost')
                ->orWhereNotNull('time_found')
                ->orWhere('created_at', '>=', now()->subDays(30));
        })
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        
        // Data untuk pie chart (categories)
        $reportCategories = Report::select(
                'category',
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('category')
            ->get();
        
        // Recent reports
        $recentReports = Report::with(['reporter', 'finder'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Top reporters
        $topReporters = User::select('users.id', 'users.name', DB::raw('COUNT(reports.id) as report_count'))
            ->leftJoin('reports', 'users.name', '=', 'reports.reporter_name')
            ->groupBy('users.id', 'users.name')
            ->orderBy('report_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalUsers',
            'totalReports', 
            'lostReports',
            'foundReports',
            'reportsOverTime',
            'reportCategories',
            'recentReports',
            'topReporters'
        ));
    }

    public function userList()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('userlist', compact('users'));
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            
            // Cek jika user mencoba menghapus diri sendiri
            if ($user->id === Auth::id()) {
                return redirect()->route('admin.users')->with('error', 'You cannot delete your own account.');
            }
            
            // Hapus laporan yang terkait dengan user ini
            Report::where('reporter_name', $user->name)->delete();
            
            $user->delete();
            
            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }

}