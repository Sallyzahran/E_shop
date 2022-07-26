@extends('admin.layout.index')

@section('content')


<div class="row">
    <table class="table table-bordered text-center">

<thead class="table-dark">

    <tr>

        <th>ID</th>
        <th>Size</th>
        <th>Delete</th>
        <th>Save</th>





      </tr>

</thead>

<tbody>
  @forelse ($sizes as  $key =>$item)




    <tr>

        <th>{{ $key+1 }}</th>
        <th>{{ $item->value }}</th>

          <th>



     <form  action="{{ route('category.sizes.delete', $item->id) }}" method="post">
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

   <tr>

    <td colspan="3">
        <form id="createForm" action="{{ route('category.sizes.store',$category->id) }}" method="post">
            @csrf
            <input class="form-control" name="value" value="{{ old('value') }}">
        </form>
    </td>

    <th>

<button form="createForm" type="submit" class="btn btn-success">Add</button>

    </th>
   </tr>

</tbody>

    </table>


</div>
@endsection
