@extends("includes.main",["title"=>$title])
@section("css_content")
    <style>
        .page-banner-section {
            min-height: 645px;
            background-image: url({{asset("assets/images/page-banner.jpg")}});
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            display: flex;
            align-items: center;
            padding-top: 100px;
            position: relative;
            z-index: 1;
        }
    </style>
@endsection
@section("content")
    @include("includes.banner",["title"=>$title,"breadcrumps" => $breadcrumps])
    @yield("content_with_banner")
@endsection
