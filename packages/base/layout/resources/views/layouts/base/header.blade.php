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