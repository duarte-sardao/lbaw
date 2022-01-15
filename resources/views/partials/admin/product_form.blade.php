<div class="col w-60 d-flex flex-column">
  <div class="d-flex justify-content-between mb-2">
    <h4>New address</h4>
  </div>

  <form class = "row g-3" method = "POST" action= {{route('createProduct')}}>
    @csrf

    <div class="col-12">
      <label for="name" class="form-label">
        <span>Product Name</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Saint Louis St." required>
    </div>

    <div class="col-md-4">
      <label for="price" class="form-label">
        <span>Price</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="price" id="price" placeholder="123" required>
    </div>

    <div class="col-md-4">
      <label for="size" class="form-label">
        <span>Size</span> 
      </label>
      <input type="text" class="form-control" name="size" id="size" placeholder = "10">
    </div>
    
    <div class="col-md-4">
      <label for="stock" class="form-label">
        <span>Stock</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="stock" id="stock" placeholder = "4321-567" required>
    </div>

    <div class="col-md-4">
      <label for="brand" class="form-label">
        <span>Brand</span>
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="brand" id="brand" placeholder = "1" required>
    </div>


    <div class="col-md-8">
      <label for="description" class="form-label">
        <span>Description</span>
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="description" id="description" placeholder = "Bullevard" required>
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