<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $table = 'thesis'; // Add this line


    protected $fillable = [
        'thesis_title',
        'thesis_file',
        'thesis_course',
        'abstract',
    ];
}
