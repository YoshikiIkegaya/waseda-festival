<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ trans('common.page.master.title') }}</title>

        @include('partial.styles')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('partial.left-sidebar')

                @include('partial.navigation')

                <!-- page content -->
                <div id="main-content" class="right_col" role="main">
                    @yield('content')
                </div>
                <!-- /page content -->

                @include('partial.footer')

            </div>
        </div>

        @include('partial.scripts')

    </body>
</html>
