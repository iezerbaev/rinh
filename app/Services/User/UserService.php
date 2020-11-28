<?php


namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Services\User\UserService
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserService query()
 * @mixin \Eloquent
 */
class UserService extends Model
{
    public function index(): object
    {
        return User::all();
    }
}
