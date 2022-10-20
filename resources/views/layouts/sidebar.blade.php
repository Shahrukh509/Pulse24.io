<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="" href="{{url('dash')}}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>

            </li>

            <li class="nav-label">Registration & Config</li>
                        
            @if(Auth()->user()->role_id == 11)

            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-industry"></i><span class="nav-text">Company</span>
                </a>
                <ul aria-expanded="false">
                <li>
                <a class="" href="{{route('company.form.show')}}" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text">Add Company </span>
                </a>
            </li>

            <li>
                <a class="" href="{{route('company.approved.list')}}" aria-expanded="false">
                    <i class="fa fa-check"></i><span class="nav-text">Company Approved Request </span>
                </a>
            </li>

             <li>
                <a class="" href="{{route('company.request.show')}}" aria-expanded="false">
                    <i class="fa fa-clock-o"></i><span class="nav-text">Company Request </span>
                </a>
            </li>

                </ul>
            </li>

            @else

            <li>
                <a class="" href="{{route('slider.show')}}" aria-expanded="false">
                    <i class="fa fa-sliders"></i><span class="nav-text">Add Slider </span>
                </a>
            </li>

            <li>
                <a class="" href="{{route('country.show')}}" aria-expanded="false">
                    <i class="fa fa-flag"></i><span class="nav-text">Add Country </span>
                </a>
            </li>

            <li>
                <a class="" href="{{url('roles')}}" aria-expanded="false">
                    <i class="fa fa-user"></i><span class="nav-text">User Roles </span>
                </a>
            </li>

            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-user-plus"></i><span class="nav-text">Registration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{url('users')}}">Users</a></li>

                </ul>
            </li>
             <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-bullhorn"></i><span class="nav-text">About Leads</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('calling')}}">Calling</a>
                    </li>
                     <li><a href="{{route('leads')}}">Leads</a>
                    </li>
                     <li><a href="{{route('meeting')}}">Meeting</a>
                    </li>
                     <li><a href="{{route('booking')}}">Booking</a>
                    </li>


                </ul>
            </li>
            <li>
                <a class="" href="{{url('upload')}}" aria-expanded="false">
                    <i class="fa fa-upload"></i>
                    <span class="nav-text">Upload Leads</span>
                </a>

            </li>
            <li>
                <a class="" href="{{url('assigned')}}" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Assigned Numbers</span>
                </a>

            </li>
            <li>
                <a class="" href="{{url('history')}}" aria-expanded="false">
                    <i class="icon-graph menu-icon"></i>
                    <span class="nav-text">Leads History</span>
                </a>

            </li>

            <li>
                <a class="" href="{{url('re-assign')}}" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Re-assigned Numbers</span>
                </a>
            </li>

            <li>
                <a class="" href="{{route('delete.numbers')}}" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Delete Numbers</span>
                </a>
            </li>

            <li>
                <a class="" href="{{url('hierarchy')}}" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Hierarchy Structure</span>
                </a>
            </li>

            <li>
                <a class="" href="{{url('password')}}" aria-expanded="false">
                    <i class="fa fa-key"></i><span class="nav-text">Change Password</span>
                </a>
            </li>

             <li>
                <a class="" href="{{url('logout')}}" aria-expanded="false">
                    <i class="fa fa-sign-out" aria-hidden="true"></i><span class="nav-text">Logout</span>
                </a>
            </li>

            @endif



        </ul>



    </div>
</div>