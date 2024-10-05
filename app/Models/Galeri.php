<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'file',
        'judul',
        'deskripsi',
        'tgl_upload',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
