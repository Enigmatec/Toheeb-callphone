<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserService {

    function __construct(User $user)
    {
        $this->user = $user;
    }


    function createUser(array $data): User{
        try {
            return $this->user->create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }   

    function updateUserProfilePic($user, $path){
        try {
            return $user->update([
                'image' => Storage::disk('s3')->url($path),
            ]);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}