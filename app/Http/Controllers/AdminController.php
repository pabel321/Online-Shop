<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index()
    {
    	return view('admin_login');
    }

    public function dashboard(Request $request)
    {
    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);
    	$result=DB::table('tbl_admin')
    			->where('admin_email',$admin_email)
    			->where('admin_password',$admin_password)
    			->first();

    			if($result){
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    return Redirect::to('/dashboard');
                }else {
                    Session::put('message','Email or Password Invalid');
                    return Redirect::to('/admin');

                }
    }

    public function add_manager()
    {
         $this->AdminAuthCheck();
        return view('admin.add_manager');
    }

    public function save_manager(Request $request)
    {
        $data=array();
        $data['manager_id']=$request->manager_id;
        $data['manager_email']=$request->manager_email;
        $data['manager_password']=md5($request->manager_password);
        $data['manager_name']=$request->manager_name;
        $data['manager_phone']=$request->manager_phone;

        DB::table('tbl_manager')->insert($data);
        Session::put('message','Manager added successfully!');
        return Redirect::to('/add-manager');
    }

      

     public function manage_order()
    {
         $this->AdminAuthCheck();
        $all_order_info= DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->select('tbl_order.*','tbl_customer.customer_name')
                            ->get();

        $manage_order=view('admin.manage_order')
            ->with('all_order_info',$all_order_info);
        return view('admin_layout')
            ->with('admin.manage_order',$manage_order);
    }

    

    public function view_order($order_by_id)
    {
         $this->AdminAuthCheck();
         $order_by_id= DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                            ->join('tbl_shipping','tbl_order.customer_id','=','tbl_shipping.customer_id')
                            ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','tbl_customer.*')
                            ->get();

        $view_order=view('admin.view_order')
            ->with('order_by_id',$order_by_id);
        return view('admin_layout')
            ->with('admin.view_order',$view_order);
           /* echo "<pre>";
            print_r($order_by_id);
            echo "</pre>";*/

    }

    public function view_user()
    {
         $this->AdminAuthCheck();
        $all_user_info= DB::table('tbl_customer')->get();
        $manage_user=view('admin.all_customer')
            ->with('all_user_info',$all_user_info);
        return view('admin_layout')
            ->with('admin.all_customer',$manage_user);
    }

    public function view_message()
    {
         $this->AdminAuthCheck();
        $all_message_info= DB::table('tbl_contact')->get();
        $manage_message=view('admin.all_message')
            ->with('all_message_info',$all_message_info);
        return view('admin_layout')
            ->with('admin.all_message',$manage_message);
    }

     public function view_message_detail($contact_id)
    {
         $this->AdminAuthCheck();
        $all_message_detail= DB::table('tbl_contact')
         ->where('tbl_contact.contact_id',$contact_id)
        ->first();
        $manage_messagedetail=view('admin.message_detail')
            ->with('all_message_detail',$all_message_detail);
        return view('admin_layout')
            ->with('admin.message_detail',$manage_messagedetail);
    }

     public function view_manager()
    {
         $this->AdminAuthCheck();
        $all_manager_info= DB::table('tbl_manager')->get();
        $manage_manager=view('admin.view_manager')
            ->with('all_manager_info',$all_manager_info);
        return view('admin_layout')
            ->with('admin.view_manager',$manage_manager);
    }

    public function AdminAuthCheck()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}
