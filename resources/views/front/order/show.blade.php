@extends('front.layout.index')

@section('content')

@isset($order)





    <div class="container">

<div class="row">


    <table class="table table-bordered text-center">
<h1 class="py-3">The Order Data</h1>
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
        <th>{{ $order->status }}</th>



      </tr>



</tbody>


    </table > <!-- order data -->



    <table class="table table-bordered text-center pt-3 ">
<h1 class="py-3"> Order Items Info</h1>
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



<div class="row">
@if($order->tracks()->count())
<table class="table table-bordered text-center pt-3 ">
    <h1 class="py-3"> order tracking</h1>
    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Status</th>
            <th>Notes</th>
            <th>Date</th>
            <th>Time</th>




          </tr>

          </thead>

    <tbody>


    @foreach ($order->tracks as $track)


        <tr>

            <th>{{ $track->id }}</th>
            <th>{{ $track->status}} </th>
            <th>{{ $track->message }}  </th>
            <th>{{ $track->created_at->format('Y-m-d') }}  </th>
            <th>{{ $track->created_at->format('h:i') }} </th>


    @endforeach

          </tr>



    </tbody>


        </table>


 @endif

    </div>

@else

<div class="container pt-5 ">
    <h3 class="py-3">find your order by order code</h3>
    <form>
         <input name="order_code" class="form-control" value="{{ old('order_code') }}">
         <button class="btn btn-success my-3">Search</button>
    </form>
</div>

@endisset
@endsection
