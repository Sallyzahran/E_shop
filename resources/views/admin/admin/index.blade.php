@extends('admin.layout.index')

@section('content')

<a href="{{ route('admins.create') }}" class="btn btn-success mb-3 btn-lg">Add</a>

<div class="row">
    <table class="table table-bordered text-center">

<thead class="table-dark">

    <tr>

        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>


      </tr>

</thead>

<tbody>
  @forelse ($items as  $key =>$item)




    <tr>

        <th>{{ $key+1 }}</th>
        <th>{{ $item->code }}</th>
        <th>{{ $item->name }}</th>
        <th>
         <a class="btn btn-info btn-sm" href="{{ route('admins.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
          </th>

          <th>


         <form  action="{{ route('admins.destroy', $item->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

        </form>
          </th>



      </tr>

     @empty

    <tr>

      <th colspan="4">
     <h2 class="text-center">No Data</h2>
      </th>

       </tr>
   @endforelse

</tbody>


    </table>


</div>
@endsection
