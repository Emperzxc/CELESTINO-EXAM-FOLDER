<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
    ];

    public function albums()
    {
        return $this->hasMany(Album::class, 'name', 'name');
    }
}
