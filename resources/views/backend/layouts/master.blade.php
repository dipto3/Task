<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Dashboard')</title>
    @include('backend.assets.styles')
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials -->
        @include('backend.partials.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials -->
            @include('backend.partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
            </div>

            <!-- main-panel ends -->
        </div>
        @include('backend.partials.footer')
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('backend.assets.js')
</body>

</html>
