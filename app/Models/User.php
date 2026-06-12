<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

#[Fillable(['name', 'email', 'password', 'rolename'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAllUsers($loggedInUserId)
    {
        return DB::select(
            'CALL Sp_GetAllUsers(?)',
            [$loggedInUserId]
        );
    }

    public function sp_GetUserById($user_Id)
    {
        return DB::selectOne(
            'CALL Sp_GetUserById(?)',
            [$user_Id]
        );
    }

    public function sp_GetAllUserroles()
    {
        return DB::select(
            'CALL Sp_GetAllUserroles()'
        );
    }

    public function sp_UpdateUser($id, $name, $email, $rolename)
    {
        return DB::affectingStatement(
            'CALL Sp_UpdateUser(?, ?, ?, ?)',
            [$id, $name, $email, $rolename]
        );
    }
public function sp_DeleteUser($userId)
{
    $result = DB::selectOne(
        'CALL Sp_DeleteUser(?)',
        [$userId]
    );

    return $result->affected;
}

}