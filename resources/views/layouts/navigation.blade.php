<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 print:hidden">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Entry') }}
                    </x-nav-link>
                    <x-nav-link :href="route('customers.create')" :active="request()->routeIs('customers.create')">
                        {{ __('New Ledger') }}
                    </x-nav-link>
                    <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.index')">
                        {{ __('Ledgers') }}
                    </x-nav-link>
                    <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')">
                        {{ __('Orders') }}
                    </x-nav-link>

                    @if ($pendingOrder > 0)
                    <x-nav-link :href="route('porder')" :active="request()->routeIs('porder')">
                        {{ __('Pending Orders')}} &nbsp;<span class="text-brick">{{' (' . $pendingOrder . ')'}}</span>
                    </x-nav-link>
                    @endif
                    
                    <x-nav-link :href="route('files.index')" :active="request()->routeIs('files.index')">
                        {{ __('Documents') }}
                    </x-nav-link>
                    <x-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.index')">
                        {{ __('Notes') }}
                    </x-nav-link>


                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 sm:gap-5">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                            <div>Reports</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('report.daily')">{{ __('Daily Sales Report') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('report.due')">{{ __('Due Sales Report') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('report.priod')">{{ __('Priodic Sales Report') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('report.cash')">{{ __('Cash Sales Report') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('report.lsakes')">{{ __('Ledger Sales Report') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('report.delivery')">{{ __('Delivery Report') }}</x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                @auth

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

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
                @endauth
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
                {{ __('Entry') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('customers.create')" :active="request()->routeIs('customers.create')">
                {{ __('New Ledger') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.index')">
                {{ __('Ledgers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')">
                {{ __('Orders') }}
            </x-responsive-nav-link>


            @if ($pendingOrder > 0)
                <x-responsive-nav-link :href="route('porder')" :active="request()->routeIs('porder')">
                    {{ __('Pending Orders'). ' (' . $pendingOrder . ')' }}
                </x-responsive-nav-link>
            @endif
        </div>
        @auth

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            {{-- <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div> --}}

            <div class="">
                <div class="grid grid-cols-4 border-b border-gray-200 pb-4">
                    <x-responsive-nav-link :href="route('report.daily')">{{ __('Daily Report') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report.due')">{{ __('Due Report') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report.priod')">{{ __('Priod Report') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report.cash')">{{ __('Cash Sales Report') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report.lsakes')">{{ __('Ledger Sales Report') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('report.delivery')">{{ __('Delivery Report') }}</x-responsive-nav-link>
                </div>

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
        @endauth
    </div>
</nav>
