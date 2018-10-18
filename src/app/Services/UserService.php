<?php
/**
 * Created by PhpStorm.
 * User: vivify
 * Date: 10/17/18
 * Time: 10:03 PM
 */

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserService
{
    public function createUser($name, $email, $password)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $this->managePassword($password)
        ]);
    }

    public function passwordMatch($currentPassword, $user)
    {
        return Hash::check($currentPassword, $user->password);
    }

    public function managePassword($newPassword)
    {
        return Hash::make($newPassword);
    }
}