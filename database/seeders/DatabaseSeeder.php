<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Tugas;
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
        $katKuliah = Kategori::create([
            'nama' => 'Kuliah',
            'color' => 'indigo',
        ]);

        $katOrganisasi = Kategori::create([
            'nama' => 'Organisasi',
            'color' => 'emerald',
        ]);

        $katHobi = Kategori::create([
            'nama' => 'Hobi',
            'color' => 'amber',
        ]);

        // 3. Buat Contoh Tugas
        Tugas::create([
            'judul' => 'Tugas Pemrograman Web',
            'deskripsi' => 'Mengerjakan CRUD Laravel dengan MySQL',
            'deadline' => now()->addDays(3),
            'kategori_id' => $katKuliah->id,
            'status_aktif' => 'aktif',
            'is_selesai' => false,
        ]);

        Tugas::create([
            'judul' => 'Rapat Koordinasi Event',
            'deskripsi' => 'Rapat via Zoom jam 7 malam',
            'deadline' => now()->addDays(1),
            'kategori_id' => $katOrganisasi->id,
            'status_aktif' => 'aktif',
            'is_selesai' => false,
        ]);

        Tugas::create([
            'judul' => 'Lari Sore di Lapangan',
            'deskripsi' => 'Min. 5km biar sehat',
            'deadline' => now()->addHours(5),
            'kategori_id' => $katHobi->id,
            'status_aktif' => 'aktif',
            'is_selesai' => true,
        ]);
    }
}
