<header class="navbar navbar-expand-lg bg-dark sticky-top justify-content-between">
  <!-- Navbar left container -->
  <div class="navbar-nav d-flex align-items-center">
    <div class="logo">
      <a class="navbar-brand m-2" href = "{{ route('home') }}">Grab N' Build</a>
    </div>

    <!-- Categories Dropdown -->
    <div class="dropdown m-2">
      <button class="btn btn-secondary dropdown-toggle" id = "categoriesDropdown" data-toggle="dropdown">
        Categories
      </button>
      <nav class="dropdown-menu">
        <a class="dropdown-item" href="{{url('products/categories/CPU')}}">CPUs</a>
        <a class="dropdown-item" href="{{url('products/categories/GPU')}}">GPUs</a>
        <a class="dropdown-item" href="{{url('products/categories/Motherboard')}}">Motherboards</a>
        <a class="dropdown-item" href="{{url('products/categories/Storage')}}">Storage</a>
        <a class="dropdown-item" href="{{url('products/categories/PcCase')}}">Cases</a>
        <a class="dropdown-item" href="{{url('products/categories/Cooler')}}">Coolers</a>
        <a class="dropdown-item" href="{{url('products/categories/Powersupply')}}">Power Supplies</a>
        <a class="dropdown-item" href="{{url('products/categories/Other')}}">Other</a>
      </nav>
    </div>
  </div>  

  <!-- Search bar -->
  <form class="form-inline d-flex w-50" method = "POST" action = "{{route('search')}}">
    @csrf
    
    <input class="form-control mr-sm-2" type="search" name = "search" placeholder="Search">
  </form>
  
  <!-- User features -->
  <div class = "navbar-nav d-flex">
    @if (Auth::check())
      <a class="btn btn-primary m-2" href = "{{route('profile')}}">
        <i class="fa fa-user"></i>
        <span>{{Auth::user()->username}}</span>
      </a> 

      @if(Auth::user()->id >= 5)
      <a class="btn btn-primary m-2" href = "{{route('showCart')}}">
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