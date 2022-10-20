@extends('superadmin.layouts.main')

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

    <div class="mb-2">

    <a href="#" button type="button" class="fa fa-add btn btn-primary pull-right" data-toggle="modal" data-target="#countrymodal"> Add Country</a>
 
</div>

    <div class="col-md-12">

        <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>

                    <th>Country Name</th>
                    <th>Country Code</th>

                    <th>Image</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                <tr>
                    <td> {{ $country->name }} </td>
                    <td>{{ $country->country_code }}</td>
                    <td><image src="{{ $country->image }}" width="200" height = "200"></td>

                    <td> <a href="{{route('country.edit',$country->id)}}" button type="button" country-name="{{ $country->name }}" country-id="{{$country->id}}" country-image="{{$country->image}}" country-short-name="{{ $country->short_name }}" country-code ="{{ $country->country_code }}" class="fa fa-edit btn btn-primary country-edit"  data-toggle="modal" data-target="#country-edit"> Edit</a>

                        <a href="{{route('country.delete',$country->id)}}" onclick="return confirm('Are you sure you want to delete this item?')" button type=" button" class="btn btn-danger fa fa-trash"> Delete</a>
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


                {{-- ADDING countryS MODAL --}}



<div class="modal fade" id="countrymodal" tabindex="-1" role="dialog" aria-labelledby="country-editLabel" aria-hidden="true">
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
</div>


                {{-- END OF MODAL OF countrys --}}


<!-- Modal  for edit country -->
<div class="modal fade" id="country-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>






@endsection
@push('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>




<script>

    $(document).on('click', '.country-edit', function() {
         
         var country_name = $(this).attr('country-name');
         var country_short_name = $(this).attr('country-short-name');
         var country_code = $(this).attr('country-code');
         var image = $(this).attr('country-image');
         var id = $(this).attr('country-id');
         // alert(country_short_name);
         
         $('#put-id').val(id);
         $('#country_name_update').val(country_name);
         $('#country_short_name_update').val(country_short_name);
         $('#country_code_update').val(country_code);
         // var status = $(this).attr('data-status');

         $('.image-country_update').attr('src',image);
        $('#country-edit').modal('show');

    });


    $('#country-update').on('submit',function(e){
    e.preventDefault();

    var formdata= new FormData(this);

    // alert(formdata);
    // return false;
    

    // let id = $('#put-id').attr('country-id');
    // let images = $('#country-image').val();
    // let status = $('#country-status').val();
    let url = $('#country-update').attr('action');

    // alert(url);

    // return false;

     $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        type: "POST",
        url: url,
        data:formdata,
         cache:false,
         dataType: "json",
         contentType: false,
        processData: false,
        success: function(response){
          

         location.reload();
     },

     error: function(response){

        $.each(response.responseJSON.errors, function(index, value){
            $('.errors-edit').append('<li style="color:red">*'+value+ '</li>');
    
         });

        // alert(.country_code);
     }
        
    });


   });


    $(document).ready(function() {
        $('#example').DataTable();
    });

     $(document).ready(function(){
    $('.alert-success').fadeIn().delay(20000).fadeOut();
      });
      $(document).ready(function(){
    $('.alert-danger').fadeIn().delay(20000).fadeOut();
      });

              // VALIDATION 

$(document).on('blur','#country_name',function(){
if($(this).val() == ''){

    $('#error-name').empty();
    $(this).after('<span id="error-name" style="color:red"><strong>*Name should not be null</strong></span>');
}
}); 
$(document).on('blur','#country_short_name',function(){
if($(this).val() == ''){
    $('#error-short-name').empty();
    $(this).after('<span id="error-short-name" style="color:red"><strong>*Short name should not be null</strong></span>');
}
}); 

$(document).on('blur','#country_code',function(){
if($(this).val() == ''){
    $('#error-code').empty();
    $(this).after('<span id="error-code" style="color:red"><strong>*Country code should not be null</strong></span>');
}
if($(this).val() != '' && $(this).val().charAt(0) != '+'){
         $('#error-code').empty();
        $('#error-number-format').empty();
        $(this).after('<span id="error-number-format" style="color:red"><strong>*country Code must start with "+" for e.g : +92xxxxxxx </strong></span>');

    }
});

              // FOR UPDATE
$(document).on('blur','#country_name_update',function(){
if($(this).val() == ''){

    $('#error-name_update').empty();
    $(this).after('<span id="error-name_update" style="color:red"><strong>*Name should not be null</strong></span>');
}
}); 
$(document).on('blur','#country_short_name_update',function(){
if($(this).val() == ''){
    $('#error-short-name_update').empty();
    $(this).after('<span id="error-short-name_update" style="color:red"><strong>*Short name should not be null</strong></span>');
}
}); 

$(document).on('blur','#country_code_update',function(){
    // alert('hi');
if($(this).val() == ''){
    $('#error-number-format-update').empty();
    $('#error-code_update').empty();
    $(this).after('<span id="error-code_update" style="color:red"><strong>*Country code should not be null</strong></span>');
}
// alert('bye');
  if($(this).val() != '' && $(this).val().charAt(0) != '+'){
         
         $('#error-code_update').empty();
        $('#error-number-format-update').empty();
        $(this).after('<span id="error-number-format-update" style="color:red"><strong>*country Code must start with "+" for e.g : +92xxxxxxx </strong></span>');
    }
});


</script>


@endpush