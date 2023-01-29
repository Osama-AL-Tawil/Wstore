<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Traits\MyFunction;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use MyFunction;

    private $paging;

    public function __construct()
    {
        $this->paging=10;

    }


    public function index(){
        $data = Store::with(array('category' => function ($query) {
            $query->select(['id', 'category_name']);
        }))->paginate($this->paging);
        return view('website.home')->with('data',$data)->with('categories',$this->getCategories());
    }



    public function show(Request $request)
    {
        $id=$request['id'];
        $data = Store::where('category_id', $id)->with(array('category' => function ($query) {
            $query->select(['id', 'category_name']);
        }))->paginate($this->paging);
        return view('website.home')
            ->with('data',$data)->with('category_name',$request['category_name'])->with('categories', $this->getCategories());
    }


    public function rating(Request $request){

        $check_user_rating=Rating::where('user_mac_address',$this->getMacAddress())->
        where('store_id',$request['id'])->first();

        if (!$check_user_rating){ //check if user rating this store or not
            $store=Store::where('id',$request['id'])->first();//get store data
            $rating_sum=$store['rating_sum']+$request['rating']; //sum the old rating sum with new rating value
            $rating=$rating_sum/($store['rating_count']+1); // get the final rating value

            //add rating and update store data(rating,rating_sum,rating_count)
            $add_rating=Store::where('id',$request['id'])
                ->increment('rating_count',1,['rating'=>doubleval($rating),'rating_sum'=>$rating_sum]);

            //save user who add rating in rating table to prevent rating again for the same store
            if ($add_rating) {
                $store_user_data = Rating::create([
                    'store_id' => $request['id'],
                    'rating' => $request['rating'],
                    'user_ip_address' => $this->getIPAddress(),
                    'user_mac_address' => $this->getMacAddress()
                ]);
            }
            $message='You have rated this store'.'('.$store['store_name'].') for'.'('.$request['rating'].') stars';
            return redirect()->back()->with('response',['status'=>1,'message'=>$message]);
        }else{
            $message='You have already rated this store';
            return redirect()->back()->with('response',['status'=>2,'message'=>$message]);
        }

    }


    public function search(Request $request)
    {
        $validate = $request->validate(['search' => 'required']);
        $data = Store::where('store_name', 'LIKE', '%' . $validate['search'] . '%')->paginate($this->paging)->withQueryString();
        return view('website.home')->with('data',$data)->with('categories',$this->getCategories());

    }

    public function details($id)
    {
        $data = Store::where('id', $id)->with(array('category' => function ($query) {
            $query->select(['id', 'category_name']);
        }))->first();
        return view('website.details')->with('index',$data);

    }

    public function getCategories(){
       return Category::get()->toArray();
    }

}
