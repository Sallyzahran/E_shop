@extends('admin.layout.index')

@section('content')

<a href="{{ route('sliders.index') }}" class="btn btn-success mb-3 btn-lg">All</a>

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
        <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data" >
           @csrf


<div class="form-group">
    <label for="">Small Title - English</label>
    <input class="form-control" name="small_title_en" value="{{ old('small_title_en') }}"  >

</div><!-- Small Title - English-->
<div class="form-group">
    <label for="">Big Title - English</label>
    <input class="form-control" name="big_title_en" value="{{ old('big_title_en') }}"  >

</div><!-- Big Title - English -->

<div class="form-group">
    <label for="">Small Title - Arabic</label>
    <input class="form-control" name="small_title_ar" value="{{ old('small_title_ar') }}"  >

</div><!-- Small Title - Arabic -->
<div class="form-group">
    <label for="">Big Title - Arabic</label>
    <input class="form-control" name="big_title_ar" value="{{ old('big_title_ar') }}"  >

</div><!--Big Title - Arabic -->

<div class="form-group">
    <label for="">Image</label>
    <input type="file" class="form-control" name="image" >

</div><!-- Code -->



<button type="submit" class="btn btn-primary">Add </button>


</form>
    </div><!-- card-body -->




</div><!-- card -->
@endsection
