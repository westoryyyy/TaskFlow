<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function dashboard(Request $request)
    {
        // Total tugas yang aktif (belum selesai) milik user yang login
        $totalTugas = Tugas::where('user_id', userId())->where('is_selesai', false)->count();
        $selesai = Tugas::where('user_id', userId())->where('is_selesai', true)->count();
        $mendekatiDeadline = Tugas::where('user_id', userId())
            ->where('is_selesai', false)
            ->whereNotNull('deadline')
            ->where('deadline', '<=', now()->addDays(3))
            ->count();
            
        $tugasList = Tugas::with('kategori')
            ->where('user_id', userId())
            ->where('is_selesai', false)
            ->orderBy('deadline', 'asc')
            ->get();

        // Ambil riwayat tugas yang sudah selesai (limit 5 per halaman) milik user yang login
        $tugasSelesaiList = Tugas::with('kategori')
            ->where('user_id', userId())
            ->where('is_selesai', true)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        return view('dashboard', compact('totalTugas', 'selesai', 'mendekatiDeadline', 'tugasList', 'tugasSelesaiList'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('tugas.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'deadline' => 'nullable|date',
            'waktu_reminder' => 'nullable|date',
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'kategori_id' => $request->kategori_id,
            'waktu_reminder' => $request->waktu_reminder,
            'status_aktif' => $request->status_aktif ?? 'aktif',
            'is_selesai' => false,
            'user_id' => userId(),
        ]);

        return redirect('/dashboard')->with('success', 'Tugas baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $tugas = Tugas::with('kategori')->where('user_id', userId())->findOrFail($id);
        return view('tugas.show', compact('tugas'));
    }

    public function edit($id)
    {
        $tugas = Tugas::where('user_id', userId())->findOrFail($id);
        $kategoris = Kategori::all();
        return view('tugas.edit', compact('tugas', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'deadline' => 'nullable|date',
            'waktu_reminder' => 'nullable|date',
        ]);

        $tugas = Tugas::where('user_id', userId())->findOrFail($id);
        
        $tugas->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'kategori_id' => $request->kategori_id,
            'waktu_reminder' => $request->waktu_reminder,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect("/tugas/$id")->with('success', 'Perubahan berhasil disimpan, Paw!');
    }

    public function selesai($id)
    {
        $tugas = Tugas::where('user_id', userId())->findOrFail($id);
        $tugas->update(['is_selesai' => true]);
        
        return redirect('/dashboard')->with('success', 'Mantap! Tugas berhasil diselesaikan.');
    }

    public function destroy($id)
    {
        $tugas = Tugas::where('user_id', userId())->findOrFail($id);
        $tugas->delete();

        return redirect('/dashboard')->with('success', 'Tugas berhasil dihapus.');
    }
}
