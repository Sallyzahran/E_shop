<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductColor;


class ProductColorController extends Controller
{
    public function destroy($id){
        ProductColor::query()->find($id)->delete();
        return back();
    }
    public function update(Request $request,$id){
        ProductColor::query()->find($id)->update($request->except('_token','_method'));
        return back();
       }

    }
