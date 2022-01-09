<div class="w-25">
  <h4 class = "mb-4">Administration Panel</h4>
  
  <hr class = "w-100 mb-3">

  <ul class="list-group list-group-numbered">
    <li class="list-group-item">
      <div class="ms-2 me-auto d-flex flex-column">
        <a href = "{{route('profile')}}" class="fw-bold">Profile</a>
        <span>Check or edit your profile</span>
      </div>
    </li>
    <li class="list-group-item">
      <div class="ms-2 me-auto d-flex flex-column">
        <a href = "{{route('userManagementArea')}}" class="fw-bold">Users Management</a>
        <span>Create, delete or ban/unban users</span>
      </div>
    </li>
    <li class="list-group-item">
      <div class="ms-2 me-auto d-flex flex-column">
        <a href = "{{route('productManagementArea')}}" class="fw-bold">Products Management</a>
        <span>Add, delete or edit products</span>
      </div>
    </li>
    <li class="list-group-item">
      <div class="ms-2 me-auto d-flex flex-column">
        <a href = "{{route('orderManagementArea')}}" class="fw-bold">Orders Management</a>
        <span>Change orders states</span>
      </div>
    </li>
  </ul>
</div> 