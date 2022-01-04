<tr class = "text-center">
  <th>{{$cartProduct->id}}</th>
  <td class="card col m-1">
    <div class="card-body d-flex flex-row justify-content-between">
      <a href = "#">
        <img src = {{asset($cartProduct->image)}} width = "150px">
      </a>
    <span>{{$cartProduct->name}}</span>
    </div>
  </td>
  <td><span>Undefined</span></td>
  <td><h3 class="price">{{$cartProduct->price}}€</h3></td>
</tr>					