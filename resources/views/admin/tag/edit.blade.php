@extends('admin.layout.index')

@section('content')

<a href="{{ route('tags.index') }}" class="btn btn-success mb-3 btn-lg">All</a>

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
        <form action="{{ route('tags.update', $item->id )}}" method="post" >

           @csrf
           @method('PUT')


           <div class="form-group">
            <label for="">Title - English</label>
            <input class="form-control" name="title_en" value="{{ old('title_en', $item->title_en) }}"  >

        </div><!-- title en -->

        <div class="form-group">
            <label for="">Title - Arabic</label>
            <input class="form-control" name="title_ar" value="{{ old('title_ar', $item->title_ar) }}"  >

        </div><!-- title ar -->




        <button type="submit" class="btn btn-primary">Add </button>


</form>
    </div><!-- card-body -->




</div><!-- card -->
@endsection
