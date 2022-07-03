<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Key extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    protected $casts = [
        'price' => 'int'
    ];

    public function orders (): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
