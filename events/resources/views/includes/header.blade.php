<!-- Header Start -->
<div class="meeta-header-section meeta-header-2 meeta-header-3 meeta-header-5">

    <!-- Header Middle Start -->
    <div class="header-middle header-sticky">
        <div class="container">

            <div class="header-wrap">
                <!-- Header Logo Start -->
                <div class="header-logo header-logo-3">
                    <a class="logo-black" href="{{route("home")}}"><img src="{{asset("assets/images/logo-3.png")}}" alt="Logo"></a>
                    <a class="logo-white" href="{{route("home")}}"><img src="{{asset("assets/images/logo-4.png")}}" alt="Logo"></a>
                </div>
                <!-- Header Logo End -->



                <!-- Header Navigation Start -->
                <div class="header-navigation d-none d-lg-block">
                    <ul class="main-menu">
                        <li><a href="{{route("home")}}">Home</a></li>
                        <li><a href="{{route("about.index")}}">About Us </a></li>
                        <li><a href="{{route("events.index")}}">Events</a></li>

                        <li><a href="{{route("contact.index")}}">Contact</a></li>

                    </ul>
                </div>
                <!-- Header Navigation End -->

                <!-- Header Meta Start -->
                <div class="header-meta">

                    <div class="header-btn d-none d-md-block">
                        <a href="{{route("buy.index")}}" class="btn-2">Buy Ticket</a>
                        <a href="{{route("login.index")}}" class="btn-2">Login</a>
                    </div>

                    <!-- Header Toggle Start -->
                    <div class="header-toggle d-lg-none">
                        <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <!-- Header Toggle End -->

                </div>
                <!-- Header Meta End -->

            </div>

        </div>
    </div>
    <!-- Header Middle End -->

</div>
<!-- Header End -->
