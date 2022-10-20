@extends('employees.layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endpush


@section('content')


@if($errors->any())
<ul>
     @foreach ($errors->all() as $error)
         <li style="color:red;">*{{$error}}</li>
     @endforeach
</ul>
 @endif

@if(session()->has('message'))
<div class="alert {{ Session::get('alert-class') }}">
    {{ session()->get('message') }}
</div>
@endif


<div class="row">
{{-- 
    <div class="mb-2">

    <a href="#" button type="button" class="fa fa-add btn btn-primary pull-right" data-toggle="modal" data-target="#countrymodal"> Add Country</a>
 
</div> --}}

    <div class="col-md-12">

        <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>

                    <th>ID</th>
                    <th>Notification</th>
                    <th>Created At</th>

                    <th>Status</th>

                    
                </tr>
            </thead>
            <tbody>
                @foreach($data as $noti)
                <tr>
                    <td> {{ $noti->id }}</td>
                    <td>{{ $noti->data['message'] }}</td>
                    <td>{{ $noti->created_at->diffForHumans() }}</td>

                {{-- Checking if notification is read or not --}}

                    <td>@if($noti->read_at != null) <button class="fa fa-check btn btn-success"> Read</button>
                        @else

                        <a href="{{ route('read',$noti->id) }}" data-id="{{ $noti->id }}" type="button" class="fa fa-edit btn btn-primary notification-edit"> Mark As Read</a>
                    </td>
                        
                        @endif
                       

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


                {{-- ADDING countryS MODAL --}}



{{-- <div class="modal fade" id="countrymodal" tabindex="-1" role="dialog" aria-labelledby="country-editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="countrymodal">
                Add country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('country.add')}}" enctype="multipart/form-data" method="post">
                @csrf
                 
                  <div class="col-md-12 position-relative">
                    <label for="" class="form-label">Country Name</label>
                    <input type="text" name="name" class="form-control" id="country_name" value="" required>
                    

                </div>
                <div class="col-md-12 position-relative">
                    <label for="" class="form-label">Country Short Name</label>
                    <input type="text" name="short_name" class="form-control" id="country_short_name" value="" required>
                    

                </div>
                 <div class="col-md-12 position-relative">
                    <label for="" class="form-label">Country Code</label>
                    <input type="mumber" name="country_code" class="form-control" id="country_code" value="" required>
                    

                </div>
                 <div class="col-md-12 position-relative">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="currentroleval" value="" >
                    

                </div>


                  
                <div>
                    

                </div>

                                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add country</button>
                </div>

            </form>



        </div>
    </div>
</div> --}}


                {{-- END OF MODAL OF countrys --}}


<!-- Modal  for edit country -->
{{-- <div class="modal fade" id="country-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="country-update"  action="{{ route('country.update')}}" method="post" enctype="multipart/form-data" data-id="">
                @csrf

                 <ul class="errors-edit">
                    
                </ul>

                <input id="put-id" type="hidden" name="id">

                <div class="col-md-12 position-relative">

                <label for="" class="form-label">Country Name</label>
                    <input type="text" name="name" class="form-control" id="country_name_update">
                    
                </div >
                <div class="col-md-12 position-relative">

                <label for="" class="form-label">Country Short Name</label>
                    <input type="text" name="short_name" class="form-control" id="country_short_name_update">
                    
                </div >

                <div class="col-md-12 position-relative">

                <label for="" class="form-label">Country Code</label>
                    <input type="tel" name="country_code" class="form-control" id="country_code_update">
                    
                </div >
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="country-image_update">

                    <img class="image-country_update" width="200" height="200">

                </div>

                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>



        </div>
    </div>
</div> --}}






@endsection
@push('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>




<script>



    $(document).on('click','.notification-edit',function(){

     var id = $(this).attr('data-id');
     // alert(id);
    let url = "{{ route('read')}}";

    // alert(url);

    // return false;

     $.ajax({
        type: "get",
        url: url,
        data:{id:id},
         cache:false,
         dataType: "json",
         contentType: false,
        processData: false,
        success: function(response){
        if(response.success == true){
         location.reload();

        }else{

         Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'unable to mark as read',
                            })
        }

         
     },

     error: function(response){

        $.each(response.responseJSON.errors, function(index, value){
            $('.errors-edit').append('<li style="color:red">*'+value+ '</li>');
    
         });

        // alert(.country_code);
     }
        
    });


   });

</script>


@endpush