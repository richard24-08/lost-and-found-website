<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Dashboard + Search fitur
    public function index(Request $request)
    {
        $search = $request->input('search');

        $reports = Report::when($search, function($query, $search) {
                $query->where('item_name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('home', compact('reports', 'search'));
    }

    // Form tambah laporan
    public function create()
    {
        return view('reportnewitem');
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'reporter_name' => 'required|string|max:255',
            'finder_name' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'last_seen' => 'required|string|max:255',
            'time_lost' => 'nullable|date',
            'time_found' => 'nullable|date',
            'description' => 'required',
            'category' => 'required|string|max:100',
            'brand' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'report_type' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3000',
        ]);

        // Validasi conditional berdasarkan report_type
        if ($request->report_type === 'lost' && !$request->time_lost) {
            return back()->withErrors(['time_lost' => 'Waktu kehilangan harus diisi untuk laporan kehilangan.']);
        }
        
        if ($request->report_type === 'found' && !$request->time_found) {
            return back()->withErrors(['time_found' => 'Waktu penemuan harus diisi untuk laporan penemuan.']);
        }

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);

        $imagePath = $imageName;

        Report::create([
            'item_name' => $request->item_name,
            'reporter_name' => $request->reporter_name,
            'finder_name' => $request->finder_name ?? 'Not Applicable', // ⬅️ INI YANG DIPERBAIKI
            'location' => $request->location,
            'last_seen' => $request->last_seen,
            'time_lost' => $request->time_lost,
            'time_found' => $request->time_found ?? null,
            'description' => $request->description,
            'category' => $request->category,
            'brand' => $request->brand,
            'size' => $request->size,
            'color' => $request->color,
            'report_type' => $request->report_type,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('home')->with('success', 'Laporan berhasil dibuat!');
    }

    // Detail laporan (menggunakan route model binding)
    public function show(Report $report)
    {
        // Ambil user berdasarkan reporter_name (pemilik asli)
        $user = User::where('name', $report->reporter_name)->first();
        
        // ✅ AMBIL USER BERDASARKAN finder_name (yang menemukan)
        $finderUser = User::where('name', $report->finder_name)->first();

        return view('itemdetail', compact('report', 'user', 'finderUser'));
    }

    // Hapus laporan
    public function destroy(Report $report)
    {
        if ($report->image_path) {
            Storage::disk('public')->delete($report->image_path);
        }

        $report->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus');
    }

    // Laporan milik user login - DIPERBAIKI
    public function myReports()
    {
        $user = Auth::user();
        
        // Ambil reports yang berhubungan dengan user yang login
        // Baik sebagai reporter (pelapor) maupun finder (penemu)
        $reports = Report::where('reporter_name', $user->name)
                    ->orWhere('finder_name', $user->name)
                    ->latest()
                    ->get();

        return view('myreport', compact('reports'));
    }

    // Halaman semua laporan
    public function viewAllReports()
    {
        $reports = Report::latest()->get();
        return view('viewallreports', compact('reports'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'time_found' => 'required|date',
            'finder_name' => 'required|string|max:255',
        ]);

        $report->update([
            'location' => $request->location,
            'time_found' => $request->time_found,
            'finder_name' => $request->finder_name,
            'report_type' => 'found',
        ]);

        return response()->json([
            'success' => true, 
            'message' => 'Item status updated to found!'
        ]);
    }
}