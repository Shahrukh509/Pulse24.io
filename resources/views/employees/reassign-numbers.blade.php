@extends('employees.layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

@endpush

@section('content')

<div class="row py-2 ">
    <div class="col-6">
        <span>
            <h2>Re-Assign Numbers to Users</h2>
        </span>

        @if(Session::has('message'))

        <p class="alert
          {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('message') }}</p>

        @endif

    </div>

</div>

<div id="history-table">
    <div class="row g-3 needs-validation mt-3">
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

            <button class="btn btn-primary sub-btn" type="submit">Search</button>
        </div>



    </div>

    <br>


</div>


@endsection



@push('js')
<script>
    $(document).on('click', '.sub-btn', function() {

        var user_id = $('#user_id').val();


        $.ajax({
            type: 'get',
            url: "{{ route('user.getre-assign') }}",
            data: {
                user_id: user_id,


            },
            success: function(response) {
                $('#history-table').html(response);
                $('#example').DataTable({
                    pagingType: 'full_numbers',
                });

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


            }
        });



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