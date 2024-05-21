<style>
    /* Custom CSS for Navigation Menu */
.navbar-brand {
    font-weight: bold;
}

.nav-link {
    padding: 0.5rem 1rem;
}

.dropdown-menu {
    min-width: 10rem;
}

.dropdown-menu a {
    color: #212529;
}

.dropdown-menu a:hover {
    background-color: #f8f9fa;
}

</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo" height="30">
        </a>

        <!-- Hamburger Button (visible on small screens) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('/') }}">{{ __('Dashboard') }}</a>
                </li>
                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Manage User
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('users.index')}}">See Users</a></li>
                        <li><a class="dropdown-item" href="{{route('users.create')}}"> Add Users</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categoy
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('categories.create')}}">Add Category</a></li>
                        <li><a class="dropdown-item" href="{{route('categories.index')}}">View Category</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Expenses
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('expenses.create')}}">Add Expenses</a></li>
                        <li><a class="dropdown-item" href="{{route('expenses.index')}}">View Expenses</a></li>
                        <li><a class="dropdown-item" href="{{route('expenses.groupby')}}">GroupByExpenses</a></li>
                        <li><a class="dropdown-item" href="{{route('expenses.groupbymonth')}}">GroupByMonths</a></li>


                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        @auth
                        {{ Auth::user()->name }}
                        @endauth
                        @guest
                         Guest   
                        @endguest
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @auth
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                        @endauth
                        <!-- Logout Form -->
                        @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">{{ __('Log Out') }}</button>
                        </form>
                        @endauth
                        @guest
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endguest
                    </div>
                </li> 
            </ul>
        </div>
    </div>
</nav>
