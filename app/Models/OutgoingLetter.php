<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutgoingLetter extends Model
{
    protected $table = 'outgoing_letters';

    protected $fillable = [
        'nomor surat',
        'tanggal',
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
