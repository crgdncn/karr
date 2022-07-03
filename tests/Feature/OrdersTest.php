<?php

namespace Tests\Feature;

use App\Http\Resources\OrderResource;
use App\Models\Key;
use App\Models\Order;
use App\Models\Technician;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    use RefreshDatabase;

    public function test_listOrders()
    {
        $orders = Order::factory()->count(3)->create();

        $expected = json_encode(OrderResource::collection($orders));
        $response = $this->get('/api/orders');
        $response->assertStatus(JsonResponse::HTTP_OK);
        $this->assertJson($expected);
    }

    public function test_showOrder()
    {
        $order = Order::factory()->create();

        $expected = json_encode(new OrderResource($order));
        $response = $this->get('/api/orders/' . $order->id);
        $response->assertStatus(JsonResponse::HTTP_OK);
        $this->assertJson($expected);
    }

    public function test_createOrder()
    {
        $vehicle = Vehicle::factory()->create();
        $key = Key::factory()->create();
        $technician = Technician::factory()->create();

        $response = $this->post('/api/orders', [
            'vehicle_id' => $vehicle->id,
            'key_id' => $key->id,
            'technician_id' => $technician->id,
        ]);

        $response->assertStatus(JsonResponse::HTTP_CREATED);

        $order = Order::query()->latest()->first();
        $expected = json_encode(new OrderResource($order));
        $this->assertJson($expected);
    }

    public function test_deleteOrder()
    {
        $order = Order::factory()->create();

        $response = $this->delete('/api/orders/' . $order->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

        $model = Order::query()->find($order->id);

        $this->assertNull($model);
    }
}
