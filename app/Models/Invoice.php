<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'filename',
        'original_name',
        'number',
        'file_path',
    ];
}
