<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Laravel App</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
 
  </head>
  <body class="bg-gray-100 text-gray-800">
  <nav class="flex py-5 bg-indigo-500 text-white">
    <div class="w-1/2 px-12 mr-auto">
      <p class="text-2x1 font-bold">My Application</p>
    </div>
    <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
      <li class="mx-2">
          <a href="{{route('stalls.index')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Puestos</a>
      </li>
      <li class="mx-2">
          <a href="{{route('employees.index')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Empleados</a>
      </li>
    </ul>
  </nav>
    @yield('content')
    
  
  </body>
</html>