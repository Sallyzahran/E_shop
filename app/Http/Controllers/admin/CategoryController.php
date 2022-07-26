<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){

        $items = Category::all();
         return view('admin.category.index',compact('items'));

     }

     public function create(){

         return view('admin.category.create');
     }

     public function store(Request  $request){

        $this->validate($request,[
             'title_en' => 'required',
             'title_ar' => 'required',


        ]);


        $data = $request->only('title_en','title_ar');
        if($request->hasFile('logo'))
        $data['logo'] = Storage::disk('public')->put('logos',$request->file('logo'));
        Category::query()->create($data);
        return redirect()->route('categories.index');

     }

     public function edit($id){

         $item = Category::query()->find($id);
          return view('admin.category.edit',compact('item'));

      }

      public function update(Request  $request,$id){

         $this->validate($request,[
            'title_en' => 'required',
            'title_ar' => 'required',


         ]);


         $data = $request->only('title_en','title_ar');
         if($request->hasFile('logo'))
        $data['logo'] = Storage::disk('public')->put('logos',$request->file('logo'));
         Category::query()->find($id)->update($data);
         return redirect()->route('categories.index');

      }

      public function destroy($id){
        Category::query()->find($id)->delete();
          return redirect()->route('categories.index');
         }
}
