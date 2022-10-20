@extends('layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

@endpush

@section('content')

@if(session()->has('success'))
<script type="text/javascript">
    Swal.fire({
                  icon: 'succss',
                  title: 'Success',
                  text: '{{ session()->get('message') }}',
                })
</script>
@elseif(session()->has('error'))
<script type="text/javascript">
    Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: '{{ session()->get('message') }}',
                })
</script>
@endif


<form class="needs-validation" action="{{ url('import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col-md-4">
            <label for="validationTooltip03" class="form-label">Select file </label>

            <input type="file" name="file" class="form-control" aria-label="file example" required>
            <div class="invalid-feedback">Example invalid form file feedback</div>
        </div>

        <div class="col-md-7 mb-3 offset-md-1">
            <label for="validationTooltip02">Select Date</label> <br>
            <input type="text" class="form-control" value="{{ \Carbon\Carbon::now()->format('m/d/y') }}" name="date" id="datepicker-13">

        </div>

    </div>

    <div class="row">
        <div class="col-12 py-3">
            <label for="" class="form-label">Kindly check available columns in Excel Sheet </label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value='yes' name="name" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Name
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value='yes' name="phone" id="">
                <label class="form-check-label" for="flexCheckChecked">
                    Phone
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value='yes' name="mobile" id="">
                <label class="form-check-label" for="flexCheckChecked">
                    Mobile
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value='yes' name="email" id="">
                <label class="form-check-label" for="flexCheckChecked">
                    Email
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value='yes' name="address" id="">
                <label class="form-check-label" for="flexCheckChecked">
                    Address
                </label>
            </div>

        </div>
    </div>



    <button class="btn btn-primary mt-3 fa fa-paper-plane" type="submit"> Upload Data</button>
</form>



@endsection
@push('js')

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<!-- Javascript -->
<script>
    $(function() {
        $("#datepicker-13").datepicker();

    });
</script>

@endpush