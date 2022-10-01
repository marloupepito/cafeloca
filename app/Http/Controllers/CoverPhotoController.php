<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoverPhoto;
class CoverPhotoController extends Controller
{
       public function add_cover_photo(Request $request){
                 $id =$request->session()->get('id');
                if ($request->hasFile('cover0')) {
                    $path = 'images/post/';
                    for ($i=0; $i < $request->count; $i++) { 
                        $allFiles = $request->file('cover'.$i);
                        $fileName = $allFiles->getClientOriginalName();
                        $allFiles->move($path, $fileName);
                         CoverPhoto::create([
                        'userid' => $id,
                        'cover' => $fileName,
                        ]);
                    }
                }
                $cover = CoverPhoto::where('userid',$id)->limit(7)->orderByDesc('id')->get();
            return response()->json([
                'status' => $cover
            ]);
     }
     public function get_coffee_cover(Request $request){
                 $id =$request->session()->get('id');
              
                $cover = CoverPhoto::where('userid',$id)->limit(7)->orderByDesc('id')->get();
            return response()->json([
                'status' => $cover
            ]);
     }
      public function get_coffee_cover2(Request $request){
              
                $cover = CoverPhoto::where('userid',$request->id)->limit(7)->orderByDesc('id')->get();
            return response()->json([
                'status' => $cover
            ]);
     }
}
