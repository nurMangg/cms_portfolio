<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'part_of',
        'file_upload',
        'url',
        'description'
    ];

    protected $table = 'portfolio';
}
