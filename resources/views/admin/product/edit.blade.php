@extends('admin.layout.index')

@section('content')

<a href="{{ route('products.index') }}" class="btn btn-success mb-3 btn-lg">All</a>

<div class="card">

    <div class="card-header">

       Edit
    </div> <!-- card-header -->

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form  id="uploadForm"  action="{{ route('products.update', $item->id )}}" method="post" >

           @csrf
           @method('PUT')



           <div class="row">

            <div class="col-6 form-group">
    <label for="">Title - English</label>
    <input class="form-control" name="title_en" value="{{ old('title_en', $item->title_en) }}"  >

</div><!-- title en -->

<div class="col-6 form-group">
    <label for="">Title - Arabic</label>
    <input class="form-control" name="title_ar" value="{{ old('title_ar',$item->title_ar) }}"  >

</div><!-- title ar -->

<div class="col-12 form-group">
    <label for="">Category</label>
    <select name="category_id" class="form-control">
        @foreach (\App\Models\Category::all() as $cat)


      <option   {{ old('category_id',$item->category_id) == $cat->id ? "selected":"" }}   value="{{ $cat->id}}">{{ $cat->title_en }} - {{ $cat->title_ar }} </option>
        @endforeach

    </select>

</div><!-- Category -->


<div class="col-12 form-group">
    <label for="">Sizes</label>
    <select name="sizes[]" multiple class="form-control">
        @foreach (\App\Models\CategorySize::query()->where('category_id',$item->category_id)->get() as $size)


      <option   {{ $item->sizes->contains($size) ? "selected":"" }}   value="{{ $size->id}}">{{ $size->value }} </option>
        @endforeach

    </select>

</div><!-- Sizes -->

<div class="col-12 form-group">
    <label for="">Tags</label>
    <select name="tags[]" multiple class="form-control">
        @foreach (\App\Models\Tag::all() as $tag)


      <option   {{ $item->tags->contains($tag) ? "selected":"" }}   value="{{ $tag->id}}">{{ $tag->title_en }} - {{ $tag->title_ar }} </option>
        @endforeach

    </select>

</div><!-- tags -->

            <div class="col-6 form-group">
    <label for="">Description - English</label>
    <textarea class="form-control" name="description_en" >{{ old('description_en',$item->description_en) }}</textarea>

</div><!-- Description en -->

<div class="col-6 form-group">
    <label for="">Description - Arabic</label>
    <textarea class="form-control" name="description_ar" >{{ old('description_ar',$item->description_ar) }}</textarea>

</div><!-- Description ar -->



<div class="col-6 form-group">
    <label for="">Price</label>
    <input class="form-control" name="price" value="{{ old('price',$item->price) }}" >

</div><!-- Price -->

           </div><!-- row -->




<div class="form-group">
    <label for="">Main Image</label>
    <input type="file" class="form-control" name="main_image" >

</div><!-- Code -->



<div class="row ">

<div class="col-12 pt-3"><h5>Add Properties</h5></div>



  <div class=" form-group col-3">
        <label for="">Title - English</label>
        <input class="form-control" type="text" name="key_en"  >


    </div><!-- Title - English -->

    <div class="form-group col-3">
        <label for=""> Value - English</label>
        <input class="form-control" type="text" name="value_en"   >


    </div><!-- Value - English -->



  <div class=" form-group col-3">
        <label for="">Title - Arbic</label>
        <input class="form-control" type="text" name="key_ar"   >


    </div><!-- Title - English -->

    <div class="form-group col-3">
        <label for=""> Value - Arabic</label>
        <input class="form-control" type="text" name="value_ar"  >


    </div><!-- Value - English -->







</div><!--Properties  -->


