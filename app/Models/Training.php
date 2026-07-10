<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title_fr', 'description_fr', 'level',
        'mode', 'duree', 'price', 'cover_image', 'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function enrollments()
    {
        return $this->hasMany(TrainingEnrollment::class);
    }
}
