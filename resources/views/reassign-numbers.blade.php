@extends('layouts.main')

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
        <div class="row">
        <div class=" col-lg-4 col-md-4 col-sm-12 position-relative ">
            <label for="validationTooltip02" class="form-label">Select User</label>
            <select class="form-select" name="user_id" id="user_id">

                <option selected disabled>Select User</option>

                @foreach($users as $user)
                <option  value="{{$user->id}}">{{$user->name}}</option>
                @endforeach

            </select>
        </div>
            <div class="col-lg-4 col-md-4 col-sm-12 position-relative">

             <label for="validationTooltip02" class="form-label">Select User to Assign</label>
            <select class="form-select" name="user_id" id="assign_to_user">

                <option selected disabled>Select User</option>

            </select>

        </div>
    </div>
    <div class="row">

        <div class="col-lg-10 col-md-4 mt-5">

            <button class="btn btn-primary sub-btn" type="submit">Search</button>
        </div>

        <div class="col-lg-2 col-md-4 mt-5 pull-right">

            <button class="btn btn-primary sub-btn-assign" type="submit">Assign</button>
        </div>
    </div>





    </div>

    <br>

    <div id="append-table">
        

    </div>


</div>


@endsection



@push('js')
<script>
    $(document).on('click', '.sub-btn', function() {

        var user_id = $('#user_id').val();


        $.ajax({
            type: 'get',
            url: "{{ url('/get_re-assign') }}",
            data: {
                user_id: user_id,


            },
            success: function(response) {
                $('#append-table').html(response);
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

$(document).on('change','#user_id',function(){
    $('#assign_to_user').empty();
     $('#assign_to_user').append('<option selected disabled>Select User</option>');
  var id = $('#user_id').find(":selected").val();
  // alert('hi');
  $.ajax({
            type: 'get',

            url: "{{ url('/get_users_to_assign') }}",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                // console.log(response.data);
            $.each(response.data, function(key,val){
             $('#assign_to_user').append('<option value="'+val.id+'">'+val.name+'</option');
                });



            }
        });
  
});

$(document).on('click', '.sub-btn-assign', function() {
     var user_id = $('#assign_to_user').val();
     if(user_id != null){ 
     var lead_ids = [];
    $('input[name="data[]"]').each(function(){
     if($(this).prop('checked')){
 
        lead_ids.push($(this).val());
     }

    });

     $.ajax({
            type: 'post',

            url: "{{ url('/re-assign') }}",
            data: {
                lead_ids:lead_ids,user_id:user_id
            },
            dataType: "json",
            success: function(response) {
             if(response.success == true){

                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully Assigned',
                    showConfirmButton: false,
                    timer: 2500
                });

                  location.reload();

             }else{

               Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Failed to Assign',
                    showConfirmButton: false,
                    timer: 2500
                });
             }
            
            }

        });
 }else{

     Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'please select user to Assign data',
                    showConfirmButton: false,
                    timer: 2500
                });


 }

    // console.log(data.user_id);


    

     // alert(user_id);
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