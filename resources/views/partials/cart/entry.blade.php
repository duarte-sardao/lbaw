<tr class = "text-center mt-3 mb-3">
  <th>
    <a href = "#">
      <img src = {{asset($item['product']->image)}} height = "150px">
    </a>
  </th>

  <td class="cart-entry">
    <div class="d-flex flex-column align-items-start">
      <strong>{{$item['product']->name}}</strong>
      <p>{{$item['product']->description}}</p>
    </div>
  </td>

  <td class = "cart-entry">
    <span>{{$item['quantity']}}</span>
  </td>

  <td class = "cart-entry">
    <h3 class="price">{{$item['product']->price}}€</h3>
  </td>
</tr>					