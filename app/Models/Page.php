<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title_fr', 'title_en',
        'meta_title_fr', 'meta_title_en',
        'meta_description_fr', 'meta_description_en',
        'content_fr', 'content_en',
        'cover_image', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
