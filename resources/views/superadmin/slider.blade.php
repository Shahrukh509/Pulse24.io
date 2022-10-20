@extends('superadmin.layouts.main')

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@endpush


@section('content')


@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

@if(session()->has('message'))
<div class="alert {{ Session::get('alert-class') }}">
    {{ session()->get('message') }}
</div>
@endif






<div class="row">

    <div class="mb-2">

    <a href="#" button type="button" class="fa fa-add btn btn-primary pull-right" data-toggle="modal" data-target="#slidermodal"> Add Slider</a>
 
</div>

    <div class="col-md-12">

        <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>

                    <th>Image</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slider as $slider)
                <tr>

                    <td><image src="{{ asset('public/images/slider/'.$slider->images)}}" width="400" height = "200"></td>

                    <td> <a href="{{route('slider.edit',$slider->id)}}" button type="button" data-slider_id="{{$slider->id}}" data-val="{{$slider->images}}" data-status="{{ $slider->status }}" class="fa fa-edit btn btn-primary slider-edit"  data-toggle="modal" data-target="#exampleModal"> Edit</a>

                        <a href="{{route('slider.delete',$slider->id)}}" onclick="return confirm('Are you sure you want to delete this item?')" button type=" button" class="btn btn-danger fa fa-trash"> Delete</a>
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


                {{-- ADDING SLIDERS MODAL --}}



<div class="modal fade" id="slidermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="slidermodal">
                Add Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('slider.add')}}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="col-md-12 position-relative">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="currentroleval" value="" required>
                    

                </div class="col-lg-2 form-control">

                <select  class="form-control"
                    name="status">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>


                  
                <div>
                    

                </div>

                                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Slider</button>
                </div>

            </form>



        </div>
    </div>
</div>


                {{-- END OF MODAL OF SLIDERs --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="slider-update"  action="{{route('slider.update')}}" method="post" enctype="multipart/form-data" data-id="">
                @csrf

                <input id="put-id" type="hidden" name="id">
                <div class="col-md-12 position-relative">
                    <label for="validationTooltip01" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="slider-image" required>

                    <img class="image-slider" width="200" height="200">

                </div>

                <div class="col-md-12 position-relative">

                <select id="slider-status" name="status" class=" form-control select-status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    
                </select>
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

    $(document).on('click', '.slider-edit', function() {

        var image = $(this).attr('data-val');

        var link = '{{ asset("public/images/slider/") }}';
         var id = $(this).attr('data-slider_id');

         $('#put-id').val(id);
         // var status = $(this).attr('data-status');

         $('.image-slider').attr('src',link+'/'+image);
        $('#exampleModal').modal('show');

    });


    $('#slider-update').on('submit',function(e){
    e.preventDefault();

    var formdata= new FormData(this);

    // alert(formdata);
    // return false;
    

    // let id = $('#put-id').attr('slider-id');
    // let images = $('#slider-image').val();
    // let status = $('#slider-status').val();
    let url = $('#slider-update').attr('action');

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
        success: function(response) {

         location.reload();
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
</script>


@endpush