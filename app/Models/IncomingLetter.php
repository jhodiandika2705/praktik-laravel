<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncomingLetter extends Model
{
    protected $table = 'incoming_letters';

    protected $fillable = [
        'nomor surat',
        'tanggal',
        'pengirim',
        'perihal',
        'keterangan',
        'category_id',
        'lampiran',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
