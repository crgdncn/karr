<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Technician;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::query()->get();
        $keys = Key::query()->get();
        $technicians = Technician::query()->get();

        return view('index', compact('vehicles', 'keys', 'technicians'));
    }
}
