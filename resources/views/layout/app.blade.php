<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial Statements</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-btlGreen text-white shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center py-4">
            <!-- Logo -->
            <a href="{{ route('financial-statements.fetch_all') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo-btl.svg') }}" alt="BTL Logo" class="h-8">
                <span class="text-lg font-bold uppercase">Banque Tuniso-Lybienne</span>
            </a>

            <!-- Navigation Links -->
            <ul class="hidden md:flex space-x-6">
                <li><a href="{{ route('financial-statements.fetch_all') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ route('financial-statements.fetch_all') }}" class="hover:underline">Financial Statements</a></li>
                <li><a href="{{ route('financial-statements.fetch_all') }}" class="hover:underline">Logout</a></li>
            </ul>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuButton" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden bg-btlGreen text-white md:hidden">
            <ul class="flex flex-col space-y-4 p-4">
                <li><a href="{{ route('financial-statements.fetch_all') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ route('financial-statements.fetch_all') }}" class="hover:underline">Financial Statements</a></li>
                <li><a href="{{ route('financial-statements.fetch_all') }}" class="hover:underline">Logout</a></li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <script>
        document.getElementById('mobileMenuButton').addEventListener('click', () => {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });
    </script>
    @vite('resources/js/app.js')
    @vite('resources/js/stepper_conf.js')
    @vite('resources/js/calc_actifs.js')
    @vite('resources/js/calc_passifs.js')
    @vite('resources/js/etat_resultat.js')
    @vite('resources/js/financialStatements.js')
</body>
</html>