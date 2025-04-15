<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    public function posts()
    {
        return $this->hasMany(post::class);
    }

    protected $fillable = [
        'title',
        'body',
    ];
    use HasFactory;
}
