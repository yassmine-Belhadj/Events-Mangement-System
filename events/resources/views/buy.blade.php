@extends("includes.main_with_banner",["title" => "Buy","breadcrumps"=>[['link' => route("home"), 'name' => "Home",'active'=>'',"current"=>false],
 ['link' => "#", 'name' => "Buy",'active'=>'',"current"=>true]]])
@section("content_with_banner")


    <!-- Pricing Start -->
    <div class="meeta-pricing meeta-pricing-2 meeta-pricing-4 meeta-pricing-5 section-padding">

        <div class="container">

            <!-- Section Title Start -->
            <div class="meeta-section-title-2 section-title-4 text-center">
                <h4 class="sub-title">Ticket Price</h4>
                <h2 class="main-title">Get Your Tickets Now</h2>
            </div>
            <!-- Section Title End -->

            <div class="row gy-5 justify-content-center meeta-pricing-row">
                <div class="col-lg-4 col-md-8">

                    <!-- Single Pricing Start -->
                    <div class="single-pricing color-1">
                        <div class="pricing-header">
                            <h3 class="price_title">Basic Pass</h3>
                            <div class="price">
                                <span><sup>$</sup>45</span>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul>
                                <li>Back Row Seat</li>
                                <li>Free Lunch & Snacks</li>
                                <li>Event Certificate</li>
                                <li>1 Workshop</li>
                            </ul>
                            <a class="btn" href="#">Book A Seat</a>
                        </div>
                    </div>
                    <!-- Single Pricing End -->

                </div>
                <div class="col-lg-4 col-md-8">

                    <!-- Single Pricing Start -->
                    <div class="single-pricing color-2">
                        <div class="pricing-header">
                            <h3 class="price_title">Standard Pass</h3>
                            <div class="price">
                                <span><sup>$</sup>65</span>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul>
                                <li>Back Row Seat</li>
                                <li>Free Lunch & Snacks</li>
                                <li>Event Certificate</li>
                                <li>1 Workshop</li>
                            </ul>
                            <a class="btn" href="#">Book A Seat</a>
                        </div>
                    </div>
                    <!-- Single Pricing End -->

                </div>
                <div class="col-lg-4 col-md-8">

                    <!-- Single Pricing Start -->
                    <div class="single-pricing color-3">
                        <div class="pricing-header">
                            <h3 class="price_title">Premium Pass</h3>
                            <div class="price">
                                <span><sup>$</sup>85</span>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul>
                                <li>Back Row Seat</li>
                                <li>Free Lunch & Snacks</li>
                                <li>Event Certificate</li>
                                <li>1 Workshop</li>
                            </ul>
                            <a class="btn btn-primary" href="#">Book A Seat</a>
                        </div>
                    </div>
                    <!-- Single Pricing End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->
@endsection
