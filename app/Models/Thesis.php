<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $table = 'thesis'; // Add this line


    protected $fillable = [
        'plagiarized',
        'thesis_title',
        'thesis_file',
        'thesis_course',
        'abstract',
        'user_id',
    ];
    // Thesis.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
