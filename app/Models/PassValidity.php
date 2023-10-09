<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassValidity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'no_of_days',
        'is_delete',
    ];
}
