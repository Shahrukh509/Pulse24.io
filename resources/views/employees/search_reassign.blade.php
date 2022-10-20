<form action="{{route('user.update-reassign')}}" method="post" enctype="multipart/form-data">

    @csrf

    <div class="row g-3 needs-validation mt-3">
        <div class="col-md-4 position-relative ">
            <label for="validationTooltip02" class="form-label">Re-Assign User</label>
            <select class="form-select" name="user_id" id="user_id">

                <option value="" selected disabled>Select User</option>

                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>

                @endforeach
            </select>

        </div>

        <div class="col-md-4 mt-5">

            <button class="btn btn-primary reassign-btn" type="submit">Re-Assign Data</button>
        </div>



    </div>



    <table id="example" class="table table-striped" style="width:100%">
        <br>
        <div>
            <label for="checkall">Select all</label>
            <input type="checkbox" name="select-all" id="select-all" />

        </div>

        <thead>
            <tr>
                <th>Select</th>
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
                <td><input class="" type="checkbox" value="{{$val->id}}" name="data[]"></td>
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
                <th>Select</th>
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


</form>