
<!-- Page Banner Start -->

<div class="section page-banner-section">
    <div class="shape-2"></div>
    <div class="container">
        <div class="page-banner-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Banner Content Start -->
                    <div class="page-banner text-center">
                        <h2 class="title">{{$title}}</h2>
                        <ul class="breadcrumb justify-content-center">
                            @foreach($breadcrumps as $breadcrump)
                            <li class="breadcrumb-item {{$breadcrump["active"]}}" @if($breadcrump["current"]) aria-current="page" @endif><a href="{{$breadcrump["link"]}}">{{$breadcrump["name"]}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Page Banner Content End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner End -->
