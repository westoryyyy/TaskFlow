<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline',
        'kategori_id',
        'waktu_reminder',
        'status_aktif',
        'is_selesai',
    ];

    protected $casts = [
        'deadline' => 'date',
        'waktu_reminder' => 'date',
        'is_selesai' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
