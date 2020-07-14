<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ManagerController extends Controller
{
    public function index()
    {
        return view('manager_login');
    }

    public function m_dashboard(Request $request)
    {

    		/*dd($request->all());*/
    	$manager_email=$request->manager_email;
    	$manager_password=md5($request->manager_password);
    	$result=DB::table('tbl_manager')
    			->where('manager_email',$manager_email)
    			->where('manager_password',$manager_password)
    			->first();

    			if($result){
                    Session::put('manager_name',$result->manager_name);
                    Session::put('manager_id',$result->manager_id);
                    return Redirect::to('/manager-page');
                }else {
                    Session::put('message','Email or M Password Invalid');
                    return Redirect::to('/manager');

                }
    }

    public function m_view_order($order_by_id)
    {
        $this->ManagerAuthCheck();
         $order_by_id= DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                            ->join('tbl_shipping','tbl_order.customer_id','=','tbl_shipping.customer_id')
                            ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','tbl_customer.*')
                            ->get();

        $view_order=view('admin.m_view_order')
            ->with('order_by_id',$order_by_id);
        return view('manager_layout')
            ->with('admin.m_view_order',$view_order);
    }

    public function manager_manage_order()
    {
        $this->ManagerAuthCheck();

        $order_number=DB::table('tbl_order')
                        ->count();

        $save_order_number=DB::table('tbl_viewer')
                        ->where('viewer_id',1)
                        ->update(['notification' =>  $order_number]);

        $all_order_info= DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->select('tbl_order.*','tbl_customer.customer_name')
                            ->get();

        $manage_order=view('admin.manager_manage_order')
            ->with('all_order_info',$all_order_info);
        return view('manager_layout')
            ->with('admin.manager_manage_order',$manage_order);


    }

     public function all_subscribe()
    {
        $this->ManagerAuthCheck();
        $all_subscriber_info= DB::table('tbl_subscribe')->get();
        $manage_subscriber=view('admin.all_subscriber')
            ->with('all_subscriber_info',$all_subscriber_info);
        return view('manager_layout')
            ->with('admin.all_subscriber',$manage_subscriber);
    }

    public function all_review()
    {
        $this->ManagerAuthCheck();
        $all_reviewer_comment= DB::table('tbl_review')
                            ->join('tbl_products','tbl_review.product_id','=','tbl_products.product_id')
                            ->select('tbl_review.*','tbl_products.*')
                            ->get();
        $manage_reviewer=view('admin.all_review')
            ->with('all_reviewer_comment',$all_reviewer_comment);
        return view('manager_layout')
            ->with('admin.all_review',$manage_reviewer);
    }

    public function confirm_payment($order_id)
    {
        $confirm=DB::table('tbl_order')
                ->where('order_id',$order_id)
                ->update(['order_status' =>  '2']);
        return Redirect::to('/manager-manage-order');
    }

     public function reject_payment($order_id)
    {
        $confirm=DB::table('tbl_order')
                ->where('order_id',$order_id)
                ->update(['order_status' =>  '3']);
        return Redirect::to('/manager-manage-order');
    }

     public function bkash_payment()
    {
        $this->ManagerAuthCheck();
        $all_bkash_info= DB::table('tbl_bkash')->get();
        $manage_bkash=view('admin.all_bkash')
            ->with('all_bkash_info',$all_bkash_info);
        return view('manager_layout')
            ->with('admin.all_bkash',$manage_bkash);
    }

    public function ManagerAuthCheck()
    {
        $manager_id=Session::get('manager_id');
        if($manager_id){
            return;
        }else{
            return Redirect::to('/manager')->send();
        }
    }
}