<div class="row">
    <div class="col-12"><h5>Product Properties</h5></div>
    @forelse($item->props as $prop)
          <form class="col-8" id="updateProp{{$prop->id}}" method="post" action="{{route('products_props.update', $prop->id)}}">
                   @csrf
                  @method('PUT')

                 <div class="row">

                        <div class=" form-group col-3">
                            <label for="">Title - English</label>
                            <input class="form-control" type="text" name="key_en"  value="{{ $prop->key_en }}"  >


                        </div><!-- Title - English -->

                        <div class="form-group col-3">
                            <label for=""> Value - English</label>
                            <input class="form-control" type="text" name="value_en"  value="{{  $prop->value_en}}" >


                        </div><!-- Value - English -->



                      <div class=" form-group col-3">
                            <label for="">Title - Arbic</label>
                            <input class="form-control" type="text" name="key_ar"  value="{{ $prop-> key_ar}}" >


                        </div><!-- Title - English -->

                        <div class="form-group col-3">
                            <label for=""> Value - Arabic</label>
                            <input class="form-control" type="text" name="value_ar" value="{{$prop-> value_ar }}"  >


                        </div><!-- Value - English -->
                         </div>
                </form>


          <div class="form-group col-3">
                 <label for="">Mange</label>
                 <br>
                 <button form="updateProp{{$prop->id}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                 <button form="deleteProp{{$prop->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                 <form id="deleteProp{{$prop->id}}" action="{{route('products_props.destroy', $prop->id)}}" method="post"
                    >@csrf
                    @method('delete')
                    </form>
          </div>
          @empty
           <div class="col-12">
                  </div>
                <h4>No Data</h4>
</div>
 @endforelse

<div class="row ">

    <div class="col-12 pt-3"><h5>Add Colors</h5></div>



      <div class=" form-group col-3">
            <label for="">Color - English</label>
            <input class="form-control" type="text" name="color_en"  >


        </div><!-- Color - English -->

        <div class="form-group col-3">
            <label for=""> Color - Arabic</label>
            <input class="form-control" type="text" name="color_ar"   >


        </div><!-- Color - Arabic -->


    </div>   <!-- Colors -->

    <div class="row">
        <div class="col-12"><h5>Product Colors</h5></div>
        @forelse($item->colors as $color)
              <form class="col-8" id="updateColor{{$color->id}}" method="post" action="{{route('products_colors.update', $color->id)}}">
                       @csrf
                      @method('PUT')

                     <div class="row">

                            <div class="form-group col-4">
                                  <label for="">Color - English</label>
                                  <input class="form-control"type="text" name="color_en" value="{{ $color->color_en }}">
                            </div>
                            <div class="form-group col-4">
                                  <label for="">Color - Arabic</label>
                                  <input class="form-control"type="text" name="color_ar" value="{{ $color->color_ar }}">
                                </div>
                             </div>
                    </form>


              <div class="form-group col-4">
                     <label for="">Mange</label>
                     <br>
                     <button form="updateColor{{$color->id}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                     <button form="deleteColor{{$color->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                     <form id="deleteColor{{$color->id}}" action="{{route('products_colors.destroy', $color->id)}}" method="post"
                        >@csrf
                        @method('delete')
                        </form>
              </div>
              @empty
               <div class="col-12">
                      </div>
                    <h4>No Data</h4>
    </div>

     @endforelse






</form>

<div class="row ">


    <div class="col-12 pt-3"><h5> Properties Images</h5></div>
    <div class="col-12">


    <form action="{{ route('products_images.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="product_id" value="{{ $item->id }}">
    <input type="file" name="image" class="form-control">
    <button type="submit" class="btn btn-success my-3">Add</button>
    </form>
   </div>
    @forelse ($item->images as $image)



    <div class="col-4">
   <img height="100" src="{{ asset('storage/'.$image->path) }}" alt="">
    </div>

        <div class="form-group col-8">
     <button form="deleteProp{{ $image->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
    <form id="deleteProp{{ $image->id }}" action="{{ route('products_images.destroy', $image->id) }}" method="post">
        @csrf
        @method('delete')


         </div><!-- delete button -->
            @empty
            <div class="col-12">
                <h4>No Image</h4>
            </div>
         @endforelse
</div><!-- images -->

    </div><!-- card-body -->
<div class="card-footer">
    <button form="uploadForm" type="submit" class="btn btn-primary"  >Save </button>


</div>



</div><!-- card -->
@endsection
