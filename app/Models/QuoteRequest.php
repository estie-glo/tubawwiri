<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'organisation', 'email', 'telephone', 'pays',
        'service_souhaite', 'budget_estimatif', 'delai',
        'description_besoin', 'status',
    ];
}
