<!doctype html>
<html lang="en">

<head>
   @include('layouts.website.header')
   
    @yield('internal_css') 
   
</head>

<body>

  @include('layouts.website.navbar')
   
  @yield('content')

  @include('layouts.website.footer')  
  @yield('footer_script')
    
</body>

</html>
