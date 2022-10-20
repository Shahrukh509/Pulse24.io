<form class="row g-3 mt-3" action="{{route('deleting.numbers')}}" method="post">
    @csrf

    <div>
        <label for="checkall">Select all</label>
        <input type="checkbox" name="select-all" id="select-all" />

        <button type="submit" class="btn btn-primary shiny  pull-right" onclick="return confirm('Are you sure to delete this?')"><i class="btn-label glyphicon glyphicon-saved"></i> Delete Numbers</button>


    </div>





    <table id="example" class="table table-striped" style="width:100%">



        <thead>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Email</th>
                <th>Date</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>

            @foreach($leads as $data)
            <tr>
                <td><input class="" type="checkbox" value="{{$data->id}}" name="id[]"></td>
                <td>{{$data->name}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->mobile}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->date}}</td>
                
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Email</th>
                <th>Date</th>
            </tr>
        </tfoot>
    </table>



</form>