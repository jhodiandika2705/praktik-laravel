<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutgoingLetter extends Model
{
    protected $table = 'outgoing_letters';

    protected $fillable = [
        'nomor surat',
        'tanggal',
        'perihal',
        'keterangan',
    ];
}