<div class="card m4-2 mb-4">
  <div class="card-body">

    {{-- @php(dd($entry)) --}}
    <div class="d-flex justify-content-between">
      <div>
        @for($i = 0; $i < $entry['content']->rating; $i++)
            <i class="fa fa-star checked text-success"></i>
          @endfor
          
          @for($i = $entry['content']->rating; $i < 5; $i++)
            <i class="fa fa-star-o text-success"></i>
          @endfor
          <span> 
            posted by 
            <strong class = "text-danger">
              {{ $entry['user']->username }}
            </strong> 
          </span>
      </div>

      <div class = "d-flex align-items-center">
        <span class = "m-1">Was this review helpful?</span>
        <form class = "m-1" method = "POST" action={{url('reviews/upvote/'.$entry['content']->id)}}>
          @csrf
  
          <button class = "btn btn-outline-success" type = "submit">
            <i class="fa fa-arrow-up"></i>
            {{$entry['content']->yesvotes}}
          </button>
        </form>
        
        <form class = "m-1" method = "POST" action={{url('reviews/downvote/'.$entry['content']->id)}}>
          @csrf
  
          <button class = "btn btn-outline-danger" type = "submit">
            <i class="fa fa-arrow-down"></i>
            {{$entry['content']->novotes}}
          </button>
          
        </form>
      </div>
    </div>
        

      

    <div class="">
      {{$entry['content']->text}}
    </div>
    
    {{-- <i class="fa fa-arrow-up"></i> --}}
    {{-- <i class="fa-arrow-down>"></i> --}}
    {{-- <i class="fa fa-exclamation-triangle"></i> --}}
    
  </div>
</div>