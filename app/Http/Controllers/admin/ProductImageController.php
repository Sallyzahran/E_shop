<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;


class ProductImageController extends Controller
{
    public function destroy($id){

        ProductImages::query()->find($id)->delete();
        return back();
    }
    public function store(Request $request){

        $this->validate($request,[

            'image' => 'required|image',
         
        ]);
        $data = $request->except('_token','image');
        $data['path'] = Storage::disk('public')->put('images',$request->file('image'));
        ProductImages::query()->create($data);
        return back();
    }



}
