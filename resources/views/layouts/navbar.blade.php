<header class="navbar navbar-expand-lg bg-dark sticky-top justify-content-between">
  <!-- Navbar left container -->
  <div class="navbar-nav d-flex align-items-center">
    <div class="logo">
      <a class="navbar-brand m-2" href=" {{ route('home') }}">Grab N' Build</a>
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

  <div class="d-flex justify-content-center w-50" >
    <input class = "w-75" type = "text" placeholder = "Search">
  </div>
  
  <div class = "navbar-nav d-flex">
    @if (Auth::check())
      <div class="btn btn-primary m-2 bg-none">
        <i class="fa fa-user"></i>
        <span>{{Auth::user()->id}}</span>
        
        <div class="card">
          <div class="card-body">
            <a href = "{{route('logout')}}">Logout</a>
          </div>
        </div>
      </div> 
    @else
      <a class="btn btn-primary m-2" href="{{ route('login') }}"> Login </a>
    @endif
  </div>

</header>