<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'branch_id',
        'price',
        'images'
    ];

    protected $casts = [
        'images' => 'json'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
