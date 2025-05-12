<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acc extends Model
{
    use HasFactory;
     protected $table = 'accs';

    protected $fillable = [
        'acc',
        'alasan',
    ];

    /**
     * Relasi ke model Surat
     */
    public function surat()
{
    return $this->belongsTo(Surat::class, 'surat_id');
}
}
