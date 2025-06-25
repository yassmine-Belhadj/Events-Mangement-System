@extends("includes.main_with_banner",["title" => "About US","breadcrumps"=>[['link' => route("home"), 'name' => "Home",'active'=>'',"current"=>false],
 ['link' => "#", 'name' => "About Us",'active'=>'',"current"=>true]]])
@section("content_with_banner")






    <!-- Features Section Start -->
    <div class="meeta-features-section section-padding">

        <img class="shape-2" src="assets/images/shape/shape-11.png" alt="">
        <div class="container">
            <div class="meeta-features-wrap">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Section Title Start -->
                        <div class="meeta-section-title-2">
                            <h4 class="sub-title">Reason to join Event</h4>
                            <h2 class="main-title">Why Choose Us ?</h2>
                        </div>
                        <!-- Section Title End -->
                        <!-- Features Item Start -->
                        <div class="feature-item feature-1">
                            <div class="feature-icon">
                                <img src="assets/images/feature-icon-1.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h3 class="title"><a href="#">Trainings & Awards</a></h3>
                                <p>We’re inviting the top creatives in the tech industry from all over the world to come learn, grow, scrape their </p>
                            </div>
                        </div>
                        <!-- Features Item End -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Features Item Start -->
                        <div class="feature-item feature-2">
                            <div class="feature-icon">
                                <img src="assets/images/feature-icon-2.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h3 class="title"><a href="#">World Class Speaker</a></h3>
                                <p>We’re inviting the top creatives in the tech industry from all over the world to come learn, grow, scrape their </p>
                            </div>
                        </div>
                        <!-- Features Item End -->
                        <!-- Features Item Start -->
                        <div class="feature-item feature-3">
                            <div class="feature-icon">
                                <img src="assets/images/feature-icon-3.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h3 class="title"><a href="#">Evening Concert</a></h3>
                                <p>We’re inviting the top creatives in the tech industry from all over the world to come learn, grow, scrape their </p>
                            </div>
                        </div>
                        <!-- Features Item End -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Features Item Start -->
                        <div class="feature-item feature-4">
                            <div class="feature-icon">
                                <img src="assets/images/feature-icon-4.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h3 class="title"><a href="#">3 Days Conference</a></h3>
                                <p>We’re inviting the top creatives in the tech industry from all over the world to come learn, grow, scrape their </p>
                            </div>
                        </div>
                        <!-- Features Item End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section End -->
@endsection
