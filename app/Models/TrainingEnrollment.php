<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id', 'nom', 'email', 'telephone', 'pays',
        'niveau', 'mode', 'status',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
