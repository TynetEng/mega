<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Blog extends Model
{
    use HasFactory, Searchable;

    public function searchableAs()
    {
        return "blogs";
    }
    protected $fillable = [
        'id',
        'title',
        'content',
        'image',
        'time',
        'view',
        'user_id',
    ];
}
