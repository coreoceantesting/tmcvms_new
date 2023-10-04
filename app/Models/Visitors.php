<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 
        'mobile', 
        'organization', 
        'purpose_of_visit', 
        'visiting_dept',
        'to_visit',
        'pass_id',
        'entry_datetime',
        'exit_datetime'
    ];
}
