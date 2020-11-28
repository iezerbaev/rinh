<?php

namespace App\Http\Controllers\Inertia\Science;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActivityController extends Controller
{
    public function index()
    {
        return Inertia::render('Science/Activity', []);
    }
}
