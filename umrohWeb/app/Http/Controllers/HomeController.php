<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Faq;
use App\Models\Banner;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::first(); // Ambil banner pertama
        $packages = Package::latest()->get(); // Semua paket, urut terbaru
        $faqs = Faq::latest()->get(); // Semua FAQ
        $contact = Contact::first(); // Informasi kontak

        return view('home', compact('banner', 'packages', 'faqs', 'contact'));
    }
}