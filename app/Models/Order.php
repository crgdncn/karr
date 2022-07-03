<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = [
        'key_id',
        'technician_id',
        'vehicle_id'
    ];

    protected $with = [
        'key',
        'vehicle',
        'technician'
    ];

    public static function boot() {

        parent::boot();

        static::creating(function($order) {
            // I added this as it makes sense to me - not part of the requirement
            // auto generate some kind of order number at order creation
            // for demo purposes, I am using a UUID
            if (!$order->order_number) {
                $order->order_number = Str::uuid()->toString();
            }
        });
    }

    public function key(): BelongsTo
    {
        return $this->belongsTo(Key::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class);
    }
}
