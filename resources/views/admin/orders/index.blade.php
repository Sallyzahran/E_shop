@extends('admin.layout.index')

@section('content')


<div class="row">
    <table class="table table-bordered text-center">

<thead class="table-dark">

    <tr>

        <th>ID</th>
        <th>User Info</th>
        <th>Contact Info</th>
        <th>Total</th>
        <th>Status</th>
        <th>Manage</th>


      </tr>

</thead>

<tbody>
  @forelse ($items as  $key =>$item)




    <tr>

        <th>{{ $key+1 }}</th>
        <th>{{ $item->full_name }} <br> {{ $item->full_address }} </th>
        <th>{{ $item->phone }} <br> {{ $item->email }} </th>
        <th>{{ $item->total }}</th>
        <th>{{ $item->status }}</th>

        <th>
         <a class="btn btn-info btn-sm" href="{{ route('orders.show', $item->id) }}"><i class="fa fa-eye"></i></a>
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
