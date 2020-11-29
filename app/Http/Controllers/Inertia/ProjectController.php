<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\User\UserService;

class ProjectController extends Controller
{
    public function index()
    {
        return Inertia::render('Project/Index', [
            'projects' => Project::all()
        ]);
    }
}
