<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'album',
        'sales',
        'image',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'name', 'name');
    }
}
