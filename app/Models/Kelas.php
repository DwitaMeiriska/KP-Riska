<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nisn',
        'kelas',
        'namaOrangTua',
        'noTelpOrangTua',
        'guru_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'user_id');
        // return $this->belongsTo(User::class);
    }
}
