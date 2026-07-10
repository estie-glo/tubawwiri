<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'email', 'telephone', 'montant', 'moyen_paiement',
        'type_don', 'provider_reference', 'status',
    ];
}
