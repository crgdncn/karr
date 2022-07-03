<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technician extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = [
        'first_name',
        'last_name',
        'truck_number',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
