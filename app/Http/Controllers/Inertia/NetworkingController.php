<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;

class NetworkingController extends Controller
{
    public function index()
    {
        return Inertia::render('Networking/Index', [
            'users' => User::all(),
        ]);
    }
}
