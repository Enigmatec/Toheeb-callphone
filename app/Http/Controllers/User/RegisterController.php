<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterFormRequest;
use App\Http\Resources\User\UserResource;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function __invoke(RegisterFormRequest $request, UserService $userServie)
    {
        $new_user = $userServie->createUser($request->validated());
        return Response::createdResponse("New User Created", new UserResource($new_user)); 
    }
}
