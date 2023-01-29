<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

trait MyFunction
{
    public function uploadImage($request)
    {
        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $extension;
        //Storage::disk('public');
        return $request->file('logo')->storeAs('/admins/ID-o68sa48m79a/logo', $file_name, 'public');
    }

    public function updateImage($request)
    {
        if ($request['logo_path']!=env('DEFAULT_IMAGE')){
            Storage::delete('/public/'.$request['logo_path']);
        }
        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $extension;
        return $request->file('logo')->storeAs('/admins/ID-o68sa48m79a/logo', $file_name, 'public');
    }

    function getMacAddress(){
         return substr(shell_exec('getmac'),159,20);
    }

    function getIPAddress(): ?string
    {
        return \request()->ip();
    }

}
