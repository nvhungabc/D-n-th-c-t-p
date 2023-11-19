<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reviews extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'id', 'user_id', 'book_id', 'comment'
    ];
}
