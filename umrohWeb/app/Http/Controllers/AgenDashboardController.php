<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

class AgenDashboardController extends Controller
{
    /**
     * Tampilkan daftar konsultasi untuk agen.
     */
    public function index()
    {
        // Ambil semua konsultasi (tanpa relasi user)
        $konsultasis = Consultation::latest()->get();
        return view('agen.dashboard', compact('konsultasis'));
    }

    /**
     * Update status konsultasi.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,responded,not_responded'
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => $request->status]);

        return back()->with('success', 'Status konsultasi berhasil diperbarui!');
    }
}