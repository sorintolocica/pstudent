<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
