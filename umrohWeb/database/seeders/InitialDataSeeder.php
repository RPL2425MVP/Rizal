<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Package;
use App\Models\Faq;
use App\Models\Banner;
use App\Models\Contact;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        // Users
        User::create([
            'name' => 'Admin Umroh',
            'email' => 'admin@umroh.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'no_hp' => '081234567890'
        ]);

        User::create([
            'name' => 'Agen Haji',
            'email' => 'agen@umroh.com',
            'password' => bcrypt('password'),
            'role' => 'agen',
            'no_hp' => '082345678901'
        ]);

        // Package
        Package::create([
            'nama_paket' => 'Umroh Reguler 9 Hari',
            'harga' => 25000000,
            'durasi' => '9 Hari',
            'fasilitas' => 'Hotel bintang 4 di Mekah & Madinah, Transportasi, Makan 3x sehari, Visa, Guide',
            'deskripsi' => 'Paket umroh terjangkau dengan pelayanan lengkap dan profesional.'
        ]);

        // FAQ
        Faq::create([
            'pertanyaan' => 'Apakah perlu visa?',
            'jawaban' => 'Ya, semua jemaah harus memiliki visa umroh yang dikeluarkan oleh Konsulat Arab Saudi.'
        ]);

        Faq::create([
            'pertanyaan' => 'Berapa lama proses pengurusan?',
            'jawaban' => 'Proses pengurusan visa dan dokumen memakan waktu sekitar 4-6 minggu sebelum keberangkatan.'
        ]);

        // Banner
        Banner::create([
            'judul_banner' => 'Rencanakan Umroh Impian Anda!',
            'gambar' => 'banner.jpg',
            'keterangan' => 'Paket terjangkau, pelayanan profesional, panduan berpengalaman'
        ]);

        // Contact
        Contact::create([
            'telepon' => '+6281234567890',
            'email' => 'info@umroh.com',
            'instagram' => '@umrohofficial',
            'facebook' => 'fb.com/umrohofficial',
            'alamat' => 'Jl. Haji No. 123, Jakarta Pusat'
        ]);
    }
}