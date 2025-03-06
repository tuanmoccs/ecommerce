<?php
namespace App\Http\Service\Users;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class UserService{
    public function getAll(){
        return User::orderbyDesc('id')->paginate(20);
    }
}
