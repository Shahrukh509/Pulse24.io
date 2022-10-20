@extends('superadmin.layouts.main')
@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

@endpush

@section('content')

<div class="row py-2 ">
    <div class="col-6">
        <span>
            <h2>Leads History</h2>
        </span>

    </div>

</div>

<div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Select Lead Status</label>
    <select class="form-select" name="status" id="status">

        <option value="" selected disabled>Select Status</option>


        <option value="pending">Pending</option>
        <option value="completed">Completed</option>
        <option value="rejected">Rejected</option>
    </select>
</div>
<div class="col-md-4 position-relative ">
    <label for="validationTooltip02" class="form-label">Select User</label>
    <select class="form-select" name="user_id" id="user_id">

        <option value="" selected disabled>Select User</option>

        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>

</div>
<div class="col-md-4 mt-5">

    <button class="btn btn-primary sub-btn" type="submit">Submit form</button>
</div>

<br>

<div id="history-table">

</div>
@endsection


@push('js')
<script>
    $(document).on('click', '.sub-btn', function() {

        var user_id = $('#user_id').val();
        var status = $('#status').val();


        $.ajax({
            type: 'get',
            url: "{{ url('/get_leadshistory') }}",
            data: {
                user_id: user_id,
                status: status,

            },
            success: function(response) {
                $('#history-table').html(response);
                $('#example').DataTable({
                    pagingType: 'full_numbers',
                });


            }
        });

    });
</script>


@endpush