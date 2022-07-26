

@extends('admin.layout.index')
@section('content')
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th width="50%">Message</th>
                </tr>
            </thead>
            <tbody >
                @forelse($contacts as $key =>$item)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <th>{{$item->name}}</th>
                        <th>{{$item->email}}</th>
                        <th>{{$item->subject}}</th>
                        <th>{{$item->message}}</th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="10000">
                          No Data
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
