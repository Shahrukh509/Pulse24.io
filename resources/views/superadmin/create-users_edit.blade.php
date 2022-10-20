 @extends('superadmin.layouts.main')

    @push('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

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



    <form class="row g-3 " method="post" action="{{url('user/update', $edit->id)}}" enctype="multipart/form-data">

        @csrf

        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="employee_name"name="name" value="{{$edit->name}}" required>

        </div>
        <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">Email</label>
            <input type="email" class="form-control" id="employee_email" name="email" value="{{$edit->email}}" required>

        </div>
        <div class="col-md-4 position-relative">
            <label for="validationTooltipUsername" class="form-label">Phone Number</label>
            <div class="input-group has-validation">
                <input type="text" name="phone" value="{{$edit->phone}}" class="form-control" id="employee_number"  required>

            </div>
        </div>
        <div class="col-md-4 position-relative">
            <label for="validationTooltip03" class="form-label">Address </label>
            <textarea type="text" name="address" class="form-control" id="validationTooltip03" required>{{$edit->address}}</textarea>

        </div>

        <div class="col-md-4 position-relative">
            <label for="validationTooltip03" class="form-label">Image </label>

            <input type="file" name="image" value="{{$edit->image}}" class="form-control" aria-label="file example">
        </div>

        <div class="col-md-4 position-relative">
            <label for="validationTooltip05" class="form-label">Select Line Manager</label>
            <select class="form-control" name="linemanager_id" value="{{$edit->linemanager_id}}">

                <option value="" selected disabled>Select</option>

                @foreach($line_manager as $manager)


                <option value="{{ $manager->id }}" {{$edit->linemanager_id == $manager->id? 'selected':''}}>

                    {{ $manager->name }}

                </option>

                @endforeach
            </select>
        </div>

        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Admin Username</label>
            <input type="text" name="username" class="form-control" id="employee_username" value="{{$edit->username}}" required>

        </div>
        <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="employee_password" value="">

        </div>
        <div class="col-md-4 position-relative">
            <label for="validationTooltipUsername" class="form-label">User Role</label>
            <select class="form-control" name="role_id">

                <option value="" selected disabled>Select role</option>

                @foreach($roles as $role)


                <option value="{{ $role->id }}" {{$edit->userrole->name == $role->name? 'selected':''}}>

                    {{ $role->name }}

                </option>

                @endforeach
            </select>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>




    @endsection
    @push('js')

    <script type="text/javascript">

    $(document).on('blur','#employee_name',function(){
        $('#error-name').empty();

        // alert('hi');
       
    if($(this).val() == ''){
        
        $(this).after('<span id="error-name" style="color:red"><strong>*Name should not be null</strong></span>');
    }
    }); 

    $(document).on('blur','#employee_email',function(){
         $('#error-email').empty();
        // alert('hi');
    if($(this).val() == ''){
       
        $(this).after('<span id="error-email" style="color:red"><strong>*Email should not be null</strong></span>');
    }
    });

    $(document).on('blur','#employee_number',function(){
        $('#error-number').empty();
          $('#error-number-format').empty();

    if($(this).val() == ''){

        // $('#error-number').empty();
        //  $('#error-number-format').empty();
        $(this).after('<span id="error-number" style="color:red"><strong>*number should not be null</strong></span>');
    }

    if($(this).val() != '' && $(this).val().charAt(0) != '+'){
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

</script>


    @endpush