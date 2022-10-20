@extends('layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">




<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"> -->


@endpush

@section('content')

@if(session()->has('message'))
<div class="alert {{ Session::get('alert-class') }}">
    {{ session()->get('message') }}
</div>
@endif

 @if ($errors->any())
   <ul>
     @foreach ($errors->all() as $error)
         <li style="color:red"><strong>*{{$error}}</strong></li>
     @endforeach
 </ul>
 @endif


<div class="row py-2">
    <div class="col-6">
        <span>
            <h2>
            Users</h2>
        </span>

    </div>


    <div class="col-6">
        <a href="{{url('create/users')}}" class="btn btn-wide btn-primary pull-right"><i class="fa fa-plus"></i> Create New</a>
    </div>
</div>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->userrole->name}}</td>
            <td>

                <a href="{{url('user/edit',$user->id)}}" button type="button" class="btn btn-warning fa fa-edit"> edit</a>
            </td>
                <td>
                <a href="{{url('user/delete',$user->id)}}" onclick="return confirm('Are you sure you want to delete this item?')" button type=" button" class="btn btn-danger fa fa-trash"> delete</a>

            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
            <th></th>
        </tr>
    </tfoot>
</table>





@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>




<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush