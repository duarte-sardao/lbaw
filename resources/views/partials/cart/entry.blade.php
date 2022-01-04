<tr class = "text-center mt-3 mb-3">
  <th>
    <a href = "#">
      <img src = {{asset($cartProduct->image)}} height = "150px">
    </a>
  </th>
  <td class="col m-1">
    <div class="d-flex flex-row justify-content-between">
      <span>{{$cartProduct->name}}</span>
    </div>
  </td>
  <td><span>Undefined</span></td>
  <td><h3 class="price">{{$cartProduct->price}}€</h3></td>
</tr>					