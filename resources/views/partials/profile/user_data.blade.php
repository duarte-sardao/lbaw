<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between">
    <h4>Your account data</h4>
    <form class="m-1" method = "POST" action = {{route('deleteProfile')}}>
      @csrf
      @method('delete')
      <button class = "btn btn-danger" type = "submit">
        Delete Account
      </button>
    </form>
  </div>

  

  <form class = "d-flex mt-3" id = "profile-form" method = "POST" action = "{{url('/users/edit/'.$user->id)}}">
    @csrf

    <div class="container-fluid">
      <div class="form-group">
        <label for="username"><h6>Username</h6></label>
        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" disabled>
      </div>
      
      <div class="form-group mt-3">
        <label for="password"><h6>Password</h6></label>
        <input type="password" class="form-control" id="password" name="password" placeholder = "*********" disabled>
      </div>
  
      <div class="form-group mt-3">
        <label for="email"><h6>Email</h6></label>
        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
      </div>
  
      <div class="form-group mt-3">
        <label for="phone"><h6>Phone</h6></label>
        <input type="phone" class="form-control" id="phone" name="phone" value="{{$user->phone}}" disabled>
      </div>

      <div class="d-flex justify-content-between">
        <span class = "btn btn-primary mt-2" id = "editProfileButton">Edit</span>
        
        <label class = "btn btn-outline-primary mt-1" for="profilePic" id = "uploadPhotoInput" hidden>Upload a picture</label>
        <input class="form-control-file m-1" type="file" name = "profilePic" id="profilePic" hidden>
      
          <button class="btn btn-outline-success m-1" type="submit"  id = "profileSubmitButton" hidden>Submit</button>
      </div> 
    </div>
    
    <div class="d-flex flex-column">
      <img src = "{{asset($user->profilepic)}}" alt = "Your profile picture">
    </div>
  </form>
</div>    