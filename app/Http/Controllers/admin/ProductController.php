<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $items = Product::all();
         return view('admin.product.index',compact('items'));

     }

     public function create(){

         return view('admin.product.create');
     }

     public function store(Request  $request){

        $this->validate($request,[
             'title_en' => 'required',
             'title_ar' => 'required',
             'description_en' => 'required',
             'description_ar' => 'required',
             'price' => 'required',
             'main_image' => 'required|image'


        ]);


        $data = $request->except('_token','main_image','tags');
        if($request->hasFile('main_image'))
        $data['main_image'] = Storage::disk('public')->put('images',$request->file('main_image'));
        $product = Product::query()->create($data);

        if($request->has('tags'))
        $product->tags()->sync($request->get('tags'));
        return redirect()->route('products.index');

     }

     public function edit($id){

         $item = Product::query()->find($id);
          return view('admin.product.edit',compact('item'));

      }

      public function update(Request  $request,$id){

         $this->validate($request,[
            'title_en' => 'required',
             'title_ar' => 'required',
             'description_en' => 'required',
             'description_ar' => 'required',
             'price' => 'required',
             'main_image' => 'nullable|image'

         ]);


         $data = $request->except('_token','main_image','tags','key_ar','value_ar','key_en','value_en','sizes','color_en','color_ar');
         if($request->hasFile('main_image'))
        $data['main_image'] = Storage::disk('public')->put('images',$request->file('main_image'));

        $product = Product::query()->find($id);
         $product->update($data);


        if($request->has('sizes'))
        $product->sizes()->sync($request->get('sizes'));

        if($request->has('tags'))
        $product->tags()->sync($request->get('tags'));

        if($request->get('key_ar') and $request->get('value_ar') and  $request->get('key_en') and $request->get('value_en'))
        $product->props()->create($request->only('key_ar','value_ar','key_en','value_en'));

        if($request->get('color_en') and $request->get('color_ar'))
        $product->colors()->create($request->only('color_en','color_ar'));

         return redirect()->route('products.index');

      }

      public function destroy($id){
        Product::query()->find($id)->delete();
          return redirect()->route('products.index');
         }
}
