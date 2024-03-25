<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{env('APP_NAME')}}</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"> -->
    <link rel="stylesheet" href="{{ asset('admin_assets/build/css/tailwindcss.min.css').'?v='.config('app.vesion') ?? '1.0.0' }}">
    <script src="{{ asset('admin_assets/js/vue2.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <script src="{{ asset('admin_assets/js/vuejs-form.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <script src="{{ asset('admin_assets/js/axios.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <link rel="stylesheet" href="{{ asset('admin_assets/build/css/style.min.css').'?v='.config('app.vesion') ?? '1.0.0' }}">
    <script src="{{ asset('admin_assets/build/js/jquery.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <script src="{{ asset('admin_assets/ckeditor/build/ckeditor.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <script src="{{ asset('admin_assets/build/js/ckeditor.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    @yield('head')
</head>

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        @include('Base::layouts.base.side-bar')
        <div id="overlay"></div>
        <div class="layout">
            @include('Base::layouts.base.header')
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('admin_assets/build/js/app.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <script>
        $("#setting").click(function() {
            $(".settingchild").slideToggle("slow");
            $('overlay').show()
        });
    </script>
    @yield('foot')
</body>

</html>