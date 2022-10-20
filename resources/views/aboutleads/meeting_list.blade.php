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

                @foreach($data as $data)
                <tr>
                    {{-- <td><input class="" type="checkbox" value="{{$data->id}}" name="data[]"></td> --}}
                    <td>{{$data->assigned->name}}</td>
                    <td>{{$data->assigned->phone}}</td>
                    <td>{{$data->assigned->mobile}}</td>
                    <td>{{$data->assigned->address}}</td>
                    <td>{{$data->assigned->email}}</td>
                    <td>{{$data->assigned->date}}</td>
                    <td>{{ $data->users->name }}</td>
                     <td><a href="" button type="button" meeting-remarks="{{ $data->remarks }}"  class="fa fa-eye btn btn-primary meeting-edit"  data-toggle="modal" data-target="#meetingmodal"> view</a></td>
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