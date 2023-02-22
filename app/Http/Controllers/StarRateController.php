<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StarRate;
use App\Models\Product;
class StarRateController extends Controller
{
    


 public function get_selected_product(Request $request){
        $rate = Product::where('id',$request->id)->first();

           return response()->json([
                    'status' =>$rate
                ]);
 }
    public function get_user_rating(Request $request){
         $rate = StarRate::where([['postid','=',$request->postid],['userid','=',$request->userid],['mac_address','=',$request->ip]])->first();

           return response()->json([
                    'status' =>$rate
                ]);

    }
     public function get_branch_rating(Request $request){
        $sumRow = StarRate::where('userid','=',$request->branchid)->get()->sum('rate');
        $count =  StarRate::where('userid','=',$request->branchid)->get();
        return response()->json([
                    'status' => $sumRow/count($count)
                ]);
     }
    public function get_star_rating(Request $request){
        $request->validate([
            'branchid'=>['required'],
            'productid'=>['required'],
        ]);
     //   $request->ip = substr(exec('getmac'),0,17);

        $rate = StarRate::where([['postid','=',$request->productid],['userid','=',$request->branchid],['mac_address','=',$request->ip],['who','=','post']])->get();
             
            $sumRow = StarRate::where([['postid','=',$request->productid],['userid','=',$request->branchid],['who','=','post']])->get()->sum('rate');


            $countRow = count($rate);


             if($countRow === 0){
                return response()->json([
                    'status' => 'not exist'
                ]);
             }else{
                    return response()->json([
                     'status' => 'done',
                     'rate' => $sumRow / $countRow,
                  ]);
             }
    }

     public function submit_post_rating(Request $request){

         $request->validate([
            'userid'=>['required'],
            'rate'=>['required'],
            'postid'=>['required'],
        ]);
       // $request->ip = substr(exec('getmac'),0,17);

        $verify = StarRate::where([['postid','=',$request->postid],['userid','=',$request->userid],['mac_address','=',$request->ip]])->get();


              if(count($verify) === 0){
                    $rate = new StarRate;
                    $rate->userid = $request->userid;
                    $rate->postid = $request->postid;
                    $rate->rate = $request->rate;
                    $rate->mac_address = $request->ip;
                    $rate->who = 'post';
                    $rate->save();


                   $aaa = StarRate::where('postid','=',$request->postid)->get();

                    $sumRow = StarRate::where('postid','=',$request->postid)->get()->sum('rate');

                        $countRow = count($aaa); 

                        Product::where('id', $request->postid)
                      ->update(['rate' => $sumRow / $countRow]);


                         return response()->json([
                            'status' => 'success',
                            'rate' => $sumRow / $countRow,
                        ]);
              }else{

                    StarRate::where([['postid','=',$request->postid],['userid','=',$request->userid],['mac_address','=',$request->ip],['who','=','post']])
                     ->update(['rate' => $request->rate]);


                     $aaa = StarRate::where('postid','=',$request->postid)->get();

                    $sumRow = StarRate::where('postid','=',$request->postid)->get()->sum('rate');


                        $countRow = count($aaa); 
                         Product::where('id', $request->postid)
                      ->update(['rate' => $sumRow / $countRow]);

                      return response()->json([
                            'status' => 'success',
                            'rate' => $sumRow / $countRow,
                        ]);

              }
       



    }
}
