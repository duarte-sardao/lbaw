
<?php

namespace App\Policies;

use App\Models\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
  use HandlesAuthorization;

  public function show(Customer $customer)
  {
    return Auth::user()->id == $customer->id; 
  }

  public function update(Customer $customer)
  {
    return Auth::user()->id == $customer->id;
  }

  public function delete(Customer $customer)
  {
    return Auth::user()->id == $customer->id;
  }
}

>