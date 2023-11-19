<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'books';
    protected $fillable = [
        'id', 'bookName','author_id','price','image','description','category_id'
    ];
}
