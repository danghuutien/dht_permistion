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

</head>

<body>
    <div class="layout has-sidebar fixed-sidebar fixed-header">
        @include('Base::layouts.base.side-bar')
        <div id="overlay"></div>
        <div class="layout">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:border-none">
                <div class="flex-1 px-4 flex justify-between sm:px-6 lg:mx-auto lg:px-8 sticky shrink-0 gap-x-4 border-b border-gray-300 bg-white shadow-sm">
                    @include('Base::layouts.base.breadcrumb')
                    <div class="ml-3 relative flex items-center ">
                        <div>
                            <button type="button" id="setting" aria-expanded="false" aria-haspopup="true" class="focus:outline-none max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-200">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-8 w-8 rounded-full"> 
                                <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block">
                                    <span class="sr-only">
                                        Open user menu for 
                                    </span> 
                                    admin 
                                </span> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd">

                                    </path>
                                </svg>
                            </button>
                        </div> 
                        <div role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" class="settingchild origin-top-right absolute top-full mt-2 right-0 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">
                            <a href="javascript:;" role="menuitem" tabindex="-1" id="user-menu-item-0" class="block px-4 py-2 text-sm text-gray-700">
                                Đổi mật khẩu
                            </a> 
                            <a href="{{route('admin.logout')}}" role="menuitem" tabindex="-1" id="user-menu-item-1" class="block px-4 py-2 text-sm text-gray-700">Đăng xuất</a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <main class="content">
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
</body>

</html>