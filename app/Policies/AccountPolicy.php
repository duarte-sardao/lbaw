
<?php

namespace App\Policies;

use App\Models\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
{
  use HandlesAuthorization;

  public function show(Account $Account)
  {
    return Auth::user()->id == $Account->id; 
  }

  public function update(Account $Account)
  {
    return Auth::user()->id == $Account->id;
  }

  public function delete(Account $Account)
  {
    return Auth::user()->id == $Account->id;
  }
}

>