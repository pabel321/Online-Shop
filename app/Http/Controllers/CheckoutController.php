<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function login_check()
    {
    	return view('pages.login');
    }

    public function customer_registration(Request $request)
    {
    	$data=array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['password']=md5($request->password);
    	$data['mobile_number']=$request->mobile_number;

    	$customer_id=DB::table('tbl_customer')
    				->insertGetId($data);

    		Session::put('customer_id',$customer_id);
    		Session::put('customer_name',$request->customer_name);
    		return Redirect('/checkout');
    }

    public function checkout()
    {

        $match=DB::table('tbl_shipping')
                 ->where('customer_id',Session::get('customer_id'))
                  ->exists();
        if($match=='true'){
            Session::put('message','Edit Your Delivary Address!');
            return Redirect::to('/show-shipping');
        }else{
    	return view('pages.checkout');
            }
    }
    public function show_shipping()
    {
        $user_shipping=DB::table('tbl_shipping')
                ->where('customer_id',Session::get('customer_id'))
                ->first();
                /*dd( $user_shipping);*/
        $user_address=view('pages.edit_shipping')
            ->with('user_shipping',$user_shipping);
        return view('layout')
            ->with('pages.edit_shipping',$user_address);
    }

    public function edit_shipping(request $request)
    {
        $data=array();
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_mobile_number']=$request->shipping_mobile_number;
        $data['shipping_city']=$request->shipping_city;

        DB::table('tbl_shipping')
            ->where('customer_id',Session::get('customer_id'))
            ->update($data);
            Session:: put('message','User Delivary Address Update Succesfully!');
            return Redirect::to('/show-shipping');

    }

    public function save_shipping_details(Request $request)
    {
    	$data=array();
        $data['customer_id']=Session::get('customer_id');
        $data['shipping_email']=$request->shipping_email;
    	$data['shipping_first_name']=$request->shipping_first_name;
    	$data['shipping_last_name']=$request->shipping_last_name;
    	$data['shipping_address']=$request->shipping_address;
    	$data['shipping_mobile_number']=$request->shipping_mobile_number;
    	$data['shipping_city']=$request->shipping_city;

    	$shipping_id=DB::table('tbl_shipping')
    			->insertGetId($data);
    			Session::put('shipping_id',$shipping_id);
    			return Redirect::to('/user-account');
    }

    public function customer_login(Request $request)
    {
    	$customer_email=$request->customer_email;
    	$password=md5($request->password);

    	$result=DB::table('tbl_customer')
    			->where('customer_email',$customer_email)
    			->where('password',$password)
    			->first();

    			if($result){
    				Session::put('customer_id',$result->customer_id);
    				return Redirect::to('/show-cart');
    			}else{
                    Session::put('message','Email or Password Invalid');
    				return Redirect::to('/login-check');
    			}
    }

    public function user_profile()
    {
        $user_accountt=DB::table('tbl_customer')
                ->where('customer_id',Session::get('customer_id'))
                ->first();
                /*dd( $user_accountt);*/
        $user_info=view('pages.user_account')
            ->with('user_accountt',$user_accountt);
        return view('layout')
            ->with('pages.user_account',$user_info);
    }

    public function edit_user(Request $request)
    {
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['mobile_number']=$request->mobile_number;
        $data['password']=md5($request->password);

        DB::table('tbl_customer')
            ->where('customer_id',Session::get('customer_id'))
            ->update($data);
            Session:: put('message','User Information Update Succesfully!');
            return Redirect::to('/user-account');
    }

     public function payment()
    {
        $match=DB::table('tbl_shipping')
                 ->where('customer_id',Session::get('customer_id'))
                  ->exists();
        if($match=='true'){
            return view('pages.payment');
        }else{
        Session::put('message','Edit Your Delivary Address!');
            return view('pages.checkout');
            }

    	
    }

    public function order_place(Request $request)
    {
    	$payment_gateway=$request->payment_gateway;
    	$pdata=array();
    	$pdata['payment_method']=$payment_gateway;
    	$pdata['payment_status']='pending';
    	$payment_id=DB::table('tbl_payment')
    				->insertGetId($pdata);

    	$odata=array();
    	$odata['customer_id']=Session::get('customer_id');
    	$odata['payment_id']=$payment_id;
    	$odata['order_total']=Cart::getTotal();
    	$odata['order_status']='1';
    	$order_id=DB::table('tbl_order')
    				->insertGetId($odata);

    	$contents=Cart::getContent();

    	$oddata=array();
    	foreach($contents as $v_content)
    	{
    		$oddata['order_id']=$order_id;
    		$oddata['product_id']=$v_content->id;
    		$oddata['product_name']=$v_content->name;
    		$oddata['product_price']=$v_content->price;
    		$oddata['product_sales_quantity']=$v_content->quantity;
    			DB::table('tbl_order_details')
    				->insert($oddata);
    	}
    	if($payment_gateway=='handcash'){

    		Cart::clear();
    		return view('pages.handcash');

    	}elseif($payment_gateway=='bkash'){
    		//Cart::clear();
    		return view('payment.index',compact('order_id'));
    	}else{
    		echo "No Payment Method selected";
    	}


    }

    public function payment_create_order()
    {
        return view('payment.new.sample_create_order');
    }

    Public function give_payment(Request $request)
    {
       $data=array();
        $data['bkash_id']=$request->bkash_id;
        $data['order_id']=$request->order_id;
        $data['transaction']=$request->transaction;
        $data['amount']=$request->amount;

        DB::table('tbl_bkash')->insert($data);
        Session::put('message','Payment added successfully!');
        return Redirect::to('/user-order');
    }

   public function user_order()
   {
          $customer_order_info= DB::table('tbl_order')
                            
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                            ->join('tbl_shipping','tbl_order.customer_id','=','tbl_shipping.customer_id')
                            ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','tbl_customer.*')
                            
                            ->get();
                            

        $show_order=view('pages.show_order')
            ->with('customer_order_info',$customer_order_info);
        return view('layout')
            ->with('pages.show_order',$show_order);
   }

    public function received_order($order_id)
    {
        $confirm=DB::table('tbl_order')
                ->where('order_id',$order_id)
                ->update(['order_status' =>  '4']);
        return Redirect::to('/user-order');
    }

    public function customer_logout()
    {
    	Session::flush();
    	return Redirect::to('/');
    }


}
