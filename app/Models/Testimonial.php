<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'role', 'content_fr', 'photo', 'is_published'];

    protected $casts = ['is_published' => 'boolean'];
}
