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
            'storeName'=>['required'],
            'price'=>['required'],
        ]);
        $id =$request->session()->get('id');
         $path = 'images/post/';
        if ($request->hasFile('images0')) {
            
            $aaa = $request->file('images0');
            $imageName = $aaa->getClientOriginalName();
             Product::create([
                'branchid' => $id,
                'price' => $request->price,
                'productname' => $request->productName,
                'branchname' => $request->storeName,
                'images' => $imageName,
                'about' => $request->about,
                'menu' => $request->menu,
                'rate' => $request->rate,
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
            ->limit($request->limit)
            ->get();

             return response()->json([
                    'status' =>$product
                ]);  

    }

    public function get_all_post(Request $request){
         $request->validate([
            'limit'=>['required'],
        ]);

             $product = Product::limit($request->limit)
             ->orderByDesc('rate')
             ->get()
             ->unique('branchid');
                return response()->json([
                    'status' =>$product
                ]); 
    }
    public function get_every_product_post(Request $request){

             $request->validate([
                'branchid'=>['required'],
            ]);
             $product= Product::where([['id',$request->id],['branchid',$request->branchid]])->first();
             $image= ProductImage::where([['foreign',$request->id],['branchid',$request->branchid]])->get();

            return response()->json([
                'status' =>$product,
                'images' =>$image
            ]); 

        }


         public function get_menu(Request $request){

             $request->validate([
                'menu'=>['required'],
                'id' => ['required']
            ]);
             $product= Product::where([['branchid',$request->id],['menu', 'LIKE', '%' . $request->menu . '%']])->get();

            return response()->json([
                'status' =>$product,
            ]); 

        }
           public function get_search_menu2(Request $request){
             $product= Product::where([['menu','=',$request->menu],['branchname','=',$request->branchname]])->get();
                return response()->json([
                'status1' =>$product,
                 ]); 
           }
         public function get_search_menu(Request $request){

            //  $request->validate([
            //     'menu'=>['required'],
            // ]);
              $product1= Product::all();
                return response()->json([
                'status1' =>$product1,
                 ]); 
             // $product1= Product::where('menu', 'LIKE', '%' . $request->menu . '%')->get();
             //    return response()->json([
             //    'status1' =>$product1,
             //     ]); 
            
             // if(count($request->menu) === 1){
             //    $product1= Product::where('menu', 'LIKE', '%' . $request->menu[0] . '%')->get();
             //    return response()->json([
             //    'status1' =>$request->menu[0],
             //     ]); 
             // }else if(count($request->menu) === 2){
             //    $product1= Product::where('menu', 'LIKE', '%' . $request->menu[0] . '%')->get();
             //     $product2= Product::where('menu', 'LIKE', '%' . $request->menu[1] . '%')->get();
             //    return response()->json([
             //    'status1' =>$product1,
             //    'status2' =>$product2,
             //     ]); 
             // }else if(count($request->menu) === 3){
             //    $product1= Product::where('menu', 'LIKE', '%' . $request->menu[0] . '%')->get();
             //     $product2= Product::where('menu', 'LIKE', '%' . $request->menu[1] . '%')->get();
             //     $product3= Product::where('menu', 'LIKE', '%' . $request->menu[2] . '%')->get();
             //    return response()->json([
             //    'status1' =>$product1,
             //    'status2' =>$product2,
             //    'status3' =>$product3,
             //     ]); 
             // }else if(count($request->menu) === 4){
             //     $product1= Product::where('menu', 'LIKE', '%' . $request->menu[0] . '%')->get();
             //     $product2= Product::where('menu', 'LIKE', '%' . $request->menu[1] . '%')->get();
             //     $product3= Product::where('menu', 'LIKE', '%' . $request->menu[2] . '%')->get();
             //     $product4= Product::where('menu', 'LIKE', '%' . $request->menu[3] . '%')->get();
             //    return response()->json([
             //    'status1' =>$product1,
             //    'status2' =>$product2,
             //    'status3' =>$product3,
             //    'status4' =>$product4,
             //     ]); 
             // }
            

        }


}
