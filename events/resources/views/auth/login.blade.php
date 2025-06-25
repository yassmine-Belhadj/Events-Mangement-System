@extends("includes.main_with_banner",["title" => "Login","breadcrumps"=>[['link' => route("home"), 'name' => "Home",'active'=>'',"current"=>false],
 ['link' => "#", 'name' => "Login",'active'=>'',"current"=>true]]])
@section("content_with_banner")

    <!-- Contact Form Start -->
    <div class="contact-form-section section-padding">
        <div class="container">
            <!-- Contact Wrap Start -->
            <div class="contact-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-title text-center">
                            <h2 class="title">Admin Login</h2>
                            <ul>@if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <!-- Contact Form Wrap Start -->
                        <div class="contact-form-wrap">
                            <form method="POST" action="{{ route('login.check') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label for="email">Email</label>
                                            <input class="form-control" placeholder="Your Email" id="email" type="email"
                                                   name="email" value="{{old('email')}}" required autofocus
                                                   autocomplete="username">
                                        </div>
                                        <!-- Single Form End -->
                                    </div>


                                    <div class="col-md-6">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label for="password">Password</label>
                                            <input class="form-control" id="password"
                                                   type="password"
                                                   name="password"
                                                   required autocomplete="current-password" placeholder="Password">
                                        </div>
                                        <!-- Single Form End -->
                                    </div>

                                    <div class="col-md-12">
                                        <!--  Single Form Start -->
                                        <div class="form-btn text-center">
                                            <button class="btn btn-primary"
                                                    type="submit">Login Now
                                            </button>


                                        </div>
                                        <!--  Single Form End -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form Wrap End -->
                    </div>
                </div>
            </div>
            <!-- Contact Wrap End -->
        </div>
    </div>
    <!-- Contact Form End -->

@endsection
