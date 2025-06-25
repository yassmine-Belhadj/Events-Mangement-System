<!doctype html>
<html class="no-js" lang="en">
@include("includes.head",["title" => $title])
<body>


<div class="main-wrapper">
    <!-- Preloader start -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    @include("includes.header")
    <!-- Preloader End -->
    @yield("content")
    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>
    <!-- back to top end -->
    @include("includes.js")
    @include('sweetalert::alert')
    @yield("js")

</div>

</body>
<footer>
    @include("includes.footer")
</footer>
</html>
