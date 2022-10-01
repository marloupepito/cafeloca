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

            $request->session()->put('id', Auth::user()->id);
            return response()->json([
                'status' => Auth::user(),
                'status2' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'Incorrect email or password!',
                'status2' => 'Incorrect email or password!'
            ]);
        }
        throw ValidationException::withMessages([
            'status' => 'Incorrect email or password!',
            'status2' => 'Incorrect email or password!',
        ]);
        
    }
    public function get_all_users(Request $request){
      
        if($request->session()->get('id') !== null){
            $users = User::where([['usertype', '=' ,'cafe'],['id','<>',$request->session()->get('id')]])
            ->get();
            return response()->json([
                'status' => $users,
                'id' => $request->session()->get('id')
            ]);
        }else{
             $users = User::where('usertype', '=' ,'cafe')
            ->get();
            return response()->json([
                'status' => $users,
            ]);
        }

    }
    public function logout(Request $request){
        $request->session()->invalidate();
      Auth::logout();
    }

    public function add_user(Request $request){
     
     $users = User::where('store_name', '=' , $request->storename)->get();
     if(count($users) === 0){
        User::create([
            'store_name' => $request->storename,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'cafe',
            'year' => date('Y'),
            'status' => 'pending'
        ]);

        return response()->json([
            'status' => 'success'
        ]);
     }else{
         return response()->json([
            'status' => 'exist'
        ]);
     }

       

    }
    public function otp_submit(Request $request){
     if(session('otp') === $request->otp){
        return response()->json([
            'status' => true
        ]);
     }else{
        return response()->json([
            'status' => false,
            'otp' =>session('otp')
        ]);
     }
    }
    public function get_user_id(Request $request){
          $request->validate([
            'id'=>['required'],
            ]);

          $user= User::where('id', $request->id)->first();
         return response()->json([
            'status' => $user
        ]);
    }

    public function approve_user(Request $request){
          $request->validate([
            'id'=>['required'],
            'status'=>['required'],
            ]);

         
         User::where('id', $request->id)
        ->update(['status' => $request->status]);
         return response()->json([
            'status' => 'success'
        ]);
    }
     public function edit_profile(Request $request){
        $id =$request->session()->get('id');
         $request->validate([
            'branchName'=>['required'],
            'Phone'=>['required'],
            'Mobile'=>['required'],
            'Bio'=>['required'],
            ]);

         User::where('id', $id)
            ->update([
            'store_name' => $request->branchName,
            'Phone' => $request->Phone,
            'Mobile' => $request->Mobile,
            'about' => $request->Bio,
          ]);
         $user= User::findOrFail($id);
          
            return response()->json([
            'status' => $user
        ]);
     }
    
     public function upload_profile(Request $request){
        $id =$request->session()->get('id');

            $path = 'images/post/';
        if ($request->hasFile('profile')) {
            $aaa = $request->file('profile');
            $imageName = $aaa->getClientOriginalName();
             $aaa->move($path, $imageName);
             User::where('id', $id)
            ->update([
                'profile' => $imageName,
              ]);
                $user= User::findOrFail($id);
             return response()->json([
            'status' => $user
        ]);
        }else{
              return response()->json([
            'status' => 'error'
             ]);
        }

     }

     public function change_location_lng_lat(Request $request){

        $id =$request->session()->get('id');
        User::where('id', $id)
            ->update([
                'lat' => $request->lat,
                'lng' => $request->lng,
              ]);
     }

    
}
