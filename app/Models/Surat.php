<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'kode_surat',
        'tanggal_surat',
        'no_surat',
        'file_surat',
        'status'
    ];
}
