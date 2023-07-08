<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url_img',
        'status',
    ];

    // -----------------------------------------------------------------------------------------------------------------
    // @ Scope Functions
    // -----------------------------------------------------------------------------------------------------------------
    public function scopeSearch($query, $search)
    {
        if ($search)
            return $query->where('title', 'LIKE', "%$search%");
    }
}
