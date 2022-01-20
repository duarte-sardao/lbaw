<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aboutus.css')}}" rel="stylesheet">
    <link href="{{ asset('css/buttons.css')}}" rel ="stylesheet">
    <link href="{{ asset('css/cart.css')}}" rel ="stylesheet">
    <link href="{{ asset('css/contacts.css')}}" rel ="stylesheet">
    <link href="{{ asset('css/faq.css')}}" rel="stylesheet">
    <link href="{{ asset('css/login_register.css')}}" rel ="stylesheet">
    <link href="{{ asset('css/not_found.css')}}" rel ="stylesheet">
    <link href="{{ asset('css/product_form.css')}}" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    
    <!-- Scripts -->
    <script type="text/javascript" src={{ asset('js/app.js') }} defer></script>
    <script type="text/javascript" src={{ asset('js/faq.js')}} defer></script>
    <script type="text/javascript" src={{ asset('js/payment.js')}} defer></script>
  </head>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
    
    @include('layouts.navbar')
   {{--  @include('partials.common.breadcrumbs', ['breadcrumbs' => $breadcrumbs ?? '', 'current' => $current ?? '']) --}}

    <main class = "d-flex flex-column w-100 h-75">
      @yield('content')
      
      <!-- BootStrap -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </main>

    @include('layouts.footer')
  </body>
</html>

