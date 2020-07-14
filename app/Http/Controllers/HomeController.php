<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index()
    {


       $total_viewer=DB::table('tbl_viewer')->increment('viewer_number', 1, ['viewer_id' => '1']);
       
    	$all_published_product= DB::table('tbl_products')
    						->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
    						->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    						->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
    						->where('tbl_products.publication_status',1)
    						->limit(9)
    						->get();
    	$managed_published_product=view('pages.home_content')
    		->with('all_published_product',$all_published_product);
    	return view('slider')
    		->with('pages.home_content',$managed_published_product);
    	//return view('pages.home_content');
    }

    public function show_product_by_category($category_id)
    {
        $product_by_category= DB::table('tbl_products')
                            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                            ->select('tbl_products.*','tbl_category.category_name')
                            ->where('tbl_category.category_id',$category_id)
                            ->where('tbl_products.publication_status',1)
                            ->limit(20)
                            ->get();
        $manage_product_by_category=view('pages.category_by_products')
            ->with('product_by_category',$product_by_category);
        return view('layout')
            ->with('pages.category_by_products',$manage_product_by_category);
    }

    public function show_product_by_manufacture($manufacture_id)
    {
        $product_by_manufacture= DB::table('tbl_products')
                           ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                            ->where('tbl_manufacture.manufacture_id',$manufacture_id)
                            ->where('tbl_products.publication_status',1)
                            ->limit(20)
                            ->get();
        $manage_product_by_manufacture=view('pages.manufacture_by_products')
            ->with('product_by_manufacture',$product_by_manufacture);
        return view('layout')
            ->with('pages.manufacture_by_products',$manage_product_by_manufacture);
    }

    public function product_details_by_id($product_id)
    {
        $product_by_details= DB::table('tbl_products')
                           ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                            ->where('tbl_products.product_id',$product_id)
                            ->where('tbl_products.publication_status',1)
                            ->first();
        $manage_product_by_details=view('pages.product_details')
            ->with('product_by_details',$product_by_details);
        return view('layout')
            ->with('pages.product_details',$manage_product_by_details);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function send_comment(Request $request)
    {
        $data=array();
        $data['contact_id']=$request->contact_id;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['subject']=$request->subject;
        $data['message']=$request->message;

        DB::table('tbl_contact')->insert($data);
        Session::put('message','Message Send successfully!');
        return Redirect::to('/contact');
    }

    public function save_review(Request $request)
    {
        $data=array();
        $data['product_id']=$request->product_id;
        $data['reviewer_name']=$request->reviewer_name;
        $data['reviewer_feedback']=$request->reviewer_feedback;
        //dd($data);
        DB::table('tbl_review')->insert($data);
        Session::put('message','Review Send successfully!');
        return redirect()->back();
    }

     public function save_subscribe(Request $request)
    {
        $data=array();
        $data['subscriber_email']=$request->subscriber_email;
        //dd($data);
        DB::table('tbl_subscribe')->insert($data);
        Session::put('message','You Successfully Subscribe!');
        return redirect()->back();
    }


    public function shopping_home()
    {
        $all_shopping_product= DB::table('tbl_products')
                            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                            ->where('tbl_products.publication_status',1)
                            ->paginate(9);
       

        $managed_shopping_product=view('pages.shop')
            ->with('all_shopping_product',$all_shopping_product);
        return view('layout')
            ->with('pages.shop',$managed_shopping_product);
    }

    public function searching(Request $request)
    {
        $search=Input::get('search');
        if($search !="")
        {
            $search_result= DB::table('tbl_products')
                        ->where('product_name','LIKE','%'.$search.'%')
                        ->orWhere('product_short_description','LIKE','%'.$search.'%')
                        ->get();
            /*if(count( $search_result)>0)
                return view('pages.search')->withDetails($search_result)->withQuery($search_result);*/


        $show_searching_product=view('pages.search')
            ->with('search_result',$search_result);
        return view('layout')
            ->with('pages.search',$show_searching_product);
        }
        return "No Result Found";
    }

   function iindex()
    {
     return view('autocomplete');
    }

 function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('tbl_products')
        ->where('product_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:inline; position:static">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->product_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

//--------------------------auto search-----------------------------
    public function autosearch()
    {
        return view('autosearch');
    }

    public function autocompletesearch(Request $request) {
       $term = $request->term;

    $queries = DB::table('tbl_products') //Your table name
        ->where('product_name', 'like', '%'.$term.'%') //Your selected row
        ->get();

    foreach ($queries as $query)
    {
        $results[] = ['id' => $query->product_id, 'value' => $query->product_name]; //you can take custom values as you want
    }
    return response()->json($results);
    }
    
    
}
