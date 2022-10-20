@extends('employees.layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

@endpush

@section('content')


<div class="row py-2">
    <div class="col-6">
        <span>
            <h2>Assigned number list</h2>
        </span>

        @if(Session::has('message'))

        <p class="alert
          {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('message') }}</p>

        @endif

    </div>



</div>

<div>

    <form action="{{route('user.storeassign')}}" method="post" enctype="multipart/form-data">

        @csrf

        <select class="form-select col-md-6" name="user_id" id="">

            <option value="" selected disabled>Select User</option>

            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>

        <button class="btn btn-primary mt-3 fa fa-paper-plane" type="submit"> Assign Data</button>

        <div class='mt-4'>

        </div>


        <div>
            <label for="checkall">Select all</label>
            <input type="checkbox" name="select-all" id="select-all" />

        </div>



        <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($csv as $data)
                <tr>
                    <td><input class="" type="checkbox" value="{{$data->assigned->id}}" name="data[]"></td>
                    <td>{{$data->assigned->name}}</td>
                    <td>{{$data->assigned->phone}}</td>
                    <td>{{$data->assigned->mobile}}</td>
                    <td>{{$data->assigned->address}}</td>
                    <td>{{$data->assigned->email}}</td>
                    <td>{{$data->assigned->date}}</td>
                    <td> <a href="{{url('')}}" button type="button" class="btn btn-warning fa fa-edit"> edit</a>

                        <a href="{{url('')}}" onclick="return confirm('Are you sure you want to delete this item?')" button type=" button" class="btn btn-danger fa fa-trash"> delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </form>

</div>




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


<script language="JavaScript">
    // Listen for click on toggle checkbox
    $('#select-all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('.alert-success').fadeIn().delay(3000).fadeOut();
    });
</script>

<script>
    $(document).ready(function() {
        $('.alert-danger').fadeIn().delay(3000).fadeOut();
    });
</script>
@endpush