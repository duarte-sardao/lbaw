<div class="mb-5">
  <div class="d-flex justify-content-between mb-2">
    <h4>New product</h4>
  </div>

  <form class = "row g-3" method = "POST" action= {{route('createProduct')}}>
    @csrf

    <div class="col-md-8">
      <label for="name" class="form-label">
        <span>Product Name</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Latest generation processor" required>
    </div>

    <div class="col-md-4">
      <label for="price" class="form-label">
        <span>Price</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="price" id="price" placeholder="123.00" required>
    </div>

    <div class="col-md-4">
      <label for="size" class="form-label">
        <span>Size</span> 
      </label>
      <input type="text" class="form-control" name="size" id="size" placeholder = "WWxLLxAA">
    </div>
    
    <div class="col-md-4">
      <label for="stock" class="form-label">
        <span>Stock</span> 
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="stock" id="stock" placeholder = "20" required>
    </div>

    <div class="col-md-4">
      <label for="category" class="form-label">
        <span>Category</span> 
        <small class = "required-input">*</small>
      </label>
      <select name="category" id="category" required>
        <option value="CPU">CPU</option>
        <option value="GPU">GPU</option>
        <option value="Cooler">Cooler</option>
        <option value="Motherboard">Motherboard</option>
        <option value="PowerSupply">Power Supply</option>
        <option value="Storage">Storage</option>
        <option value="PcCase">Desktop Case</option>
        <option value="Other">Other</option>
      </select>
    </div>

    <div class="col-md-2">
      <label for="brand" class="form-label">
        <span>Brand</span>
        <small class = "required-input">*</small>
      </label>
      <input type="text" class="form-control" name="brand" id="brand" placeholder = "Trendy brand" required>
    </div>
  
    <div class="col-md-2">
      <label for="field1" class="form-label">
        <span>Specific Attribute 1</span>
      </label>
      <input type="text" class="form-control" name="field1" id="field1" placeholder = "Specification 1">
    </div>

    <div class="col-md-2">
      <label for="field2" class="form-label">
        <span>Specific Attribute 2</span>
      </label>
      <input type="text" class="form-control" name="field2" id="field2" placeholder = "Specification 2">
    </div>

    <div class="col-md-2">
      <label for="field3" class="form-label">
        <span>Specific Attribute 3</span>
      </label>
      <input type="text" class="form-control" name="field3" id="field3" placeholder = "Specification 3">
    </div>

    <div class="col-md-2">
      <label for="field4" class="form-label">
        <span>Specific Attribute 4</span>
      </label>
      <input type="text" class="form-control" name="field4" id="field4" placeholder = "Specification 4">
    </div>

    <div class="col-md-2">
      <label for="field5" class="form-label">
        <span>Specific Attribute 5</span>
      </label>
      <input type="text" class="form-control" name="field5" id="field5" placeholder = "Specification 5">
    </div>

    <div class="col-md-12">
      <label for="description">
        <span>Description</span>
        <small class = "required-input">*</small>
      </label>
      <textarea id="description" name="description" placeholder="Write something.." style="height:100px" required></textarea>
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