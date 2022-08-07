<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    public function user_login(Request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'Incorrect email or password!'
            ]);
        }
        throw ValidationException::withMessages([
            'email' => ['Incorrect email or password!'],
        ]);
        
    }
    public function get_all_users(Request $request){
        $users = User::where('usertype', '=' ,'cafe')
        ->get();
        return response()->json([
            'status' => $users
        ]);
    }
    public function logout(){
      Auth::logout();
    }
}
