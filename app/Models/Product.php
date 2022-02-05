<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'img', 'price', 'name', 'promotion', 'category', 'color'
    ];

    /**
     * The roles that belong to the user.
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }

    /**
     * Get the post that owns the comment.
     */
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
