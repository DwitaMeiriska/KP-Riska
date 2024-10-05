<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrincipalProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'foto',
        'visi',
        'misi',
        'bio',
        'telepon',
        'email',
        'nip',
        'riwayat_pendidikan'
    ];
}
