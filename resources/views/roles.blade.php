@extends('layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

@endpush


@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif



<form class="row g-3 " action="{{url('roles')}}" method="post">
    @csrf
    <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">Add Role</label>
        <input type="text" name="role" class="form-control" id="validationTooltip01" value="" required>

    </div>


    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>

<div class="mt-5">

</div>

<div class="row">

    <div class="col-md-12">

        <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>

                    <th>Name</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>

                    <td>{{$role->name}}</td>

                    <td> <a href="{{url('/roles/edit',$role->id)}}" button type="button" data-role_id="{{$role->id}}" data-val="{{$role->name}}" class="fa fa-edit btn btn-primary role-edit" data-toggle="modal" data-target="#exampleModal"> edit</a>

                        <a href="{{url('')}}" onclick="return confirm('Are you sure you want to delete this item?')" button type=" button" class="btn btn-danger fa fa-trash"> delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>

                    <th>Name</th>

                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{url('/roles/update')}}" method="post">
                @csrf
                <input type="hidden" name="role_id" id="role_id">
                <div class="col-md-4 position-relative">
                    <label for="validationTooltip01" class="form-label">Current Role</label>
                    <input type="text" name="role" class="form-control" id="currentroleval" value="" required>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>



        </div>
    </div>
</div>




@endsection
@push('js')






<script>
    $(document).on('click', '.role-edit', function() {

        var val = $(this).attr('data-val');
        var role_id = $(this).attr('data-role_id');
        $('#currentroleval').val(val);
        $('#role_id').val(role_id);
        $('#exampleModal').modal('show');

    })


    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


@endpush