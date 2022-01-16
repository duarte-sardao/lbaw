<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between mb-2">
    <h4>New account</h4>
  </div>

  <form class = "row g-3" method = "POST" action= {{route('createUser')}}>
    @csrf

    <div class="col-md-6">
      <label for="username" class="form-label">
        <span>Username</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="username" id="username" placeholder="ExampleUsername1234" required>
    </div>

    <div class="col-md-6">
      <label for="email" class="form-label">
        <span>Email</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="email" id="email" placeholder="myemail@example.com" required>
    </div>

    <div class="col-md-6">
      <label for="password" class="form-label">
        <span>Password</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="password" id="password" placeholder = "MyPassword" required>
    </div>
    
    <div class="col-md-6">
      <label for="phone" class="form-label">
        <span>Phone</span> 
      </label>
      <input type="text" class="form-control" name="phone" id="phone" placeholder = "912345678">
    </div>

    <div class="col-md-2">
      <label for="admin" class="form-label">
        <span>Administrator Privileges</span>
        <small class = "required-input">*</small>
      </label>
      <select name="admin" id="admin" required>
        <option value="false">False</option>
        <option value="true">True</option>
      </select>
    </div>

    <div class="col-12">
      <button class = "btn btn-outline-success" type = "submit">
        Submit
      </button>
    </div>
    
    @foreach($errors as $error)
      <div class="col-12">
        <div class = "alert alert-danger">
          <i class="fa fa-times"></i>
          {{$error}}
        </div>
      </div>
    @endforeach
  </form>
</div>