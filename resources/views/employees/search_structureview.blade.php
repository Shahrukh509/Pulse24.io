@extends('employees.layouts.main')


@push('css')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet">

@endpush

@section('content')

<div class="row py-2 ">
    <div class="col-6">
        <span>
            <h2> Hierarchy Search Leads History</h2>
        </span>

    </div>

</div>

<table id="example" class="table table-striped" style="width:100%">



    <thead>
        <tr>
            <th>Assigned To</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>



        @foreach($search as $val)
        <tr>

            <td>{{$val->assigned->name}}</td>
            <td>{{$val->assigned->phone}}</td>
            <td>{{$val->assigned->mobile}}</td>
            <td>{{$val->assigned->address}}</td>
            <td>{{$val->assigned->email}}</td>
            <td>{{$val->assigned->date}}</td>
            <td>{{$val->status}}</td>

        </tr>


        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th>Assigned To</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </tfoot>




</table>





@endsection