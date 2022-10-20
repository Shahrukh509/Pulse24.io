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


<div class="row py-2">
    <div class="col-6">
        <span>
            <h2>
            Company Request</h2>
        </span>

    </div>


   {{--  <div class="col-6">
        <a href="{{url('create/companys')}}" class="btn btn-wide btn-primary pull-right"><i class="fa fa-plus"></i> Create New</a>
    </div> --}}
</div>

<table id="example" class="table table-striped table-responsive" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Company Type</th>
            {{-- <th>Country</th> --}}
            {{-- <th>Address</th> --}}
            <th>Phone</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach($data as $company)
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->company_type}}</td>
            {{-- <td>{{$company->country->name}}</td> --}}
            {{-- <td>{{$company->address}}</td> --}}
            <td>{{$company->phone}}</td>
            <td>{{ $company->email }}</td>
             <td><img src="{{$company->image }}" width="100" height="100"></td>
            <td>

                <a href="" company-request-id= "{{ $company->id }}"button type="button" class="btn btn-warning fa fa-check edit-company-request"data-toggle="modal" data-target="#company-approve"> Approve</a>
            </td>
                <td>
                <a href="{{ route('company.request.delete',$company->id)}}" onclick="return confirm('Are you sure you want to delete this item?')" button type=" button" class="btn btn-danger fa fa-trash"> delete</a>

            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<div class="modal fade" id="company-approve" tabindex="-1" role="dialog" aria-labelledby="country-editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="company-approve">
                Approve Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="company-request-form" action="{{route('company.request.update')}}" method="post">
                @csrf
                 
                  <div class="col-md-12 position-relative">
                    <label for="" class="form-label">Company Username</label>
                    <input type="text" name="username" class="form-control" id="username"  required>
                    <span class="text-danger error-text username_error"></span>
                    

                </div>
                <div class="col-md-12 position-relative">
                    <label for="" class="form-label">Set password</label>
                    <input type="text" name="password" class="form-control" id="password" required>
                    <span class="text-danger error-text password_error"></span>
                    

                </div>
                <input type="hidden" name="id" id="put-id">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-primary">Approve Company</button>
                </div>
                <span class="text-danger">Note :
                This password will be used as login credentials
            please do remember this password</span>

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
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
     $(document).on('submit','#company-request-form', function(e){
    e.preventDefault();
    var id = $('.edit-company-request').attr('company-request-id');
    $('#put-id').val(id);
    // alert(id);
    // return false;
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
                    title: 'Successfully Approved Company',
                    showConfirmButton: false,
                    timer: 300
                });

                  // $('#submit').html('Approve Company');
                  // $("#submit").attr("disabled", false);

                  
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