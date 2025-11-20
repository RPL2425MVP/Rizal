<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'pesan' => 'required|string|max:1000',
        ]);

        // Simpan ke database
        $consultation = Consultation::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'pesan' => $request->pesan,
            'tanggal' => now()->toDateString(),
        ]);

        // Kirim notifikasi ke Telegram
        $this->kirimNotifikasiTelegram($consultation);

        return back()->with('success', 'Terima kasih! Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }

    private function kirimNotifikasiTelegram($consultation)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        // Jika belum setup Telegram, lewati
        if (!$token || !$chatId) {
            return;
        }

        $text = "🔔 *Konsultasi Umroh Baru*\n\n" .
                "Nama: {$consultation->nama}\n" .
                "Email: {$consultation->email}\n" .
                "No HP: {$consultation->no_hp}\n" .
                "Pesan: {$consultation->pesan}\n" .
                "Tanggal: {$consultation->tanggal}";

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'Markdown'
        ]);
    }
}