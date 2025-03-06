<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Users\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function list(){
        return view('admin.users.list', [
            'tiltle' => 'Danh Sách Người dùng',
            'users' => $this->userService->getAll()
        ]);
    }
}
