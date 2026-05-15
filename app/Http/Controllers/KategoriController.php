<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // Load with tasks count
        $categories = Kategori::withCount('tugas')->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'color' => 'nullable|string|max:50',
        ]);

        Kategori::create([
            'nama' => $request->nama,
            'color' => $request->color ?? 'indigo',
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
