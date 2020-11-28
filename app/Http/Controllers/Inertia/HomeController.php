<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\ScientificActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home/Index', [
            'grants' => ScientificActivity::where('type', '=', '1')->where('user_id', '=', Auth::id())->get(),
            'researchWork' => ScientificActivity::where('type', '=', '0')->where('user_id', '=', Auth::id())->latest()->get()
        ]);
    }
}
