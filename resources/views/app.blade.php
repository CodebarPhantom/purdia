<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Purdia::name() }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name="msapplication-TileColor" content="#206bc4"/>
    <meta name="theme-color" content="#206bc4"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="robots" content="noindex,nofollow,noarchive"/>
    <link rel="icon" href="{{ asset('vendor/purdia/favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('vendor/purdia/favicon.ico') }}" type="image/x-icon"/>
    <!-- Libs CSS -->
    <link href="{{ asset('vendor/purdia/dist/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/libs/selectize/dist/css/selectize.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/libs/fullcalendar/core/main.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/libs/fullcalendar/daygrid/main.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/libs/fullcalendar/timegrid/main.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/libs/fullcalendar/list/main.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/libs/flatpickr/dist/flatpickr.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/libs/nouislider/distribute/nouislider.min.css') }}" rel="stylesheet"/>
    @stack('styles')
    <!-- Tabler Core -->
    <link href="{{ asset('vendor/purdia/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <!-- Tabler Plugins -->
    <link href="{{ asset('vendor/purdia/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/css/tabler-buttons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/iconfont/tabler-icons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/purdia/dist/css/demo.min.css') }}" rel="stylesheet"/>
    <style>
      body {
        display: none;
      }
    </style>
</head>
<body class="antialiased">
    @include('purdia::partials.aside')
    <div class="page">
    @include('purdia::partials.header-nav')
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <footer class="footer footer-transparent">
              <div class="container-fluid">
                <div class="row text-center align-items-center flex-row-reverse">
                  <div class="col-lg-auto ml-lg-auto">
                    <ul class="list-inline list-inline-dots mb-0">
                      <li class="list-inline-item"><a href="#" class="link-secondary">Documentation</a></li>
                      <li class="list-inline-item"><a href="#" class="link-secondary">FAQ</a></li>
                    </ul>
                  </div>
                  <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    Copyright &copy; 2020
                    <a href="{{ url(config('purdia.path')) }}" class="link-secondary">{{ Purdia::name() }}</a> V{{ Purdia::version() }}.
                    All rights reserved.
                  </div>
                </div>
              </div>
            </footer>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script src="{{ asset('vendor/purdia/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/libs/jquery/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/libs/autosize/dist/autosize.min.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/libs/imask/dist/imask.min.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/libs/selectize/dist/js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/libs/flatpickr/dist/plugins/rangePlugin.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/libs/nouislider/distribute/nouislider.min.js') }}"></script>
    <script src="{{ asset('vendor/purdia/dist/js/tabler.min.js') }}"></script>
    @stack('scripts')
    <script>
      document.body.style.display = "block"
    </script>
</body>
</html>
