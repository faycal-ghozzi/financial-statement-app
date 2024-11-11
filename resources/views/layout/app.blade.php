<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial Statements</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">
    <main class="container mx-auto p-8">
        @yield('content')
    </main>
    @vite('resources/js/app.js')
    @vite('resources/js/stepper_conf.js')
    @vite('resources/js/calc_actifs.js')
    @vite('resources/js/calc_passifs.js')
    @vite('resources/js/etat_resultat.js')
</body>
</html>