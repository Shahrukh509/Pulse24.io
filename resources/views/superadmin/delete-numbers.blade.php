@extends('superadmin.layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

@endpush

@section('content')

<div class="row py-2 ">
    <div class="col-12">
        <span>
            <h2>Delete Users</h2>
        </span>
        <div class=" col-lg-4 col-md-4 col-sm-12 position-relative ">
            <label for="validationTooltip02" class="form-label">Select User to delete leads</label>
            <select class="form-select" name="user_id" id="user_id">

                <option selected disabled>Select User</option>

                @foreach($users as $user)
                <option  value="{{$user->id}}">{{$user->name}}</option>
                @endforeach

            </select>
        </div>
        @if(Session::has('message'))

        <p class="alert
          {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('message') }}</p>

        @endif

    </div>



</div>

<div id="put_list">
    
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


    $(document).on('change','#user_id', function(){

      var id = $(this).val();
      $.ajax({
        url: "{{ route('ajax.num') }}",
        type: "get",
        data: {id: id},
        success:function(response){
        
        $('#put_list').html(response);
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
      })



    });
</script>
@endpush