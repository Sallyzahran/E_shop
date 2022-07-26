@extends('front.layout.index')
@section('content')



 <div class="container">
    <h3 class="w-108 pt-3 ">My Orders</h3>
    <br>
    <table class="table table-striped table-bordered text-center">
          <thead class="text-center">
            <tr >

                <th>ID</th>
                <th>Total</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>


          </thead>

          <tbody>

               @forelse($orders as $index => $invoice)
                <tr>
                     <td>{{$invoice->id}}</td>
                     <td>{{$invoice->total}}</td>
                     <td>{{$invoice->items()->count()}}</td>
                     <td>{{$invoice->date}}</td>
                     <td>{{$invoice->time}}</td>
                     <td>{{$invoice->status}}</td>

                    </tr>
                    @empty
                       <tr><td colspan="1000">No Data</td></tr>
                    @endforelse
                </tbody>
    </table>
 </div>

@endsection
