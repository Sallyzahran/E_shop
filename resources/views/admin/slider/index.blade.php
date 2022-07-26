@extends('admin.layout.index')

@section('content')

<a href="{{ route('sliders.create') }}" class="btn btn-success mb-3 btn-lg">Add</a>

<div class="row">
    <table class="table table-bordered text-center">

<thead class="table-dark">

    <tr>

        <th>ID</th>
        <th>Small Title - English</th>
        <th>Big Title - English</th>
        <th>Small Title - Arabic</th>
        <th>Big Title - Arabic</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>



      </tr>

</thead>

<tbody>
  @forelse (\App\Models\Slider::all() as  $key =>$item)




    <tr>

        <th>{{ $key+1 }}</th>
        <th>{{ $item->small_title_en }}</th>
        <th>{{ $item->big_title_en }}</th>
        <th>{{ $item->small_title_ar }}</th>
        <th>{{ $item->big_title_ar }}</th>

        <th>
            @if ($item->image )
             <img   height="100" src="{{ asset('storage/'.$item->image ) }} " alt="">
            @else
               No Image
            @endif

            </th>
        <th>
         <a class="btn btn-info btn-sm" href="{{ route('sliders.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
          </th>

          <th>


         <form  action="{{ route('sliders.destroy', $item->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

        </form>
          </th>



      </tr>

     @empty

    <tr>

      <th colspan="1000">
     <h2 class="text-center">No Data</h2>
      </th>

       </tr>
   @endforelse

</tbody>


    </table>


</div>
@endsection
