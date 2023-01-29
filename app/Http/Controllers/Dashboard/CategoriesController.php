<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CategoriesController extends Controller
{

    public function index(Request $request)
    {

    }


    public function store(Request $request)
    {
        $validate=$request->validate(['category_name'=>'required']);
        $response=Category::create(['category_name'=>$validate['category_name']]);
        if ($response){
            $message='the category'.'('.$validate['category_name'].') added successfully';
            return redirect()->back()->with('response',['status'=>1,'message'=>$message]);
        }else{
            $message='the category'.'('.$validate['category_name'].') not added ,Try again!';
            return redirect()->back()->with('response',['status'=>0,'message'=>$message]);

        }
    }


    public function show()
    {
        $paging = 7;
        $data = Category::paginate($paging);
        return view('dashboard.dsh_categories')->with(['data' => $data]);
    }

   public function search(Request $request)
    {
        $paging = 7;
        $validate=$request->validate(['search'=>'required']);
        $data = Category::where('category_name','LIKE','%'.$validate['search'].'%')->paginate($paging)->withQueryString();
            return view('dashboard.dsh_categories')->with(['data' => $data]);

    }


    public function update(Request $request)
    {
        $validate = $request->validate(['id' => 'required', 'category_name' => 'required',]);
        $result = Category::where('id', $validate['id'])->update(['category_name' => $validate['category_name']]);
        if ($result) {
            $message='The category updated successfully';
            return redirect()->back()->with('response', ['status' =>1, 'message' => $message]);
        }else{
            $message='The category not updated ,Try again';
            return redirect()->back()->with('response', ['status' =>0, 'message' => $message]);

        }
        //dd($request->toArray());
    }


    public function destroy(Request $request)
    {
       $result=Category::find($request['id'])->delete();
        if ($result) {
            $message='The category deleted successfully';
            return redirect()->back()->with('response', ['status' =>1, 'message' => $message]);
        }else{
            $message='The category not deleted ,Try again';
            return redirect()->back()->with('response', ['status' =>0, 'message' => $message]);

        }
    }



//    public function restore($id)
//    {
//        $result=Category::onlyTrashed()->find($id)->restore();
//        Store::onlyTrashed()->where('category_id',$id)->restore();
//        if ($result){
//            return redirect()->back();
//        }
//    }
}
