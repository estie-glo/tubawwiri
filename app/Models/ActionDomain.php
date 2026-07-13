<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionDomain extends Model
{
    use HasFactory;

protected $fillable = [
    'slug', 'title_fr', 'title_en', 'icon',
    'summary_fr', 'summary_en',
    'enjeux_fr', 'enjeux_en',
    'objectifs_fr', 'objectifs_en',
    'actions_fr', 'actions_en',
    'publics_cibles_fr', 'publics_cibles_en',
    'resultats_attendus_fr', 'resultats_attendus_en',
    'appel_partenariat_fr', 'appel_partenariat_en',
    'cover_image', 'order', 'is_published',
];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
