<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactStat extends Model
{
    use HasFactory;

    protected $fillable = ['label_fr', 'label_en', 'value', 'icon', 'order'];
}
