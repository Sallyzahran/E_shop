@extends('admin.layout.index')

@section('content')

<a href="{{ route('categories.index') }}" class="btn btn-success mb-3 btn-lg">All</a>

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
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" >
           @csrf


<div class="form-group">
    <label for="">Title - English</label>
    <input class="form-control" name="title_en" value="{{ old('title_en') }}"  >

</div><!-- title en -->

<div class="form-group">
    <label for="">Title - Arabic</label>
    <input class="form-control" name="title_ar" value="{{ old('title_ar') }}"  >

</div><!-- title ar -->

<div class="form-group">
    <label for="">Image</label>
    <input type="file" class="form-control" name="logo" >

</div><!-- Code -->



<button type="submit" class="btn btn-primary">Add </button>


</form>
    </div><!-- card-body -->




</div><!-- card -->
@endsection
