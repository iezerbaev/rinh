<?php


namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    public function index(): object
    {
        return User::all();
    }
}
