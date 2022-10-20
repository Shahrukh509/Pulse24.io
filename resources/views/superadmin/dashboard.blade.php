@extends('front.master')

@section('title',"$meta->title")
@section('meta_description',"$meta->meta_description")
@section('meta_keyword',"$meta->meta_keyword")

@section('content')

<section class="hero-slider text-center">


    <div class="slider-inner h-100">
        @foreach($view as $slider)

        @if(!empty($slider->photo))
        
        <div class="slider-item" data-dot='&lt;i class="{{$slider->slider_icon}}"&gt;&lt;/i&gt; {{$slider->slider_name}}' style="background-image: url(public/uploads/{{$slider->photo}});  background-size: cover;
            background-repeat: no-repeat;">

            <div class="overlay2">
                <div class="container h-100">


                   {{--  @php $values = explode(" ",$slider->heading); @endphp --}}
                    <div class="row h-100 align-items-center">


                        <div class="col-md-12">
                            <h2 data-duration-in=".3" data-animation-in="fadeInUp">
                                @if($slider->heading == 'DIGTAN DIGITAL INNOVATION')
                                <strong>

                                    {{$view[0]->heading}}

                                    <span>{{$view[0]->sub_heading}}</span>

                                    {{-- {{$values[2]}} --}}

                                </strong>

                                

                                  <div class="col-md-6 d-none d-md-block" data-duration-in=".3" data-animation-in="fadeInUp">
                              {{ $slider->heading }}
                        </div>

                              

                               

                            </h2>

                           {{--  @if($slider->sub_heading)
                            <h2 data-duration-in=".3" data-animation-in="fadeInUp"><span class="invent">{{$slider->sub_heading}}</span></h2>
                            @endif --}}

                            {{-- {!!$slider->content!!} --}}


                        </div>
                        

                        @if($slider->banner)
                        <div class="col-md-6 d-none d-md-block" data-duration-in=".3" data-animation-in="fadeInUp">
                            <img class="p-5 w-100" src="{{asset('/public/uploads/'.$slider->banner)}}" alt="">
                        </div>

                          <div class="col-md-6 d-none d-md-block" data-duration-in=".3" data-animation-in="fadeInUp">
                              <h2 class = "text-white">
                              {{ $slider->heading }}
                              </h2>
                        </div>


                      

                        @endif
                    </div>


                </div>
            </div>
        </div>
        @else
        <div class="slider-item" data-dot='&lt;i class="{{$slider->slider_icon}}"&gt;&lt;/i&gt; {{$slider->slider_name}}'>



            <div class="overlay2">
                <video loop muted autoplay style="width: 100%; object-fit:cover; position: absolute; left:0">
                    <source src="{{asset('/public/uploads/videos/'.$slider->video)}}" type="video/mp4" />

                </video>

                <div class="container h-100">



                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <h2 data-duration-in=".3" data-animation-in="fadeInUp">


                            <!--    {{$slider->heading}}-->



                            </h2>

                           

                            <div class="button-group">
                                @if(isset($slider->button2_text))
                                <a href="#0" class="btn btn-outline-white" data-duration-in=".5" data-animation-in="fadeInUp" data-delay-in=".5">{{$slider->button1_text}}</a>
                                <a href="#0" class="btn btn-outline-primary text-white" data-duration-in=".6" data-animation-in="fadeInUp" data-delay-in=".6">{{$slider->button2_text}}</a>
                                @else
                                <a href="#0" class="btn btn-outline-primary text-white" data-duration-in=".5" data-animation-in="fadeInUp" data-delay-in=".5">{{$slider->button1_text}}</a>
                                @endif
                            </div>
                        

                        @if($slider->banner)
                        <div class="col-md-6 d-none d-md-block" data-duration-in=".3" data-animation-in="fadeInUp">
                            <img class="p-5 w-100" src="{{asset('/public/uploads/'.$slider->banner)}}" alt="">
                        </div>
                        
                        <div class="col-md-6 d-none d-md-block" data-duration-in=".3" data-animation-in="fadeInUp">
                            {{$slider->heading}}
                             @if($slider->sub_heading)
                            <h2 data-duration-in=".3" data-animation-in="fadeInUp"><span class="invent">{{$slider->sub_heading}}</span></h2>
                            @endif

                            {!!$slider->content!!}
                        </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>

        @endif

        @endforeach
    </div>

</section>


<!--/ Slider end -->

<!-- Service box start -->

