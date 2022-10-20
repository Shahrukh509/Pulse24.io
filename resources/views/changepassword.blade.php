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
            <h2>Update Password</h2>
        </span>

    </div>

</div>

<form class="row g-3 needs-validation mt-3" novalidate>
    <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">New Password</label>
        <input type="text" class="form-control" id="validationTooltip01" value="" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
    </div>

    <div class="col-md-4 mt-5">

        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>



</form>


@endsection