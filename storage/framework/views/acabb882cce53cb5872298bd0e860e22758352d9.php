<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">

              

            
        </div>
        <div class="header-right">
           

            <ul class="clearfix">

                <li class="icons dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown">
                         <?php $count = Auth::user()->unreadNotifications()->count(); ?>
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-pill gradient-2 count-notif"><?php echo e($count); ?></span>
                    </a>
                    <div id="showdropdown"class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                        <div class="dropdown-content-heading d-flex justify-content-between">

                            <span><span class="count-notif"><?php echo e($count); ?> </span> New Notifications</span>
                            <a href="javascript:void()" class="d-inline-block">
                                <span class="badge badge-pill gradient-2 count-notif"><?php echo e($count); ?></span>
                            </a>

                        </div>
                           <a href="<?php echo e(route('notification.list')); ?>" class="notification-bar"><span class="view-all" >View All</span></a>                          
                        <div class="dropdown-content-body make-y" >
                            <ul class="notification-list">
                                <?php
                                $show = null;
        
                                ?>
                                
                               <?php $__currentLoopData = Auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              
                                 <?php if(\Carbon\carbon::now()->toDateString() == $notif->created_at->toDateString()): ?>
                                 <?php 
                                 $show = 1;
                                 ?>
                                <li>
                                    <a href="javascript:void()" notif_id="<?php echo e($notif->id); ?>" >
                                        <span class="mr-3 avatar-icon bg-success"><i class="fa fa-bell"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading"><?php echo e($notif->data['message']); ?></h6>
                                            <span class="notification-text"> <?php echo e(\Carbon\Carbon::parse($notif->created_at)->diffForhumans()); ?> </span>
                                            <a data-id ="<?php echo e($notif->id); ?>"class="mark-as-read" href="#">Mark as Read</a>

                                           
                                        </div>
                                    </a>
                                </li>
                        
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($show == null): ?>
                                <li>
                                    <a href="javascript:void()">
                                        <span class="mr-3 avatar-icon bg-danger"><i class="fa fa-times"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">No notification for today</h6>
                                           
                                        </div>
                                    </a>
                                </li>
                                <?php endif; ?>
                                
                               
                                
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
               
                <li class="icons dropdown">
                    <div> <strong> <?php echo e(auth()->user()->name); ?></strong> </div>
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="<?php echo e(Auth()->user()->image); ?>" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="<?php echo e(route('user.profile')); ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                

                                <hr class="my-2">
                                
                                <li><a href="<?php echo e(url('logout')); ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
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
    let url = "<?php echo e(route('read')); ?>";

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

</script><?php /**PATH C:\xampp\htdocs\axconnect\resources\views/layouts/header.blade.php ENDPATH**/ ?>