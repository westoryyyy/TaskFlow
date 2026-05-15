<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User Default
        $user = User::factory()->create([
            'name' => 'Paulina',
            'email' => 'paulina@example.com',
            'status_akademik' => 'Mahasiswa Aktif',
        ]);

        // 2. Buat Kategori
        $katKuliah = \App\Models\Kategori::create([
            'nama' => 'Kuliah',
            'color' => 'indigo',
        ]);

        $katOrganisasi = \App\Models\Kategori::create([
            'nama' => 'Organisasi',
            'color' => 'emerald',
        ]);

        $katHobi = \App\Models\Kategori::create([
            'nama' => 'Hobi',
            'color' => 'amber',
        ]);

        // 3. Buat Contoh Tugas
        \App\Models\Tugas::create([
            'judul' => 'Tugas Pemrograman Web',
            'deskripsi' => 'Mengerjakan CRUD Laravel dengan MySQL',
            'deadline' => now()->addDays(3),
            'kategori_id' => $katKuliah->id,
            'status_aktif' => 'aktif',
            'is_selesai' => false,
        ]);

        \App\Models\Tugas::create([
            'judul' => 'Rapat Koordinasi Event',
            'deskripsi' => 'Rapat via Zoom jam 7 malam',
            'deadline' => now()->addDays(1),
            'kategori_id' => $katOrganisasi->id,
            'status_aktif' => 'aktif',
            'is_selesai' => false,
        ]);

        \App\Models\Tugas::create([
            'judul' => 'Lari Sore di Lapangan',
            'deskripsi' => 'Min. 5km biar sehat',
            'deadline' => now()->addHours(5),
            'kategori_id' => $katHobi->id,
            'status_aktif' => 'aktif',
            'is_selesai' => true,
        ]);
    }
}
