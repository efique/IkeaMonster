<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'promotion'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
