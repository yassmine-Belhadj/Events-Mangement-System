@extends("includes.main_with_banner",["title" => "Contact","breadcrumps"=>[['link' => route("home"), 'name' => "Home",'active'=>'',"current"=>false],
 ['link' => "#", 'name' => "Contact",'active'=>'',"current"=>true]]])
@section("content_with_banner")

    <!-- Contact Form Start -->


        <!-- Vos champs de formulaire ici -->
     <div class="contact-form-section section-padding">
        <div class="container">
            <!-- Contact Wrap Start -->
            <div class="contact-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-title text-center">
                            <h2 class="title">Sent Us A Message</h2>
                        </div>
                        <!-- Contact Form Wrap Start -->
                        <div class="contact-form-wrap">
                            <form method="post" action="{{route("contact.store")}}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input class="form-control" type="text"  name="name" placeholder="Your Name">
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input class="form-control" type="email" name="email" placeholder="Your Email">
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input class="form-control" type="text" name="number" placeholder="Your Number">
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input class="form-control" type="text" name="subject" placeholder="Subject">
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <textarea class="form-control" placeholder="Write A Message"></textarea>
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                    <div class="col-md-12">
                                        <!--  Single Form Start -->
                                        <div class="form-btn text-center">

                                            <div class="offset-sm-10 col-sm-2 mb-5">     <button type="submit" class="btn btn-primary">Submit</button></div>
                                        </div>
                                        <!--  Single Form End -->
                                    </div>
                                </div>
                            </form>

                    </div>

                </div>
            </div>
            <!-- Contact Wrap End -->
        </div>
      </div>






    <!-- Contact Form End -->
@endsection
