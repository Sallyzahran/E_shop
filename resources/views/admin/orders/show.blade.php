@extends('admin.layout.index')

@section('content')


<div class="row">

    <h1>The Order Data</h1>
    <table class="table table-bordered text-center">

<thead class="table-dark">

    <tr>

        <th>ID</th>
        <th>User Info</th>
        <th>Contact Info</th>
        <th>Total</th>
        <th>Status</th>


      </tr>

</thead>

<tbody>

    <tr>

        <th>{{ $order->id }}</th>
        <th>{{ $order->full_name }} <br> {{ $order->full_address }} </th>
        <th>{{ $order->phone }} <br> {{ $order->email }} </th>
        <th>{{ $order->total }}</th>
        <th>
            <form action="{{ route('orders.update', $order) }}" method="post" >
                @csrf
                @method('PUT')
                <select name="status">
                    @php($status =[
                    'pending' =>'pending',
     'shipping' =>'shipping ',
     'rejected' =>'rejected',
      'delivered'=>'delivered',
     'closed'=>'closed',])

                     @foreach($status as $statue => $title)
                          <option {{ $statue == $order->status ? "selected":"" }} value="{{$statue}}">{{$title}}</option>
                     @endforeach
                 </select>
                 <button class="btn btn-success" type="submit"> Save
                 </button>
            </form>
        </th>



      </tr>



</tbody>


    </table > <!-- order data -->

    <h1 class="pt-3"> Order Items Info</h1>

    <table class="table table-bordered text-center ">

<thead class="table-dark">

    <tr>

        <th>ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Color</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Total</th>



      </tr>

</thead>

<tbody>
@foreach ($order->items as $item)


    <tr>

        <th>{{ $item->id }}</th>
        <th>{{ $item->product_name }} </th>
        <th>{{ $item->product_price  }}  </th>
        <th>{{ $item->chosen_color ?? "Not Selected" }}</th>
        <th>{{ $item->chosen_size ?? "Not Selected" }}</th>
        <th>{{ $item->quantity }} </th>
        <th>{{ $item->sub_total }} </th>

@endforeach

      </tr>



</tbody>


    </table>


</div>
@endsection
