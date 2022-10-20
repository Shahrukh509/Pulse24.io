@extends('superadmin.layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">




<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"> -->


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

 <form class="row g-3 " method="post" action="{{route('profile.update', $user->id)}}" enctype="multipart/form-data">

        @csrf

        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="employee_name"name="name" value="{{$user->name}}" required>

        </div>
        
        <div class="col-md-4 position-relative">
            <label for="validationTooltipUsername" class="form-label">Phone Number</label>
            <div class="input-group has-validation">
                <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="employee_number"  required>

            </div>
        </div>
        <div class="col-md-4 position-relative">
            <label for="validationTooltip03" class="form-label">Address </label>
            <textarea type="text" name="address" class="form-control" id="validationTooltip03" required>{{$user->address}}</textarea>

        </div>

        <div class="col-md-4 position-relative">
            <label for="validationTooltip03" class="form-label">Image </label>

            <input type="file" name="image" value="{{$user->image}}" class="form-control" aria-label="file example">
        </div>

        <div class="col-md-4 position-relative">
         <label for="validationTooltip05" class="form-label">Select Country</label>
        <select class="form-control" name="country_id">

            <option value="" selected disabled>Select</option>

            @foreach($country as $country)


            <option value="{{ $country->id }}"{{ old('country_id')  == $country->id? 'selected':'' }}>

                {{ $country->name }}

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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


@endpush