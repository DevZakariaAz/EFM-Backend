<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's naming conventions)
    protected $table = 'apprenants';

    // Define fillable attributes for mass assignment
    protected $fillable = ['name', 'is_active'];

    // Cast attributes to correct data types
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