<section id="service" class="service angle">
    <div class="container">
        <div class="row">
            @foreach($homeservicetitle as $service)


            <div class="col-md-12 heading">
                <span class="title-icon float-left"><i class="{{$service->home_icon_service}}"></i></span>
                <h2 class="title">
                    {{$service->home_service_title}}
                    <span class="title-desc">{{$service->home_service_subtitle}}</span>
                </h2>
            </div>
            @endforeach
        </div>


        <!-- Title row end -->


        <div class="row">
            @foreach($homeservice as $service)
            <div class="col-md-4 col-lg-4 wow fadeInDown" data-wow-delay=".5s">
                <div class="service-content text-center">
                    <span class="service-icon icon-pentagon">
                        <i class="{{$service->icon1}}"></i></span>
                    <h3>{{$service->icon1_title}}</h3>
                    <p>{{$service->description1}}
                    </p>

                    <div class="col-12 text-center pt-3"><a href="{{url('/service-single',$service->id)}}" class="btn btn-outline-primary text-white">READ MORE</a></div>
                </div>
            </div>
            @endforeach

        </div>




    </div>



</section>

<!--/ Service box end -->

<!-- Portfolio start -->
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 heading text-lg-left text-center">
                @foreach($portfolio as $title)
                <span class="title-icon classic"><i class="{{$title->home_welcome_subtitle}}"></i></span>
                <h2 class="title classic">{{$title->home_welcome_title}}</h2>
                @endforeach
            </div>
            <!-- </div> -->
            <!-- Title row end -->

            <!--Isotope filter start -->
            <!-- <div class="row"> -->
            <!--<div class="col-lg-7">-->
            <!--    <div class="isotope-nav" data-isotope-nav="isotope">-->
            <!--        <ul>-->
            <!--            <li><a href="#" class="active" data-filter="*">All</a></li>-->
            <!--            @foreach($categories as $category)-->
            <!--            <li>-->
            <!--                <a href="#" data-filter=".{{$category->id}}">{{$category->category_name}}</a>-->
            <!--            </li>-->
            <!--            @endforeach-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <!-- Isotope filter end -->
    </div>

    <!--<div class="container-fluid">-->
    <!--    <div class="row isotope" id="isotope">-->
    <!--        @foreach($products as $img)-->
    <!--        <div class="col-sm-6 col-md-4 col-lg-3 {{$img->portfolio_id}} isotope-item">-->
    <!--            <div class="grid">-->
    <!--                <figure class="m-0 effect-oscar">-->
    <!--                    <img src="{{asset('public/uploads/'.$img->banner)}}" alt="" width="150px" height="300px">-->


    <!--                    <figcaption>-->
    <!--                        <h3>Startup Business</h3>-->
    <!--                        <a class="link icon-pentagon" href="{{url('/portfolio-item', $img->id)}}"><i class="fa fa-link"></i></a>-->
    <!--                        <a class="view icon-pentagon" data-rel="prettyPhoto" href="#"><i class="fa fa-search"></i></a>-->
    <!--                    </figcaption>-->
    <!--                </figure>-->
    <!--            </div>-->
    <!--        </div>-->

            <!-- Isotope item end -->
    <!--        @endforeach-->

            <!-- Isotope item end -->
    <!--    </div>-->
        <!-- Content row end -->
    <!--</div>-->
    
    <div class="container">
                <div class="row wow fadeInLeft py-5">
                    <div id="client-carousel" class="col-sm-12 owl-carousel owl-theme text-center client-carousel">
                        @foreach($products as $img)
                        <figure class="m-0 item client_logo">
                            <a href="#">
                                <img src="{{asset('public/uploads/'.$img->banner)}}" alt="client">
                            </a>
                        </figure>
                        @endforeach()
                       
                    </div>
                    <!-- Owl carousel end -->
                </div>
                <!-- Main row end -->
            </div>
    <!-- Container end -->
</section>

<!-- Portfolio end -->

