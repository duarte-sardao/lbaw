<div class="card mb-4">
  <div class="card-body d-flex justify-content-between">
    <img src={{asset($entry->profilepic)}} alt={{$entry->username}} height = 100>
    
    <div class="w-100 d-flex justify-content-between">
      <div class="d-flex flex-column overflow-hidden">
        @if($entry->isadmin)
          <strong class = "text-primary">ADMINISTRATOR</strong>
        @elseif($entry->isbanned)
          <strong class = "text-danger">BANNED</strong>
        @endif

        <span class = "card-title">{{$entry->username}}</span>
        <span class = "card-subtitle">{{$entry->email}}</span>

      </div>

      <div class="d-flex flex-column">
        <form class = "m-1" method = "POST" action={{url('admin/users/delete/'.$entry->id)}}>
          @csrf
          @method('delete')

          <button class = "btn btn-outline-danger w-100" type = "submit">
            <i class="fa fa-times"></i>
            Delete
          </button>
        </form>
        
        <form class = "m-1" method = "POST" action={{url('admin/users/edit/'.$entry->id)}}>
          @csrf

          <button class = "btn btn-outline-primary w-100" type = "submit">
            <i class="fa fa-pencil-square-o"></i>
            Edit
          </button>
        </form>  
      </div>
    </div>
  </div>
</div>