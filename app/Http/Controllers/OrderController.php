<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderController extends Controller
{
    public function index(Request $request)//: JsonResource
    {
        $query = Order::query()->with(['key', 'vehicle', 'technician']);

        if ($vehicleId = $request->input('vehicle_id')) {
            $query->where('vehicle_id', $vehicleId);
        }

        if ($keyId = $request->input('key_id')) {
            $query->where('key_id', $keyId);
        }

        if ($technicianId = $request->input('technician_id')) {
            $query->where('technician_id', $technicianId);
        }

        return OrderResource::collection(
            $query->get()
        );
    }

    public function store(Request $request)//: JsonResource
    {
        $request->validate([
            'vehicle_id' => 'int|required',
            'key_id' => 'int|required',
            'technician_id' => 'int|required',
        ]);

        $order = Order::query()->create($request->input());

        $order->vehicle->keys()->sync($request->input('key_id'));

        return new OrderResource($order);
    }

    public function show(Order $order): JsonResource
    {
        return new OrderResource($order);
    }

    public function update(Request $request, Order $order): JsonResource
    {
        $order->update($request->input());

        return new OrderResource($order);
    }

    public function destroy(Order $order): JsonResponse
    {
        $success = $order->delete();

        return response()->json(['success' => $success]);
    }
}
