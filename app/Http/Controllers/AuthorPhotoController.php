<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorPhoto;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthorPhotoController extends Controller
{
    public function __construct(private UserService $userService)
    {
        $this->userService = $userService;
    }

    

}
