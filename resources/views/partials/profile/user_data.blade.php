<div class="user-info w-25 d-flex flex-column">
  <div class="d-flex justify-content-between">
    <h4>Your account data</h4>
    <span class = "btn btn-primary" id = "editProfileButton">Edit</span>
  </div>

  <form class = "mt-3" id = "profile-form" method = "POST" action = "{{url('/users/edit/'.$user->id)}}">
    {{ csrf_field() }}
    <hr class = "w-100 mb-3">

    <div class="form-group">
      <label for="username"><h6>Username</h6></label>
      <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" disabled>
    </div>
    
    <div class="form-group mt-3">
      <label for="password"><h6>Password</h6></label>
      <input type="password" class="form-control" id="password" name="password" value = "*********" disabled>
    </div>

    <div class="form-group mt-3">
      <label for="email"><h6>Email</h6></label>
      <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
    </div>

    <div class="form-group mt-3">
      <label for="phone"><h6>Phone</h6></label>
      <input type="phone" class="form-control" id="phone" name="phone" value="{{$user->phone}}" disabled>
    </div>

    <button type="submit" class="btn btn-primary mt-5" id = "profileSubmitButton" hidden>Submit</button>
  </form>
</div>    