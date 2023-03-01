<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{

    
    

    public function delete_branch(Request $request){
           User::where('id', '=' ,$request->id)->delete();
    }
     public function change_password(Request $request){
        User::where('email', '=' ,$request->email)
        ->update([
            'password' =>Hash::make($request->password)
        ]);
     }
    public function get_email(Request $request){
        $users = User::where('email', '=' ,$request->email)->get();

        if(count($users) !== 0){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'not exist'
            ]);
        }


    }
    public function user_login(Request $request){
        $request->validate([
            'username'=>['required'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($request->only('username','password'))){

            $request->session()->put('id', Auth::user()->id);
            return response()->json([
                'status' => Auth::user(),
                'status2' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'Incorrect username or password!',
                'status2' => 'Incorrect username or password!'
            ]);
        }
        throw ValidationException::withMessages([
            'status' => 'Incorrect username or password!',
            'status2' => 'Incorrect username or password!',
        ]);
        
    }
    public function get_all_users(Request $request){
      
        if($request->session()->get('id') !== null){
            $users = User::where([['status', '=' ,$request->status],['usertype', '=' ,'cafe'],['id','<>',$request->session()->get('id')]])
            ->orderByDesc('id')
            ->get();

            $all = User::all();
            return response()->json([
                'status' => $users,
                'all' => $all,
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
        $path = 'images/file/';

     if(count($users) === 0){
        if ($request->hasFile('documents0')) {
             User::create([
                'store_name' => $request->storename,
                'email' => $request->email,
                'owner' => $request->owner,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'usertype' => 'cafe',
                'year' => date('Y'),
                'lat' => '10.4833584',
                'lng' => '123.3998655',
                'status' => 'Pending'
            ]);
             $first = User::orderByDesc('id')
            ->first()
            ->fresh();
            
            for ($i=0; $i < $request->count; $i++) { 
                    $allFiles = $request->file('documents'.$i);
                    $fileName = $allFiles->getClientOriginalName();
                    $allFiles->move($path, $fileName);
                    Documents::create([
                        'userid' =>  $first->id,
                        'documents' => $fileName,
                    ]);
            }
        }
       

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
     if($request->session()->get('otp') === $request->otp){
        return response()->json([
            'status' => true
        ]);
     }else{
        return response()->json([
            'status' => false,
            'otp' =>$request->session()->get('otp')
        ]);
     }
    }
    public function get_user_id(Request $request){
          $request->validate([
            'id'=>['required'],
            ]);

        $user= User::where('id', $request->id)->first();
        $docu= documents::where('userid', $request->id)->get();
         return response()->json([
            'status' => $user,
            'documents' => $docu
        ]);


    }

    public function approve_user(Request $request){
          $request->validate([
            'id'=>['required'],
            'status'=>['required'],
            ]);

          if($request->status === 'Approved'){
            User::where('id', $request->id)
            ->update(['status' => $request->status]);
             return response()->json([
                'status' => 'success'
            ]);
          }else if($request->status === 'Block'){
            User::where('id', $request->id)
            ->update(['status' => $request->status]);
             return response()->json([
                'status' => 'success'
            ]);
          }else if($request->status === 'Unapproved'){
                User::where('id', $request->id)
                ->update(['status' => $request->status]);
                 return response()->json([
                    'status' => 'success'
                ]);
          }
         
        
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
            'phone' => $request->Phone,
            'mobile' => $request->Mobile,
            'about' => $request->Bio,
            'landmark' => $request->Landmark,
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


     public function get_counted_user(Request $request){

        $id =$request->session()->get('id');
        $count1= User::where('status', 'Approved')->get();
        $count2= User::where('status', 'Pending')->get();
        $count3= User::where('status', 'Block')->get();
        $count4= User::where('status', 'Unapproved')->get();
         $count5= User::all();
             return response()->json([
            'status1' => count($count1),
            'status2' => count($count2),
            'status3' => count($count3),
            'status4' => count($count4),
             ]);
     }

    
}
