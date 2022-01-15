<div class="row m-5">
  <table class = "table">
    <thead>
      <tr>
        <th scope = "col">Details</th>
        <th scope = "col">Values</th>
      </tr>
    </thead>

    <tbody>
      @if(!is_null($product->category))
        <tr>
          <td>Category</td>
          <td><a class = "text-dark" href="/products/categories/{{$product->category}}">{{$product->category}}</a></td>
        </tr>
      @endif

      @if(!is_null($product->brand))
        <tr>
          <td>Brand</td>
          <td><a class = "text-dark" href="#">{{$product->brand}}</a></td>
        </tr>
      @endif

      @if(!is_null($product->size))
        <tr>
          <td>Size</td>
          <td>{{$product->size}}</td>
        </tr>
      @endif  


      @if(!is_null($product->rating))
        <tr>
          <td>Rating</td>
          <td>{{$product->rating}} / 5.0</td>
        </tr>
      @endif  
    </tbody>
  </table>
</div>