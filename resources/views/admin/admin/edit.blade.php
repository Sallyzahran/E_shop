@extends('admin.layout.index')

@section('content')

<a href="{{ route('admins.index') }}" class="btn btn-success mb-3 btn-lg">All</a>

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
        <form action="{{ route('admins.update', $item->id )}}" method="post" >

           @csrf
           @method('PUT')


<div class="form-group">
    <label for="">Name</label>
    <input class="form-control" name="name" value="{{ old('name', $item->name)}}"  >

</div><!-- name -->

<div class="form-group">
    <label for="">Code</label>
    <input class="form-control" name="code" value="{{ old('code',$item->code )}}"   >

</div><!-- Code -->

<div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" value="{{ old('password') }}" >

</div><!-- Password -->



<button type="submit" class="btn btn-primary my-3">Save </button>


</form>
    </div><!-- card-body -->




</div><!-- card -->
@endsection
