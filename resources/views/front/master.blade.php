<!DOCTYPE html>
<html lang="en">
<head>

    @include('front.includes.assets.css')

</head>
<body>
<!-- HEADER -->
@include('front.includes.header')
<!-- /HEADER -->

<!-- NAVIGATION -->
@include('front.includes.menu')
<!-- /NAVIGATION -->

<!-- SECTION -->
@yield('body')
<!-- /SECTION -->

<!-- NEWSLETTER -->
@include('front.includes.newletter')
<!-- /NEWSLETTER -->

<!-- FOOTER -->
@include('front.includes.footer')

<!-- /FOOTER -->

@include('front.includes.assets.script')
</body>
</html>
