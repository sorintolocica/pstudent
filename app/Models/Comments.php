<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'username',
        'content',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
