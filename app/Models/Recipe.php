<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'id' => 'string'
    ];

    public function category()
    {
        // return $this->hasOne(Category::class);
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);   
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