<!-- Counter Strat -->
<section class="ts_counter p-0">

    @foreach($achievements as $value)
    <center class="py-5">
        <h2 class="text-white">{{$value->counter_heading}}</h2>
        <span class="text-white">{{$value->counter_subheading}} </span>
    </center>

    <div class="container-fluid">
        <div class="row facts-wrapper wow fadeInLeft text-center">
            <div class="facts one col-md-3 col-sm-6">
                <span class="facts-icon"><i class="{{$value->counter_1_icon}}"></i></span>
                <div class="facts-num">
                    <span class="counter">{{$value->counter_1_value}}</span>
                </div>
                <h3>{{$value->counter_1_title}}</h3>
            </div>

            <div class="facts two col-md-3 col-sm-6">
                <span class="facts-icon"><i class="{{$value->counter_2_icon}}"></i></span>
                <div class="facts-num">
                    <span class="counter">{{$value->counter_2_value}}</span>
                </div>
                <h3>{{$value->counter_2_title}}</h3>
            </div>

            <div class="facts three col-md-3 col-sm-6">
                <span class="facts-icon"><i class="{{$value->counter_3_icon}}"></i></span>
                <div class="facts-num">
                    <span class="counter">{{$value->counter_3_value}}</span>
                </div>
                <h3>{{$value->counter_3_title}}</h3>
            </div>

            <div class="facts four col-md-3 col-sm-6">
                <span class="facts-icon"><i class="{{$value->counter_4_icon}}"></i></span>
                <div class="facts-num">
                    <span class="counter">{{$value->counter_4_value}}</span>
                </div>
                <h3>{{$value->counter_4_title}}</h3>
            </div>
        </div>
    </div>
    <!--/ Container end -->

    @endforeach
</section>
<!--/ Counter end -->

<!-- Feature box start -->
@foreach($achievementscontent as $content)
<section id="feature" class="feature">
    <div class="container">
        <div class="row">
            <div class="feature-box col-md-6 col-lg-4 wow fadeInDown" data-wow-delay=".5s">
                <span class="feature-icon float-left"><i class="{{$content->home_achievement_icon1}}"></i></span>
                <div class="feature-content">
                    <h3>{{$content->home_achievement_title1}}</h3>
                    <p>
                        {{$content->home_achievement_content1}}
                    </p>
                </div>
            </div>
            <!--/ End first featurebox -->

            <div class="feature-box col-md-6 col-lg-4 wow fadeInDown" data-wow-delay=".5s">
                <span class="feature-icon float-left"><i class="{{$content->home_achievement_icon2}}"></i></span>
                <div class="feature-content">
                    <h3>{{$content->home_achievement_title2}}</h3>
                    <p>
                        {{$content->home_achievement_content2}}
                    </p>
                </div>
            </div>
            <!--/ End 2nd featurebox -->

            <div class="feature-box col-md-6 col-lg-4 wow fadeInDown" data-wow-delay=".5s">
                <span class="feature-icon float-left"><i class="{{$content->home_achievement_icon3}}"></i></span>
                <div class="feature-content">
                    <h3>{{$content->home_achievement_title3}}</h3>
                    <p>
                        {{$content->home_achievement_content3}}
                    </p>
                </div>
            </div>
            <!--/ End 3rd featurebox -->
            <!-- </div> -->
            <!-- Content row end -->

            <!-- <div class="gap-40"></div> -->

            <!-- <div class="row"> -->
            <div class="feature-box col-md-6 col-lg-4 wow fadeInDown" data-wow-delay=".5s">
                <span class="feature-icon float-left"><i class="{{$content->home_achievement_icon4}}"></i></span>
                <div class="feature-content">
                    <h3>{{$content->home_achievement_title4}}</h3>
                    <p>
                        {{$content->home_achievement_content4}}
                    </p>
                </div>
            </div>
            <!--/ End 1st featurebox -->

            <!-- </div> -->
            <!-- Content row end -->

            <!-- <div class="gap-40"></div>

<div class="row"> -->
            <div class="feature-box col-md-6 col-lg-4 wow fadeInDown" data-wow-delay=".5s">
                <span class="feature-icon float-left"><i class="{{$content->home_achievement_icon5}}"></i></span>
                <div class="feature-content">
                    <h3>{{$content->home_achievement_title5}}</h3>
                    <p>
                        {{$content->home_achievement_content5}}
                    </p>
                </div>
            </div>
            <!--/ End first featurebox -->

            <div class="feature-box col-md-6 col-lg-4 wow fadeInDown" data-wow-delay=".5s">
                <span class="feature-icon float-left"><i class="{{$content->home_achievement_icon6}}"></i></span>
                <div class="feature-content">
                    <h3>{{$content->home_achievement_title6}}</h3>
                    <p>
                        {{$content->home_achievement_content6}}
                    </p>
                </div>
            </div>
            <!--/ End first featurebox -->
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>
@endforeach
<!--/ Feature box end -->

