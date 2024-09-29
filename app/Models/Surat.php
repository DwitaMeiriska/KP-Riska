<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    // protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    protected $fillable = [
        'id_surat',
        'user_id',
        'kode_surat',
        'judul',
        'tujuan',
        'pengirim',
        'tanggal_surat',
        'no_surat',
        'jenis_surat',
        'file_surat',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
