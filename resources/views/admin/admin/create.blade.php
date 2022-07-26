@extends('admin.layout.index')

@section('content')

<a href="{{ route('admins.index') }}" class="btn btn-success mb-3 btn-lg">All</a>

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
        <form action="{{ route('admins.store') }}" method="post" >
           @csrf


<div class="form-group">
    <label for="">Name</label>
    <input class="form-control" name="name" value="{{ old('name') }}"  >

</div><!-- name -->

<div class="form-group">
    <label for="">Code</label>
    <input class="form-control" name="code" value="{{ old('code') }}"   >

</div><!-- Code -->

<div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" value="{{ old('password') }}" >

</div><!-- Password -->



<button type="submit" class="btn btn-primary">Add </button>


</form>
    </div><!-- card-body -->




</div><!-- card -->
@endsection
