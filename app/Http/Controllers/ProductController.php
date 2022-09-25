<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
class ProductController extends Controller
{
    public function post_product(Request $request){
         $request->validate([
            'productName'=>['required'],
            'about'=>['required'],
            'count'=>['required'],
        ]);
        $id =$request->session()->get('id');
         $path = 'images/post/';
        if ($request->hasFile('images0')) {
            
            $aaa = $request->file('images0');
            $imageName = $aaa->getClientOriginalName();
             Product::create([
                'branchid' => $id,
                'productname' => $request->productName,
                'images' => $imageName,
                'about' => $request->about,
            ]);
          
            $first = Product::orderByDesc('id')
            ->first()
            ->fresh();

            for ($i=0; $i < $request->count; $i++) { 
                    $allFiles = $request->file('images'.$i);
                    $fileName = $allFiles->getClientOriginalName();
                    $allFiles->move($path, $fileName);
                    ProductImage::create([
                        'branchid' => $id,
                        'foreign' => $first->id,
                        'images' => $fileName,
                    ]);
            }
           
            return response()->json([
                'status' =>$imageName
            ]);
        }else{
          return response()->json([
                    'status' =>'error'
                ]);  
        }

    }

    public function get_branch_post(Request $request){
        $id =$request->session()->get('id');

            $product = Product::where('branchid', $id)
            ->orderByDesc('id')
            ->get();

             return response()->json([
                    'status' =>$product
                ]);  

    }
}
