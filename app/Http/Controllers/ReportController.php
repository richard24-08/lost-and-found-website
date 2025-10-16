<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    //Tampilkan daftar laporan
    public function index()
    {
        $reports = Report::latest()->get();
        return view('dashboard', compact('reports'));
    }

    //Form tambah report baru
    public function create()
    {
        return view('reportnewitem');
    }

    //Simpan report baru
    public function store(Request $request)
    {
        $request->validate([
            'reporter_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'time_found' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reports', 'public');
        }

        Report::create([
            'reporter_name' => $request->reporter_name,
            'location' => $request->location,
            'condition' => $request->condition,
            'time_found' => $request->time_found,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Report berhasil dikirim!');
    }

    //Form edit report
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('reportedit', compact('report'));
    }

    //Update report
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'reporter_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'time_found' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        // $report = Report::findOrFail($id);

        $imagePath = $report->image_path;
        if ($request->hasFile('image')) {
            if ($report->image_path) {
                Storage::disk('public')->delete($report->image_path);
            }
            $imagePath = $request->file('image')->store('reports', 'public');
        }

        $report->update([
            'reporter_name' => $request->reporter_name,
            'location' => $request->location,
            'condition' => $request->condition,
            'time_found' => $request->time_found,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Report berhasil diperbarui!');
    }

    //Hapus report
    public function destroy(Request $request, Report $report)
    {
        // $report = Report::findOrFail($id);
        if ($report->image_path) {
            Storage::disk('public')->delete($report->image_path);
        }
        $report->delete();

        return redirect()->route('dashboard')->with('success', 'Report berhasil dihapus!');
    }
}