<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\MyFunction;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class StoresController extends Controller
{
    use MyFunction;

    public function index(Request $request)
    {

    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'store_name' => 'required',
            'category_id' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        $data = [
            'store_name' => $validate['store_name'],
            'category_id' => $validate['category_id'],
            'phone_number' => $validate['phone_number'],
            'address' => $validate['address'],
        ];

        //check if image added or not
        if (empty($request->file('logo'))) {
            $data['logo'] = env('DEFAULT_IMAGE');
        } else {
            $data['logo'] = $this->uploadImage($request);
        }

        //add data into DB
        $response = Store::create($data);

        if ($response) {
            $message = 'the store' . '(' . $validate['store_name'] . ') added successfully';
            return redirect()->route('store.show')->with('response', ['status' => 1, 'message' => $message]);
        } else {
            $message = 'the store' . '(' . $validate['store_name'] . ') not added ,Try again!';
            return redirect()->back()->with('response', ['status' => 0, 'message' => $message]);
        }
    }


    public function show()
    {
        $paging = 7;
        $data = Store::with(array('category' => function ($query) {
            $query->select(['id', 'category_name']);
        }))->paginate($paging);

        //dd($data);
        return view('dashboard.dsh_stores')->with(['data' => $data]);
    }

    public function search(Request $request)
    {
        $paging = 7;
        $validate = $request->validate(['search' => 'required']);
        $data = Store::where('store_name', 'LIKE', '%' . $validate['search'] . '%')->paginate($paging)->withQueryString();
        return view('dashboard.dsh_stores')->with(['data' => $data]);

    }

    public function edit($id)
    {
        $data = Store::where('id', $id)->get()->first();
        $categories = Category::get()->toArray();
        return view('dashboard.dsh_edit_store')->with('data', $data)->with('categories', $categories);
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'store_name' => 'required',
            'category_id' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        $data = [
            'store_name' => $validate['store_name'],
            'category_id' => $validate['category_id'],
            'phone_number' => $validate['phone_number'],
            'address' => $validate['address'],
        ];

        //check if add new image or not and delete old image
        if (!empty($request->file('logo'))) {
            $data['logo'] = $this->updateImage($request);
        }

        $response = Store::where('id', $validate['id'])->update($data);


        if ($response) {
            $message = 'the store' . '(' . $validate['store_name'] . ') updated successfully';
            return redirect()->route('store.show')->with('response', ['status' => 1, 'message' => $message]);
        } else {
            $message = 'the store' . '(' . $validate['store_name'] . ') not updated ,Try again!';
            return redirect()->route('store.show')->with('response', ['status' => 0, 'message' => $message]);
        }

    }

    public function addStore()
    {
        $categories = Category::get()->toArray();
        return view('dashboard.dsh_add_store')->with('categories', $categories);
    }


    public function destroy($id)
    {
        $result = Store::where('id', $id)->delete();
        if ($result) {
            return redirect()->back();
        }
    }
}