@foreach($whychoose as $why)
<section id="image-block" class="image-block p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 ts-padding" style="
                    height: 650px;
                    background: url(/public/uploads/{{$why->home_why_choose_img}}) 50%
                        50% / cover no-repeat;
                "></div>
            <div class="col-lg-6 ts-padding img-block-right">
                <div class="img-block-head text-center">
                    <h2>{{$why->home_why_choose_subtitle}}</h2>
                    <h3>{{$why->home_why_choose_title}}</h3>
                    <p>
                        {{$why->home_why_choose_description}}
                    </p>
                </div>

                <div class="gap-30"></div>

                <div class="image-block-content">
                    <span class="feature-icon float-left"><i class="{{$why->home_why_choose_icon1}}"></i></span>
                    <div class="feature-content">
                        <h3>{{$why->home_why_choose_title1}}</h3>
                        <p>
                            {{$why->home_why_choose_content1}}
                        </p>
                    </div>
                </div>
                <!--/ End 1st block -->

                <div class="image-block-content">
                    <span class="feature-icon float-left"><i class="{{$why->home_why_choose_icon2}}"></i></span>
                    <div class="feature-content">
                        <h3>{{$why->home_why_choose_title2}}</h3>
                        <p>{{$why->home_why_choose_content2}}
                        </p>
                    </div>
                </div>
                <!--/ End 1st block -->

                <div class="image-block-content">
                    <span class="feature-icon float-left"><i class="{{$why->home_why_choose_icon3}}"></i></span>
                    <div class="feature-content">
                        <h3>{{$why->home_why_choose_title3}}</h3>
                        <p>
                            {{$why->home_why_choose_content3}}
                        </p>
                    </div>
                </div>
                <!--/ End 1st block -->
            </div>
        </div>
    </div>
</section>
@endforeach
<!--/ Image block end -->

<!-- Team start -->
<section id="team" class="team">

    <div class="container">
        @foreach($teamhead as $head)
        <div class="row">
            <div class="col-md-12 heading">
                <span class="title-icon float-left"><i class="{{$head->home_team_icon}}"></i></span>
                <h2 class="title">
                    {{$head->home_team_heading}}
                    <span class="title-desc">{{$head->home_team_subheading}}</span>
                </h2>
            </div>
        </div>
        @endforeach
        <!-- Title row end -->


        <div class="row text-center">
            @foreach($team as $member)
            <div class="col-md-6 col-lg-3">
                <div class="team wow slideInLeft">
                    <div class="img-hexagon">
                        <img src="{{asset('public/uploads/'.$member->photo)}}" alt="" />
                        <span class="img-top"></span>
                        <span class="img-bottom"></span>
                    </div>
                    <div class="team-content">
                        <h3>{{$member->name}}</h3>
                        <p>{{$member->designation}}</p>
                        <div class="team-social">
                            @if($member->facebook)
                            <a class="fb" href="#"><i class="fa fa-facebook"></i></a>
                            @endif
                            @if($member->twitter)
                            <a class="twt" href="#"><i class="fa fa-twitter"></i></a>
                            @endif
                            @if($member->googleplus)
                            <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
                            @endif
                            @if($member->indeed)
                            <a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
                            @endif
                            @if($member->linkedin)
                            <a class="dribble" href="#"><i class="fa fa-dribbble"></i></a>
                            @endif



                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</section>
<!--/ Team end -->

<!-- Testimonial start-->
<section class="testimonial parallax parallax2">
    <div class="parallax-overlay"></div>
    <div class="container">
        <div class="row">
            <div id="testimonial-carousel" class="owl-carousel owl-theme text-center testimonial-slide">
                @foreach($testimonials as $testimonial)
                <div class="item">
                    <div class="testimonial-thumb">
                        <img src="{{asset('public/uploads/'.$testimonial->photo)}}" alt="testimonial" />
                    </div>
                    <div class="testimonial-content">
                        <p class="testimonial-text">
                            {{$testimonial->comment}}
                        </p>
                        <h3 class="name">
                            {{$testimonial->name}}<span>{{$testimonial->designation}}</span>
                        </h3>
                    </div>
                </div>
                @endforeach

            </div>
            <!--/ Testimonial carousel end-->
        </div>
        <!--/ Row end-->
    </div>
    <!--/  Container end-->
</section>
<!--/ Testimonial end-->

<!-- Clients start -->
<section id="clients" class="clients">
    <div class="container">
        <div class="row wow fadeInLeft">
            <div id="client-carousel" class="col-sm-12 owl-carousel owl-theme text-center client-carousel">
                @foreach($partners as $partner)
                <figure class="m-0 item client_logo">
                    <a href="#">
                        <img src="{{asset('public/uploads/'.$partner->photo)}}" alt="client" />
                    </a>
                </figure>
                @endforeach

            </div>
            <!-- Owl carousel end -->
        </div>
        <!-- Main row end -->
    </div>
    <!--/ Container end -->
</section>
<!--/ Clients end -->


@endsection
@push('js')

@endpush