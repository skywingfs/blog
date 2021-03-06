    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
    <meta name="description" content="{{ config('blog.meta.description') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ config('blog.default_icon') }}">

    <title>@yield('title', config('app.name'))</title>

    <link rel="stylesheet" href="{{ mix('css/home.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/' . config('blog.color_theme') . '.css') }}">

    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?d600ffe632d2502d33a3fa7ee8143ced";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    @yield('styles')
</head>
<body>
    <div id="app">
        @include('particals.navbar')

        <div class="main">
            @yield('content')
        </div>

        @include('particals.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js')}}"></script>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/vue/2.6.10/vue.min.js"></script>
    <script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.js"></script>
    <script src="https://cdn.bootcss.com/emojione/2.2.7/lib/js/emojione.min.js"></script>
    <script src="https://cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/file-uploader/5.16.2/fine-uploader.min.js"></script>
    <script src="{{ mix('js/vendor.js')}}"></script>
    <script src="{{ mix('js/home.js') }}"></script>

    @yield('scripts')

    <script>
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>

    @if(config('blog.google.open'))
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ config('blog.google.id') }}', 'auto');
        ga('send', 'pageview');
    </script>
    @endif
</body>
</html>
