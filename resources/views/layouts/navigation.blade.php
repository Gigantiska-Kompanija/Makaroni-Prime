<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center" style="width:120px;">
                    <a href="{{ route('store') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('store')" :active="request()->routeIs('store')">
                        {{ __('Store') }}
                    </x-nav-link>
                    <x-nav-link :href="route('makaroni.index')" :active="request()->routeIs('makaroni.index')">
                        {{ __('Makaroni') }}
                    </x-nav-link>
                    @auth('manager')
                    <x-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')">
                        {{ __('Employees') }}
                    </x-nav-link>
                    <x-nav-link :href="route('divisions.index')" :active="request()->routeIs('divisions.index')">
                        {{ __('Divisions') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ingredients.index')" :active="request()->routeIs('ingredients.index')">
                        {{ __('Ingredients') }}
                    </x-nav-link>
                    <x-nav-link :href="route('machines.index')" :active="request()->routeIs('machines.index')">
                        {{ __('Machines') }}
                    </x-nav-link>
                    <x-nav-link :href="route('discounts.index')" :active="request()->routeIs('discounts.index')">
                        {{ __('Discounts') }}
                    </x-nav-link>
                        @if(Auth::guard('manager')->user()->admin)
                        <div class="inline-flex items-center px-1 pt-1 border-b-2 fs-5 font-medium leading-5 focus:outline-none transition duration-150 ease-in-out {{
    request()->routeIs('clients.index') || request()->routeIs('audit.index') || request()->routeIs('managers.index') ? "text-gray-900 border-warning focus:border-warning" :
    "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300"}}">
{{--                    <x-nav-link :href="'#'" :active="request()->routeIs('clients.index') || request()->routeIs('audit.index') || request()->routeIs('managers.index')">--}}
                        <x-dropdown width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center fs-5 font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
{{--                                    <x-nav-link :href="'#'">--}}
{{--                                    </x-nav-link>--}}
                                    {{ __('Other') }}
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('clients.index')">{{ __('Clients') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('audit.index')">{{ __('Audit Log') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('managers.index')" :active="request()->routeIs('managers.index')">{{ __('Managers') }}</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                        </div>
{{--                    </x-nav-link>--}}
                        {{--<x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')">
                            {{ __('Clients') }}
                        </x-nav-link>
                        <x-nav-link :href="route('audit.index')" :active="request()->routeIs('audit.index')">
                            {{ __('Audit Log') }}
                        </x-nav-link>
                        <x-nav-link :href="route('managers.index')" :active="request()->routeIs('managers.index')">
                            {{ __('Managers') }}
                        </x-nav-link>--}}
                        @else
                        <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')">
                            {{ __('Clients') }}
                        </x-nav-link>
                        @endif
                    @endauth
                    <x-nav-link>
                        <select class="selectpicker" data-width="fit" id="language-picker">
                            <option data-content='English' value="en" {{ Lang::locale() == 'en' ? 'selected' : ''}}>English</option>
                            <option data-content='Latviešu' value="lv" {{ Lang::locale() == 'lv' ? 'selected' : '' }}>Latviešu</option>
                        </select>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if (Route::has('login'))
                    @if(Auth::check() || Auth::guard('manager')->check())
                    <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center fs-5 font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>
                                @auth('manager')
                                    {{ Auth::guard('manager')->user()->employee()->first()->email }}
                                @else
                                    {{ Auth::user()->email }}
                                @endauth
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route(Auth::guard('manager')->check() ? 'manager.logout' : 'logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form>
                        @if(!Auth::guard('manager')->check())
                            <x-dropdown-link :href="route('clients.show', Auth::user()->id)">{{ __('Profile') }}</x-dropdown-link>
                        @endif
                    </x-slot>
                    </x-dropdown>
                    @else
                        <a href="{{ route('login') }}" class="fs-5 text-gray-700 underline">{{ __('Log in') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 fs-5 text-gray-700 underline">{{ __('Register') }}</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('store')" :active="request()->routeIs('store')">
                {{ __('Store') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('makaroni.index')" :active="request()->routeIs('makaroni.index')">
                {{ __('Makaroni') }}
            </x-responsive-nav-link>
            @auth('manager')
            <x-responsive-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')">
                {{ __('Employees') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('divisions.index')" :active="request()->routeIs('divisions.index')">
                {{ __('Divisions') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('ingredients.index')" :active="request()->routeIs('ingredients.index')">
                {{ __('Ingredients') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('machines.index')" :active="request()->routeIs('machines.index')">
                {{ __('Machines') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('discounts.index')" :active="request()->routeIs('discounts.index')">
                {{ __('Discounts') }}
            </x-responsive-nav-link>
                @if(Auth::guard('manager')->user()->admin)
                <x-responsive-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')">
                    {{ __('Clients') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('audit.index')" :active="request()->routeIs('audit.index')">
                    {{ __('Audit Log') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('managers.index')" :active="request()->routeIs('managers.index')">
                    {{ __('Managers') }}
                </x-responsive-nav-link>
                @else
                <x-responsive-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')">
                    {{ __('Clients') }}
                </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-4 border-t border-gray-200">
            <div class="flex items-center px-4">
            @if(Auth::check() || Auth::guard('manager')->check())
                <div class="space-y-1 mr-4">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route(Auth::guard('manager')->check() ? 'manager.logout' : 'logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
                <div>
                    @auth('manager')
                        {{ Auth::guard('manager')->user()->employee()->first()->email }}
                    @else
                        {{ Auth::user()->email }}
                    @endauth
                </div>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{ __('Log in') }}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('Register') }}</a>
                @endif
            @endauth
            </div>

        </div>
    </div>
</nav>
<script>
    $('#language-picker').change(function (e) {
        var url = '{{ route('lang.switch') }}'
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: url,
            data: {_token: CSRF_TOKEN, lang: e.target.value},
            success: function (ignored) {
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
</script>
