<div class="w-25">
  <h4 class = "mb-4">Account Panel</h4>
  
  <hr class = "w-100 mb-3">

  <ul class="list-group list-group-numbered">
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="d-flex flex-column ms-2 me-auto">
        <a class="fw-bold" href = {{route('profile')}}>Profile</a>
        <small>Edit your profile</small>
      </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="d-flex flex-column ms-2 me-auto">
        <a class="fw-bold" href = {{route('showOrders')}}>Orders</a>
        <small>Visit your order history</small>
      </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="d-flex flex-column ms-2 me-auto">
        <a class="fw-bold" href = {{/* route('showAddresses') */}}>Addresses</a>
        <small>Edit your addresses</small>
      </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="d-flex flex-column ms-2 me-auto">
        <a class="fw-bold" href = {{/* route('showWishlist') */}}>Wishlist</a>
        <small>Check the products you wish for</small>
      </div>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="d-flex flex-column ms-2 me-auto">
        <a class="fw-bold" href = {{/* route('showNotifications') */}}>Notifications</a>
        <small>Check for notifications</small>
      </div>
    </li>
  </ul>
</div> 