@extends('admin.layout.index')

@section('content')

<a href="{{ route('products.index') }}" class="btn btn-success mb-3 btn-lg">All</a>

<div class="card">

    <div class="card-header">

       Add
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
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" >
           @csrf

           <div class="row">

            <div class="col-6 form-group">
    <label for="">Title - English</label>
    <input class="form-control" name="title_en" value="{{ old('title_en') }}"  >

</div><!-- title en -->

<div class="col-6 form-group">
    <label for="">Title - Arabic</label>
    <input class="form-control" name="title_ar" value="{{ old('title_ar') }}"  >

</div><!-- title ar -->

<div class="col-12 form-group">
    <label for="">Category</label>
    <select name="category_id" class="form-control">
        @foreach (\App\Models\Category::all() as $cat)


      <option   value="{{ $cat->id }}">{{ $cat->title_en }} - {{ $cat->title_ar }} </option>
        @endforeach

    </select>

</div><!-- Category -->

<div class="col-12 form-group">
    <label for="">Tags</label>
    <select name="tags[]" multiple class="form-control">
        @foreach (\App\Models\Tag::all() as $tag)


      <option   value="{{ $tag->id}}">{{ $tag->title_en }} - {{ $tag->title_ar }} </option>
        @endforeach

    </select>

</div><!-- tags -->

            <div class="col-6 form-group">
    <label for="">Description - English</label>
    <textarea class="form-control" name="description_en" >{{ old('description_en') }}</textarea>

</div><!-- Description en -->

<div class="col-6 form-group">
    <label for="">Description - Arabic</label>
    <textarea class="form-control" name="description_ar" >{{ old('description_ar') }}</textarea>

</div><!-- Description ar -->

  

<div class="col-6 form-group">
    <label for="">Price</label>
    <input class="form-control" name="price" value="{{ old('price') }}" >

</div><!-- Price -->

           </div><!-- row -->




<div class="form-group">
    <label for="">Main Image</label>
    <input type="file" class="form-control" name="main_image" >

</div><!-- Code -->



<button type="submit" class="btn btn-primary">Add </button>


</form>
    </div><!-- card-body -->




</div><!-- card -->
@endsection
