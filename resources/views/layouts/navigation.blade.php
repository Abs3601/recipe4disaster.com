<!-- NAVBAR WRAPPER -->
<nav class="sticky top-0 z-50 bg-ui-lightBg/95 dark:bg-ui-darkBg/95 shadow-sm backdrop-blur-md">

    <!-- Desktop Navbar -->
    <div class="hidden sm:flex items-center justify-between px-8 py-4">

        <!-- LEFT: Logo -->
        <a href="{{ url('/') }}" class="text-ui-primary font-brand text-xl font-bold">
            Recipe4Disaster.com
        </a>

        <!-- RIGHT: Navigation Links -->
        <div class="flex items-center space-x-6">

            <!-- Home -->
            <x-nav-link :href="url('/')" :active="request()->is('/')">
                Home
            </x-nav-link>

            <!-- Browse -->
            <x-nav-link :href="route('recipes.browse')" :active="request()->routeIs('recipes.browse')">
                Browse Recipes
            </x-nav-link>

            @auth
                <!-- Add Recipe -->
                <x-nav-link :href="route('recipes.create')" :active="request()->routeIs('recipes.create')">
                    Add Recipe
                </x-nav-link>

                <!-- ADMIN SECTION -->
                @if(auth()->user()->is_admin)
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')" class="text-ui-primary font-bold">
                        Admin
                    </x-nav-link>
                @endif
            @endauth

            @guest
                <!-- Register -->
                <x-nav-link :href="url('/register')" :active="request()->is('register')">
                    Register
                </x-nav-link>

                <!-- Login -->
                <x-nav-link :href="url('/login')" :active="request()->is('login')">
                    Login
                </x-nav-link>
            @endguest

            @auth
            <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                My Profile
            </x-nav-link>
            @endauth


            @auth
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link text-red-600 dark:text-red-400">
                        Logout
                    </button>
                </form>
            @endauth

            <!-- Dark Mode Toggle -->
            <button id="theme-toggle" class="nav-toggle-btn"> 🌓 </button>

        </div>
    </div>


    <!-- Mobile Navbar -->
    <div class="sm:hidden flex items-center justify-between px-4 py-3">

        <!-- LEFT: Logo -->
        <a href="{{ url('/') }}" class="text-ui-primary font-brand text-lg font-bold">
            Recipe4Disaster.com
        </a>

        <!-- RIGHT: Buttons -->
        <div class="flex items-center space-x-4">
            <!-- Dark Mode -->
            <button id="theme-toggle-mobile" class="nav-toggle-btn"> 🌓 </button>

            <!-- Hamburger -->
            <button id="mobile-menu-btn" class="mobile-menu-btn text-3xl leading-none"> ☰ </button>
        </div>
    </div>


    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="hidden mobile-menu mobile-menu-animate">

        <x-nav-link :href="url('/')" class="block">
            Home
        </x-nav-link>

        <x-nav-link :href="route('recipes.browse')" class="block">
            Browse Recipes
        </x-nav-link>

        @auth
            <x-nav-link :href="route('recipes.create')" class="block">
                Add Recipe
            </x-nav-link>

            @if(auth()->user()->is_admin)
                <x-nav-link :href="route('admin.dashboard')" class="block text-ui-primary font-bold">
                    Admin Panel
                </x-nav-link>
            @endif
        @endauth

        @guest
            <x-nav-link :href="url('/register')" class="block">
                Register
            </x-nav-link>

            <x-nav-link :href="url('/login')" class="block">
                Login
            </x-nav-link>
        @endguest

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-red-600 dark:text-red-400 block">
                    Logout
                </button>
            </form>
        @endauth
    </div>

</nav>
