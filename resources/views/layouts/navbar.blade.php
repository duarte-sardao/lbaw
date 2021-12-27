<header class="navbar navbar-expand-lg bg-dark sticky-top justify-content-between">
  <!-- Navbar left container -->
  <div class="navbar-nav">
    <a class="navbar-brand m-2" href="#">Grab N' Build</a>

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
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </nav>
    </div>
  </div>  

  <div class="search-bar d-flex justify-content-center w-50" >
    <input class = "w-75" type = "text">
  </div>
  
  <div class = "navbar-nav d-flex">
    @if (Auth::check())
      <a class="button" href="{{ route('logout') }}"> Logout </a> 
    @else
      <a class="button" href="{{ route('login') }}"> Login </a>
    @endif
  </div>
</header>