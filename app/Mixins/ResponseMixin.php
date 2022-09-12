<?php

namespace App\Mixins;

class ResponseMixin {

    public function createdResponse(){
        return function (string $message, $data){
            return response()->json([
                "success" => true,
                "message" => $message,
                "data" => $data,
            ], 201);
        };
    }

    public function successResponse(){
        return function (string $message, $data){
            return response()->json([
                "success" => true,
                "message" => $message,
                "data" => $data,
            ], 200);
        };
    }

    public function notFoundResponse(){
        return function (string $message = "", ?int $status_code = 404){
            return response()->json([
                "success" => false,
                "message" => $message,
                "data" => []
            ], $status_code);
        };
    }

    public function unauthenticatedResponse() {
        return function (bool $status = false, string $message = "Incorrect Login credentials"){
            return response()->json([
                "success" => $status,
                "message" => $message,
            ], 401);
        };
    }

    public function unauthorizedResponse() {
        return function (bool $status = false, string $message = "Unauthorized"){
            return response()->json([
                "success" => $status,
                "message" => $message,
            ], 403);
        };
    }

    public function serverErrorResponse() {
        return function (bool $status = false, string $message = "Something went wrong"){
            return response()->json([
                "success" => $status,
                "message" => $message,
            ], 500);
        };
    }
}