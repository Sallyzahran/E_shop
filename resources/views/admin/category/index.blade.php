@extends('admin.layout.index')

@section('content')

<a href="{{ route('categories.create') }}" class="btn btn-success mb-3 btn-lg">Add</a>

<div class="row">
    <table class="table table-bordered text-center">

<thead class="table-dark">

    <tr>

        <th>ID</th>
        <th>Title - English</th>
        <th>Title - Arabic</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Size</th>



      </tr>

</thead>

<tbody>
  @forelse ($items as  $key =>$item)




    <tr>

        <th>{{ $key+1 }}</th>
        <th>{{ $item->title_en }}</th>
        <th>{{ $item->title_ar }}</th>
        <th>
            @if ($item->logo )
             <img   height="100" src="{{ asset('storage/'.$item->logo ) }} " alt="">
            @else
               No Image
            @endif

            </th>
        <th>
         <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
          </th>

          <th>


         <form  action="{{ route('categories.destroy', $item->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

        </form>
          </th>

          <th>
            <a class="btn btn-info btn-sm" href="{{ route('category.sizes', $item->id) }}"><i class="fa fa-edit"></i></a>
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
