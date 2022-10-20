@extends('layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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

<form id="form" class="row g-3 " method="post" action="{{route('company.add')}}" enctype="multipart/form-data">

    @csrf

    <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">Company Name<span class="important-star">*</span></label>
        <input type="text" class="form-control" id="company_name" name="name" value="{{ old('name') }}" required>
        <span class="text-danger error-text name_error"></span>

    </div>
    <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label">Company Email<span class="important-star">*</span></label>
        <input type="email" class="form-control" id="company_email" name="email" value="{{ old('email') }}" required>
        <span class="text-danger error-text email_error"></span>

    </div>

      <div class="col-md-4 position-relative">
        <label for="validationTooltip05" class="form-label">Select Country</label>
        <select class="form-control" name="country_id">

            <option value="" selected disabled>Select</option>

            @foreach($countries as $country)


            <option value="{{ $country->id }}"{{ old('country_id') == $country->id? 'selected':'' }}>

                {{ $country->name }}

            </option>

            @endforeach
        </select>
         <span class="text-danger error-text country_id_error"></span>
    </div>

    <div class="col-md-4 position-relative">
        <label for="validationTooltip05" class="form-label"> Company Type</label>
        <select class="form-control" name="company_type">

            <option value="" selected disabled>Select</option>

            <option {{ old('company_type')? 'selected':'' }}>
             Sole Proprietorships
            </option>
            <option {{ old('company_type')? 'selected':'' }}>
            Partnerships
            </option>
            <option {{ old('company_type')? 'selected':'' }}>
             Limited Liability Companies (LLC)
            </option>
            <option {{ old('company_type')? 'selected':'' }}>
           Corporations
            </option>
        </select>
         <span class="text-danger error-text company_type_error"></span>
    </div>
    <div class="col-md-4 position-relative">
        <label for="validationTooltipUsername" class="form-label">Phone Number<span class="important-star">*</span></label>
      
            <input type="tel" name="phone" class="form-control" id="company_number" value="{{ old('phone') }}" required>
             <span class="text-danger error-text phone_error"></span>

    </div>
    <div class="col-md-4 position-relative">
        <label for="validationTooltip03" class="form-label">Address </label>
        <textarea type="text" name="address" class="form-control" id="validationTooltip03"></textarea>

    </div>

    <div class="col-md-4 position-relative">
        <label for="validationTooltip03" class="form-label">Image </label>

        <input type="file" name="image" class="form-control" aria-label="file example">
    </div>  

    <div class="col-12">
        <button id="submit"class="btn btn-primary" type="submit">add company</button>
    </div>
</form>




@endsection
@push('js')

<script type="text/javascript">

$(document).on('blur','#company_name',function(){
     $('#error-name').empty();
   
if($(this).val() == ''){
   
    $(this).after('<span id="error-name" style="color:red"><strong>*Name should not be null</strong></span>');
}
}); 

$(document).on('blur','#company_email',function(){
    $('#error-email').empty();
if($(this).val() == ''){
    
    $(this).after('<span id="error-email" style="color:red"><strong>*Email should not be null</strong></span>');
}
});

$(document).on('blur','#company_number',function(){
      $('#error-number').empty();
     $('#error-number-format').empty();
     if($(this).val() == ''){

  
      $(this).after('<span id="error-number" style="color:red"><strong>*number should not be null</strong></span>');
}

    if($(this).val() != '' && $(this).val().charAt(0) != '+')
    {
        $(this).after('<span id="error-number-format" style="color:red"><strong>* number must start with "+" for e.g : +92xxxxxxx </strong></span>');
    }



}); 

$(document).on('blur','#employee_username',function(){
     $('#error-username').empty();
    if($(this).val() == ''){

   
    $(this).after('<span id="error-username" style="color:red"><strong>*username should not be null</strong></span>');
}
});

$(document).on('blur','#employee_password',function(){
        $('#error-password').empty();
        $('#error-password-length').empty();
    if($(this).val() == ''){

         $(this).after('<span id="error-password" style="color:red"><strong>*password should not be null</strong></span>');
    }if( $(this).val() != '' && $(this).val().length <= 5){
     
     $(this).after('<span id="error-password-length" style="color:red"><strong>*password length should not be less than 6</strong></span>');

    }
    });

  $(document).on('submit','#form', function(e){
    e.preventDefault();
   $.ajax({
            type: $(this).attr('method'),

            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend:function(){
             $('#submit').html('Please Wait...');
             $("#submit").attr("disabled", true);
             $(document).find('span.error-text').text('');

            },
            success: function(response) {
                // alert(response.status);
                // return false;
             if(response.status == true){
                

                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully Registered',
                    showConfirmButton: false,
                    timer: 3000
                });

                  $('#submit').html('Add company');
                  $("#submit").attr("disabled", false);

                  
                  window.location.reload();

             }if(response.status == false){

                $.each(response.error,function(prefix,val){
                    // console.log(val);
                 $('span.'+prefix+'_error').text('* '+val);
                 $('#submit').html('Add again');
                  $("#submit").attr("disabled", false);
                });

              


             }
            
            }

        });
});


</script>


@endpush