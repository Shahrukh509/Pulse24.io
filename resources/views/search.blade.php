<table id="example" class="table table-striped" style="width:100%">



    <thead>
        <tr>
            <th>Assigned To</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

        @foreach($data as $val)
        <tr>
            <td>{{$val->users->name}}</td>
            <td>{{$val->assigned->name}}</td>
            <td>{{$val->assigned->phone}}</td>
            <td>{{$val->assigned->mobile}}</td>
            <td>{{$val->assigned->address}}</td>
            <td>{{$val->assigned->email}}</td>
            <td>{{$val->assigned->date}}</td>
            <td>{{$val->status}}</td>

        </tr>


        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th>Assigned To</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </tfoot>




</table>