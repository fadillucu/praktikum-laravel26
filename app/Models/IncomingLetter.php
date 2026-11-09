<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingLetter extends Model
{
    protected $fillable = [
        'tanggal',
        'pengirim',
        'keterangan'
    ];
}
