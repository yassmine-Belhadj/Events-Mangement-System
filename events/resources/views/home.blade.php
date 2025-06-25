@extends("includes.main",["title" => "home page"])
@section("content")
    <!-- Slider Section Start  -->
    <div class="meeta-hero-section-5 d-flex align-items-center"
         style="background-image: url({{asset("assets/images/bg/hero-5-bg.jpg")}});">
        <img class="image-1" src="{{asset("assets/images/hero-5-img-1.png")}}" alt="">
        <img class="image-2" src="{{asset("assets/images/hero-5-img-2.png")}}" alt="">
        <img class="shape-1" src="{{asset("assets/images/shape/hero-5-shape-1.png")}}" alt="">
        <img class="shape-2" src="{{asset("assets/images/shape/hero-5-shape-2.png")}}" alt="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <div class="title-wrap text-center">
                            <h2 class="title" data-aos-delay="700" data-aos="fade-up">Find event</h2>
                            <h3 class="sub-title" data-aos-delay="800" data-aos="fade-up">Awesome event, conference &
                                fest around you</h3>
                        </div>
                        <div class="search-form-wrap" data-aos-delay="900" data-aos="fade-up">
                            <div class="search-form-inner">
                                <form class="search-form" action="#">
                                    <div class="single-form">
                                        <label class="form-label"><i class="fas fa-search"></i> Event Title</label>
                                        <input type="text" placeholder="Type Event Name">
                                    </div>
                                    <div class="single-form">
                                        <label class="form-label"><i class="fas fa-list-alt"></i> Category</label>
                                        <select>

                                            <option value="0">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="single-form">
                                        <label class="form-label"><i class="fas fa-map"></i> Location</label>
                                        <select>
                                            <option value="0">Select Location</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-btn">
                                        <button class="search-btn"><i class="flaticon-loupe"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Section End -->


    <!-- Trending Section Start -->
    <div class="meeta-trending-section section-padding">
        <div class="trending-shape-1" data-aos-delay="700" data-aos="zoom-in"></div>
        <img class="trending-shape-2" src="{{asset("assets/images/shape/trend-shape-2.png")}}" alt="">
        <img class="trending-shape-3" src="{{asset("assets/images/shape/trend-shape-3.png")}}" alt="">
        <img class="trending-shape-4" src="{{asset("assets/images/shape/trend-shape-4.png")}}" alt="">
        <img class="trending-shape-5" src="{{asset("assets/images/shape/trend-shape-5.png")}}" alt="">
        <div class="container">
            <div class="meeta-trending-wrap">
                <!-- Section Title Start -->
                <div class="meeta-section-title section-title-4 text-center">
                    <h2 class="main-title">Next <span class="title-shape-2">Events</span></h2>
                </div>
                <!-- Section Title End -->
                <div class="meeta-trending-content-wrap meeta-trending-active slider-bullet">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($events as $event)
                                <div class="swiper-slide">
                                    <!-- Trending Item Start -->


                                    <div class="trending-item">
                                        <div class="trending-thumb">
                                            <img src="{{asset("assets/images/events/".$event->image)}}" alt="">
                                            <div class="trending-city">
                                                <span class="city">{{$event->location->name}}</span>
                                            </div>
                                            <div class="trending-content">
                                                <h3 class="title"><a href="#">{{$event->name}}</a></h3>
                                                <span class="date">{{$event->date}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Trending Item End -->
                            @endforeach

                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Section End -->


    <!-- Speakers Start -->

    <div class="meeta-speakers-wrap">
        <!-- Section Title Start -->
        <div class="meeta-section-title-2 section-title-4 text-center">
            <h2 class="sub-title"> Speakers</h2>

            <h2 class="main-title text-bleu">World Class Speakers</h2>
        </div>
        <!-- Section Title End -->
        <div class="meeta-speakers-content-wrap-4">

            <div class="row g-0">
                @foreach($speakers as $speaker)
                    <div class="col-lg-3 col-sm-6">
                        <!-- Single Speakers Start -->
                        <div class="single-speaker-4 text-center">
                            <div class="speaker-image">
                                <a href="speaker-single.html"><img src={{asset("assets/images/speaker/".$speaker->image)}} alt="Speaker"></a>

                            </div>
                            <div class="speaker-content">
                                <h4 class="speaker-name"><a href="speaker-single.html">{{$speaker->name}}</a></h4>

                                <p class="speaker-designation">{{$speaker->job}}</p>
                            </div>
                        </div>
                        <!-- Single Speakers End -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Speakers End -->



    <!-- Event Sponsors Start -->
    <div class="meeta-event-sponsors-4 meeta-event-sponsors-5 section-padding"
         style="background-image: url({{asset('assets/images/bg/sponsor-5-bg.jpg')}});">
        <div class="container">

            <!-- Section Title Start -->
            <div class="meeta-section-title section-title-4 text-center">
                <h2 class="main-title">Event by
                    <shape class="title-shape-1">Organizer</shape>
                </h2>
            </div>
            <!-- Section Title End -->

            <!-- Sponsor Start -->
            <div class="meeta-sponsor-wrap">
                <div class="row">

                    <!-- Sponsor Box Start -->
                    @php
                        $box = 1;
                         $isBox = true;
                    @endphp
                    @foreach($sponsors as $sponsor)

                        @if($isBox)
                            <div class="col-lg-3 col-sm-6">
                                <div class="meeta-sponsor-item-box sponsor-box-{{$box}}">
                                    @endif


                                    <div class="meeta-sponsor-logo sponsor-logo-{{$loop->index +1}}">
                                        <a href="#"><img src="{{asset("assets/images/sponsors/".$sponsor->image)}}"
                                                         alt=""></a>
                                    </div>

                                    @php
                                        if(($loop->index + 1) %2 ==0 ){
                                            $box++;
                                            $isBox = true;
                                        }else{
                                            $isBox = false;
                                        }
                                    @endphp
                        @if($isBox|| $loop->last)
                                </div>
                            </div>
                        @endif

                    @endforeach
                    <!-- Sponsor Box End -->
                </div>

            </div>
        </div>
        <!-- Sponsor End -->

    </div>
    </div>
    <!-- Event Sponsors End -->

@endsection
@section("js")
    <script>

        var swiper = new Swiper(".meeta-trending-active .swiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
                el: ".meeta-trending-active .swiper-pagination",
                clickable: true,
            }
        });
        var swiper = new Swiper(".meeta-sponsor-active .swiper", {
            slidesPerView: 3,
            loop: true,
            spaceBetween: 30,
            navigation: {
                nextEl: ".meeta-sponsor-active .swiper-button-next",
                prevEl: ".meeta-sponsor-active .swiper-button-prev",
            }
        });

    </script>
@endsection
