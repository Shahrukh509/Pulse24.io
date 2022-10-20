<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Active Booking</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Completed Booking</button>
     <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile1" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cancel Booking</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">


  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

      <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>
                    {{-- <th>Select</th> --}}
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Assigned To</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($active as $data)
                <tr>
                    {{-- <td><input class="" type="checkbox" value="{{$data->id}}" name="data[]"></td> --}}
                    <td>{{$data->assigned->name}}</td>
                    <td>{{$data->assigned->phone}}</td>
                    <td>{{$data->assigned->mobile}}</td>
                    <td>{{$data->assigned->address}}</td>
                    <td>{{$data->assigned->email}}</td>
                    <td>{{$data->assigned->date}}</td>
                    <td>{{ $data->users->name }}</td>
                    <td><a href="" button type="button" booking-remarks="{{ $data->remarks }}"  class="fa fa-eye btn btn-primary  booking-edit"  data-toggle="modal" data-target="#bookingmodal"> view</a></td>
                    
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                   {{--  <th>Select</th> --}}
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Assigned To</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>


  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

   <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>
                    {{-- <th>Select</th> --}}
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Assigned To</th>
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($completed as $data)
                <tr>
                    {{-- <td><input class="" type="checkbox" value="{{$data->id}}" name="data[]"></td> --}}
                    <td>{{$data->assigned->name}}</td>
                    <td>{{$data->assigned->phone}}</td>
                    <td>{{$data->assigned->mobile}}</td>
                    <td>{{$data->assigned->address}}</td>
                    <td>{{$data->assigned->email}}</td>
                    <td>{{$data->assigned->date}}</td>
                    <td>{{ $data->users->name }}</td>
                     <td><a href="" button type="button" booking-remarks="{{ $data->remarks }}"  class="fa fa-eye btn btn-primary  booking-edit"  data-toggle="modal" data-target="#bookingmodal"> view</a></td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                   {{--  <th>Select</th> --}}
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Assigned To</th>
                     <th>Action</th>
                </tr>
            </tfoot>
        </table>
 
</div>

<div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab">

   <table id="example" class="table table-striped" style="width:100%">



            <thead>
                <tr>
                    {{-- <th>Select</th> --}}
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Assigned To</th>
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($cancel as $data)
                <tr>
                    {{-- <td><input class="" type="checkbox" value="{{$data->id}}" name="data[]"></td> --}}
                    <td>{{$data->assigned->name}}</td>
                    <td>{{$data->assigned->phone}}</td>
                    <td>{{$data->assigned->mobile}}</td>
                    <td>{{$data->assigned->address}}</td>
                    <td>{{$data->assigned->email}}</td>
                    <td>{{$data->assigned->date}}</td>
                    <td>{{ $data->users->name }}</td>
                     <td><a href="" button type="button" booking-remarks="{{ $data->remarks }}"  class="fa fa-eye btn btn-primary booking-edit"  data-toggle="modal" data-target="#bookingmodal"> view</a></td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                   {{--  <th>Select</th> --}}
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Assigned To</th>
                     <th>Action</th>
                </tr>
            </tfoot>
        </table>
 
</div>


</div>