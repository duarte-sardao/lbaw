<div class="card m4-2 mb-4">
  <div class="card-body d-flex flex-column">
    
    <h6 class="card-title">Address {{$number}}</h6>
    <span>
      {{
        $entry->streetname.' '
        .$entry->streetnumber.' '
        .$entry->aptnumber.' '
        .$entry->floor
      }}
    </span>

    <span>
      {{$entry->zipcode}}
    </span>
  </div>
</div>