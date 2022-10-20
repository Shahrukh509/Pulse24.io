@extends('layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

@endpush

@section('content')

 <select class="form-select col-md-6" name="user_id" id="user_id">

            <option value="" selected disabled>Select User</option>

            @foreach($users as $user)
            @if($user->name != 'admin')
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
            @endforeach

        </select>

<div id="put-meeting-list">

</div>


<div class="modal fade" id="meetingmodal" tabindex="-1" role="dialog" aria-labelledby="country-editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="countrymodal">
              Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--<form action="{{route('country.add')}}" enctype="multipart/form-data" method="post">-->
                <!--@csrf-->
                 
                  <div class="col-md-12 position-relative">
                    <!--<label for="" class="form-label">Remarks</label>-->
                    <p id="meeting">
                        
                    </p>
                    
                </div>


                  
                <div>
                    

                </div>

                                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--<button type="submit" class="btn btn-primary">Add country</button>-->
                </div>

            <!--</form>-->



        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('change','#user_id',function(){

     var id = $(this).val();
     $.ajax({
        type: "get",
        url: "{{ route('meeting.list') }}",
        data: {id:id},
        success: function(response){

        $('#put-meeting-list').html(response);
         $('#example').DataTable({
                    pagingType: 'full_numbers',
                });

        },
     });


    });
  $(document).on('click','.meeting-edit',function(){

     var value = $(this).attr('meeting-remarks');
    //  alert(value);
     $('#meeting').text(value);
    //  $('#meetingmodal').modal('show');
    // alert(value);


    });
</script>

    
@endsection