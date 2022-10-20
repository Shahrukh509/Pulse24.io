<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">

              

            {{-- <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down animated flipInX d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div> --}}
        </div>
        <div class="header-right">
           

            <ul class="clearfix">

                <li class="icons dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown">
                         <?php $count = Auth::user()->unreadNotifications()->count(); ?>
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-pill gradient-2 count-notif">{{ $count }}</span>
                    </a>
                    <div id="showdropdown"class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                        <div class="dropdown-content-heading d-flex justify-content-between">

                            <span><span class="count-notif">{{ $count }} </span> New Notifications</span>
                            <a href="javascript:void()" class="d-inline-block">
                                <span class="badge badge-pill gradient-2 count-notif">{{ $count }}</span>
                            </a>

                        </div>
                           <a href="{{ route('notification.list') }}" class="notification-bar"><span class="view-all" >View All</span></a>                          
                        <div class="dropdown-content-body make-y" >
                            <ul class="notification-list">
                                @php
                                $show = null;
        
                                @endphp
                                
                               @foreach(Auth()->user()->unreadNotifications as $notif)
                              
                                 @if(\Carbon\carbon::now()->toDateString() == $notif->created_at->toDateString())
                                 @php 
                                 $show = 1;
                                 @endphp
                                <li>
                                    <a href="javascript:void()" notif_id="{{ $notif->id }}" >
                                        <span class="mr-3 avatar-icon bg-success"><i class="fa fa-bell"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">{{ $notif->data['message']; }}</h6>
                                            <span class="notification-text"> {{ \Carbon\Carbon::parse($notif->created_at)->diffForhumans()}} </span>
                                            <a data-id ="{{ $notif->id }}"class="mark-as-read" href="#">Mark as Read</a>

                                           
                                        </div>
                                    </a>
                                </li>
                        
                                @endif
                                @endforeach
                                @if($show == null)
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-danger"><i class="fa fa-times"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">No notification for today</h6>
                                           
                                        </div>
                                    </a>
                                </li>
                                @endif
                                
                               
                                
                                <!-- <li>-->
                                <!--    <a href="javascript:void()">-->
                                <!--        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>-->
                                <!--        <div class="notification-content">-->
                                <!--            <h6 class="notification-heading">Event Started</h6>-->
                                <!--            <span class="notification-text">One hour ago</span>-->
                                <!--        </div>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="javascript:void()">-->
                                <!--        <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>-->
                                <!--        <div class="notification-content">-->
                                <!--            <h6 class="notification-heading">Event Ended Successfully</h6>-->
                                <!--            <span class="notification-text">One hour ago</span>-->
                                <!--        </div>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="javascript:void()">-->
                                <!--        <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>-->
                                <!--        <div class="notification-content">-->
                                <!--            <h6 class="notification-heading">Events to Join</h6>-->
                                <!--            <span class="notification-text">After two days</span>-->
                                <!--        </div>-->
                                <!--    </a>-->
                                <!--</li> -->
                            </ul>


                        </div>
                    </div>
                </li>
               {{--  <li class="icons dropdown d-none d-md-flex">
                    <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                        <span>English</span> <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                    </a>
                    <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="javascript:void()">English</a></li>
                                <li><a href="javascript:void()">Dutch</a></li>
                            </ul>
                        </div>
                    </div>
                </li> --}}
                <li class="icons dropdown">
                    <div> <strong> {{ auth()->user()->name }}</strong> </div>
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ Auth()->user()->image }}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route('user.profile') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                {{-- <li>
                                    <a href="javascript:void()">
                                        <i class="icon-envelope-open"></i> <span>Inbox</span>
                                        <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                    </a>
                                </li> --}}

                                <hr class="my-2">
                                {{-- <li>
                                    <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                </li> --}}
                                <li><a href="{{url('logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
$(document).on('click','.mark-as-read',function(){

     var id = $(this).attr('data-id');
     var parent_li = $(this).closest('li');
     var anchor = $(this);
     // parent_li.remove();
      // console.log(parent_li);
     // return false;
    let url = "{{ route('read')}}";

    // alert(url);

    // return false;

     $.ajax({
        type: "get",
        url: url,
        data:{id:id},

         dataType: "json",
    
        success: function(response){
        if(response.success == true){
            // alert(response.count);

         $('.count-notif').text(response.count);
         parent_li.css({
            'background-color':'lightgray',
            'padding' : '5px'

        });
         anchor.remove();
        
         $('#showdropdown').addClass('show');


        }if(response.success == false){

         Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'unable to mark as read',
                            })
        }

         
     }
        
    });


   });

</script>