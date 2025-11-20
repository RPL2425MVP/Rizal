<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    // === HALAMAN PUBLIK ===
    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('packages.show', compact('package'));
    }

    // === DASHBOARD ADMIN (CRUD) ===
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'durasi' => 'required|string|max:100',
            'fasilitas' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Package::create($request->all());

        return redirect()->route('packages.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'durasi' => 'required|string|max:100',
            'fasilitas' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return back()->with('success', 'Paket berhasil dihapus!');
    }
}// PackageController@store
$request->validate([
    'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
]);

if ($request->hasFile('gambar')) {
    $path = $request->file('gambar')->store('packages', 'public');
    $package->gambar = basename($path);
}