@extends('layouts.app')

@section('content')
  <!-- Breadcrumbs -->
  <nav class = "m-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$account->username}}</li>
    </ol>
  </nav>

  <section class="d-flex justify-content-evenly">
    <div class="card" style = "width:25rem">
      <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
        <h5 class="card-title">Account Panel</h5>
        
        <nav class="user-pages w-75 d-flex flex-column justify-content-center">
          <a class="btn btn-secondary m-1 active" href = "#" >Personal Info</a>
          <a class="btn btn-secondary m-1" href = "#">Orders</a>
          <a class="btn btn-secondary m-1" href = "#">Addresses</a>
          <a class="btn btn-secondary m-1" href = "#">Wishlist</a>
          <a class="btn btn-secondary m-1" href = "#">Preferences</a>
        </nav> 
      </div>
    </div>

    <div class="user-info w-25 d-flex flex-column">
      <div class="d-flex justify-content-between">
        <h4>Your account data</h4>
        <span class = "btn btn-primary">Edit</span>
      </div>
      
      <hr>

      <form>
        <div class="form-group">
          <label for="username"><h6>Username</h6></label>
          <input type="text" class="form-control" id="username" placeholder="Nuno67713" disabled>
        </div>
        
        <div class="form-group mt-3">
          <label for="password"><h6>Password</h6></label>
          <input type="password" class="form-control" id="password" placeholder="***********" disabled>
        </div>

        <div class="form-group mt-3">
          <label for="email"><h6>Email</h6></label>
          <input type="email" class="form-control" id="email" placeholder="nunomiguel533@gmail.com" disabled>
        </div>

        <div class="form-group mt-3">
          <label for="phone"><h6>Phone</h6></label>
          <input type="phone" class="form-control" id="phone" placeholder="915756849" disabled>
        </div>
  
        <button type="submit" class="btn btn-primary mt-5" hidden>Submit</button>
      </form>
    </div>

    <div class="user-photo d-flex flex-column w-25">
      <div class="d-flex justify-content-between">
        <h5 class>Nuno67713</h5>
        <label class = "btn btn-primary" for="profilePic">Upload a picture</label>
        <input type="file" class="form-control-file" id="profilePic" hidden>
      </div>
      
      <img src = "default.jpg" alt = "Your profile picture">
    </div>
  </section>
@endsection