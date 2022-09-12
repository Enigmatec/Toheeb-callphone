<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    
    function uploadImage(Request $request, UserService $userService){
        
        $request->validate([
            'image' => ['bail', 'required', 'image', 'mimes:jpg,bmp,png,jpeg']
        ]);

        $user = auth()->user();
        
        $path = $request->file('image')->store('images', 's3');
        $userService->updateUserProfilePic($user, $path);

        return Response::successResponse("Profile Image Uploaded", new UserResource($user)) ;
        
    }
}
