<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = [
        'year',
        'make',
        'model',
        'vin',
    ];

    public function keys(): BelongsToMany
    {
        return $this->belongsToMany(Key::class);
    }


    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
