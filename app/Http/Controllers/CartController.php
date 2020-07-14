<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$quantity=$request->quantity;
    	$product_id=$request->product_id;
    	$product_info=DB::table('tbl_products')
    			->where('product_id',$product_id)
    			->first();

    	$data['quantity']=$quantity;
    	$data['id']=$product_info->product_id;
    	$data['name']=$product_info->product_name;
    	$data['price']=$product_info->product_price;
    	$data['attributes']['image']=$product_info->product_image;
    	
 		Cart::add($data);

 	// dd($ddd);

    	return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
    	$all_published_category=DB::table('tbl_category')
    						->where('publication_status',1)
    						->get();
    	$manage_published_category=view('pages.add_to_cart')
    		->with('all_published_category',$all_published_category);
    	return view('layout')
    		->with('pages.add_to_cart',$manage_published_category);

    }

    public function delete_to_cart($id)
    {
    	Cart::remove($id,0);
    	return Redirect::to('/show-cart');
    }

    public function update_cart(Request $request)
    {
	$data['quantity']=$request->quantity;
	$id=$request->id;

	/*dd($data);*/

	Cart::update($id,$data);

	return Redirect::to('/show-cart');

    }
    
    public function add_wishlist($product_id)
    {
        $match=DB::table('tbl_wishlist')
                 ->where('customer_id',Session::get('customer_id'))
                  ->where('product_id',$product_id)
                  ->exists();
        if($match=='true'){
            Session::put('message','Product Already in wishlist!');
            return Redirect::to('/all-wishlist');
        }else{
            $data=array();
        $data['customer_id']=Session::get('customer_id');
        $data['product_id']=$product_id;
        DB::table('tbl_wishlist')
                    ->insertGetId($data);
        Session::put('message','Product successfully added to wishlist!');
       return Redirect::to('/all-wishlist');
        }
        
    }

    public function all_wishlist()
    {
        $all_wishlist_info= DB::table('tbl_wishlist')
                            ->where('customer_id',Session::get('customer_id'))
                            ->join('tbl_products','tbl_wishlist.product_id','=','tbl_products.product_id')
                            ->select('tbl_wishlist.*','tbl_products.*')
                            ->get();
        $show_wishlist=view('pages.wishlist')
            ->with('all_wishlist_info',$all_wishlist_info);
        return view('layout')
            ->with('pages.wishlist',$show_wishlist);
    }

    public function delete_wishlist($wishlist_id)
    {
        DB::table('tbl_wishlist')
            ->where('wishlist_id',$wishlist_id)
            ->delete();
            Session::put('message','Product Deleted from Wishlist Succesfully!');
            return Redirect::to('/all-wishlist');
    }

}
