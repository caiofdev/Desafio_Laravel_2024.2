<nav x-data="{ open: false }" class="bg-slate-900 border-b border-blue-500">

    <!-- Primary Navigation Menu -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->

                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('images/app-logo.png')}}" class="block w-10 fade-up"/>
                    </a>
                </div>

                <!-- Navigation Links -->

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex fade-up">

                    <!-- Users -->

                    @if(Auth::guard('web')->check()) 
                        <x-nav-link class="text-white border-none hover:text-blue-500" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        
                        <x-nav-link class="text-white border-none hover:text-blue-500" :href="route('user.view-loan')" :active="request()->routeIs('user.view-loan')">
                            {{ __('Loan') }}    
                        </x-nav-link>
                        
                        <x-nav-link class="text-white border-none hover:text-blue-500" :href="route('user.transaction')" :active="request()->routeIs('transaction')">
                            {{ __('Transactions') }}
                        </x-nav-link>

                    <!-- Manager -->

                    @elseif(Auth::guard('manager')->check()) 
                        <x-nav-link class="text-white border-none hover:text-blue-500" :href="route('manager.dashboard')" :active="request()->routeIs('manager.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link class="text-white border-none hover:text-blue-500" :href="route('manager.view-loan')" :active="request()->routeIs('manager.view-loan')">
                            {{ __('Loan') }}
                        </x-nav-link>

                        <x-nav-link class="text-white border-none hover:text-blue-500" :href="route('manager.transaction')" :active="request()->routeIs('manager.transaction')">
                            {{ __('Transactions') }}
                        </x-nav-link>

                        <x-nav-link class="text-white border-none hover:text-blue-500" :href="route('manage.pendencies')" :active="request()->routeIs('manage.pendencies')">
                            {{ __('Pendencies') }}
                        </x-nav-link>

                        <!-- Admin -->

                        @elseif(Auth::guard('admin')->check())
                            @if(request()->routeIs('admin.dashboard'))
                                <x-nav-link class="text-white border-none hover:text-gray-700 disabled" aria-disabled="true">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            @else
                                <x-nav-link class="text-white border-none hover:text-blue-600" :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Dashboard') }}
                                </x-nav-link>
                            @endif

                            @if(request()->routeIs('admin.admin'))
                                <x-nav-link class="text-white border-none hover:text-gray-700 disabled" aria-disabled="true">
                                    {{ __('Administrators') }}
                                </x-nav-link>
                            @else
                                <x-nav-link class="text-white border-none hover:text-blue-600" :href="route('admin.admin')" :active="request()->routeIs('admin.admin')">
                                    {{ __('Administrators') }}
                                </x-nav-link>
                            @endif

                            @if(request()->routeIs('admin.manager'))
                                <x-nav-link class="text-white border-none hover:text-gray-700 disabled" aria-disabled="true">
                                    {{ __('Managers') }}
                                </x-nav-link>
                            @else
                                <x-nav-link class="text-white border-none hover:text-blue-600" :href="route('admin.manager')" :active="request()->routeIs('admin.manager')">
                                    {{ __('Managers') }}
                                </x-nav-link>
                            @endif
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="fade-up inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-slate-900 hover:text-blue-600 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                @if(Auth::guard('manager')->check())
                                    {{Auth::guard('manager')->user()->name}}
                                @elseif(Auth::guard('admin')->check())
                                    {{Auth::guard('admin')->user()->name}}
                                @else
                                    {{Auth::user()->name}}
                                @endif
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    @if(Auth::guard('web')->check())
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Account') }}
                            </x-dropdown-link>
                    @elseif(Auth::guard('manager')->check())
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Account') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('manager.user')">
                                {{ __('Manage Users') }}
                            </x-dropdown-link>
                    @else
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Account') }}
                        </x-dropdown-link>
                    @endif

                            <!-- Authentication -->

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>

                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            <!-- Hamburger -->

            <div class="-me-2 flex items-center sm:hidden">
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    @if(Auth::guard('manager')->check())
                        {{Auth::guard('manager')->user()->name}}
                    @elseif(Auth::guard('admin')->check())
                        {{Auth::guard('admin')->user()->name}}
                    @else
                        {{Auth::user()->name}}
                    @endif
                </div>
                <div class="font-medium text-sm text-gray-500">
                    @if(Auth::guard('manager')->check())
                        {{Auth::guard('manager')->user()->email}}
                    @elseif(Auth::guard('admin')->check())
                        {{Auth::guard('admin')->user()->email}}
                    @else
                        {{Auth::user()->email}}
                    @endif
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>