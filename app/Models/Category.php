<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relația cu știrile (one-to-many)
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
