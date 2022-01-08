<div class="row m-5">
  <table class = "table">
    <thead>
      <tr>
        <th scope = "col">Details</th>
        <th scope = "col">Values</th>
      </tr>
    </thead>

    <tbody>
      @if(!is_null($product->size))
        <tr>
          <td>Size</td>
          <td>{{$product->size}}</td>
        </tr>
      @endif  

      @if(!is_null($product->brand))
        <tr>
          <td>Brand</td>
          <td>{{$product->brand}}</td>
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