@extends("includes.main_with_banner",["title" => "Events","breadcrumps"=>[['link' => route("home"), 'name' => "Home",'active'=>'',"current"=>false],
 ['link' => "#", 'name' => "Events",'active'=>'',"current"=>true]]])
@section("content_with_banner")









    <!-- Event List Start -->
    <div class="meeta-event-list section-padding">
        <div class="container">
            <div class="meeta-event-list-wrap">
                <!-- Event List Top Bar Start -->
                <div class="event-list-top-bar">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="event-list-search">
                                <form action="#">
                                    <div class="row g-0">
                                        <div class="col-md-5">
                                            <div class="single-form">
                                                <i class="fas fa-search"></i>
                                                <input type="text" placeholder="Search Event">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="single-form form-border">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <input type="text" placeholder="Location">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-btn">
                                                <button class="btn btn-primary">Find Event</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="event-filter-wrap">
                                <div class="event-collapse-btn">
                                    <button class="btn collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFilters">
                                        <i class="fa fa-filter"></i>
                                        Hide Filters
                                    </button>
                                </div>
                                <div class="event-list-btn">
                                    <ul class="nav">
                                        <li>
                                            <button data-bs-toggle="tab" data-bs-target="#grid"><i class="fas fa-th-large"></i></button>
                                        </li>
                                        <li>
                                            <button class="active" data-bs-toggle="tab" data-bs-target="#list"><i class="fas fa-list"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- List Collapse Start -->
                    <div class="collapse" id="collapseFilters">
                        <div class="event-list-tag">
                            <ul>
                                <li><a href="#">Featured Event</a></li>
                                <li><a href="#">Upcoming</a></li>
                                <li><a href="#">Organizers</a></li>
                                <li><a href="#">Day</a></li>
                                <li><a href="#">Price</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- List Collapse End -->
                </div>
                <!-- Event List Top Bar End -->
                <!-- Event List Bottom Bar Start -->
                <div class="event-list-bottom-bar">
                    <div class="event-list-btn">
                        <a class="event-btn" href="#"><i class="flaticon-back"></i></a>
                        <a class="event-btn" href="#"><i class="flaticon-next"></i></a>
                    </div>
                </div>
                <!-- Event List Bottom Bar End -->



                <!-- Event List Content Start -->
                <div class="event-list-content-wrap">
                    <div class="tab-content">
                        <div class="tab-pane" id="grid">
                            <div class="row">
                                @foreach($events as $event)
                                    <div class="col-lg-4 col-sm-6">
                                        <!-- Event List Item Start -->
                                        <div class="event-list-item">
                                            <div class="event-img">
                                                <a href="event-single.html"> <img src="{{asset("assets/images/events/".$event->image)}}" alt=""></a>
                                            </div>
                                            <div class="event-list-content">
                                                <div class="event-price">
                                                    <span class="cat">Featured</span>
                                                    <span class="price">$25</span>
                                                </div>
                                                <h3 class="title"><a href="event-single.html">Virtual Event with Protected Content and Hidden Livestream </a></h3>
                                                <div class="meta-data">
                                                    <span><i class="fas fa-map-marker-alt"></i> 1:00AM-2:00AM</span>
                                                    <span><i class="fas fa-map-marker-alt"></i>    Sand diego, Canada</span>
                                                </div>
                                                <div class="event-desc">
                                                    <p>Managing a popular open source project can be daunting at first. How do we maintain all these issues, or automatically trigger enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                                                </div>
                                                <a class="ticket-link" href="price.html">Get Ticket Now</a>
                                            </div>
                                        </div>
                                        <!-- Event List Item End -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane show active" id="list">
                            @foreach($events as $event)
                                <!-- Event List Item Start -->
                                <div class="event-list-item event-list d-lg-flex align-items-center">
                                    <div class="event-img">
                                        <img src="{{asset("assets/images/events/".$event->image)}}" alt="">
                                    </div>
                                    <div class="event-list-content">
                                        <div class="event-price">
                                            <span class="cat">Featured</span>
                                            <span class="price">{{$event->price}}</span>
                                        </div>
                                        <h3 class="title"><a href="event-single.html">{{$event->name}} </a></h3>
                                        <div class="meta-data">
                                            <span><i class="fas fa-map-marker-alt"></i> {{$event->date}}</span>
                                            <span><i class="fas fa-map-marker-alt"></i> {{$event->location->name}}</span>
                                        </div>
                                        <div class="event-desc">
                                            <p>Managing a popular open source project can be daunting at first. How do we maintain all these issues, or automatically trigger enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                                        </div>
                                        <a class="ticket-link" href="{{route("buy.index")}}">Get Ticket Now</a>
                                    </div>
                                    <span class="event-time"><span>{{$event->id}}</span></span>
                                </div>
                                <!-- Event List Item EEnd -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Event List Content End -->
                <div class="event-next-prev-btn text-center">
                    <a class="event-btn" href="#"><i class="flaticon-back"></i> Previous</a>
                    <a class="event-btn btn-next" href="#">Next <i class="flaticon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Event List End -->

    </div>




@endsection
