<header class="navbar navbar-expand-lg bg-dark sticky-top justify-content-between">
  <!-- Navbar left container -->
  <div class="navbar-nav d-flex align-items-center">
    <div class="logo">
      <a class="navbar-brand m-2" href = "{{ route('home') }}">Grab N' Build</a>
    </div>

    <!-- Brand Dropdown -->
    <div class="dropdown m-2">
      <button class="btn btn-secondary dropdown-toggle" id = "brandsDropdown" data-toggle="dropdown">
        Brands
      </button>
      <nav class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </nav>
    </div>

    <!-- Categories Dropdown -->
    <div class="dropdown m-2">
      <button class="btn btn-secondary dropdown-toggle" id = "categoriesDropdown" data-toggle="dropdown">
        Categories
      </button>
      <nav class="dropdown-menu">
        <a class="dropdown-item" href="#">CPUs</a>
        <a class="dropdown-item" href="#">GPUs</a>
        <a class="dropdown-item" href="#">Motherboards</a>
        <a class="dropdown-item" href="#">Storage</a>
        <a class="dropdown-item" href="#">Cases</a>
        <a class="dropdown-item" href="#">Coolers</a>
        <a class="dropdown-item" href="#">Power Supplies</a>
        <a class="dropdown-item" href="#">Other</a>
      </nav>
    </div>
  </div>  

  <!-- Search bar -->
  <form class="form-inline d-flex w-50">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  </form>
  
  <!-- User features -->
  <div class = "navbar-nav d-flex">
    @if (Auth::check())
    <span hidden id = "userId">{{Auth::user()->id}}</span>
      <a class="btn btn-primary m-2" href = "{{route('profile')}}">
        <i class="fa fa-user"></i>
        <span>{{Auth::user()->username}}</span>
      </a> 

      @if(Auth::user()->id >= 5)
      <a class="btn btn-primary m-2" href = "{{route('cart')}}">
        <i class="fa fa-shopping-cart"></i>
      </a> 
      @endif

      <a class="btn btn-primary m-2" href = "{{route('logout')}}">
        <i class="fa fa-sign-out"></i>
      </a> 
    @else
      <a class="btn btn-primary m-2" href = "{{ route('login') }}"> 
        <i class="fa fa-sign-in"></i>
        <span>Login</span>
      </a>
    @endif
  </div>

</header>