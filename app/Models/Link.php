<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'token',
        'expires'
    ];

    public function scopeActual($query)
    {
        return $query->where('expires', '>=', now());
    }
}
