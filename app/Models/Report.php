<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title_fr', 'type', 'summary_fr',
        'file_path', 'cover_image', 'published_on', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_on' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
