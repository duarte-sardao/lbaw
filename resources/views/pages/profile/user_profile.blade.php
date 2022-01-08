@extends('layouts.app')

@section('content')
  <span id = "userId" hidden>{{$user->id}}</span>
  
  <section class="container-fluid d-flex justify-content-around">
    <div class="row w-100">
      <!-- Side panel -->
      @if(Auth::user()->id >= 5)
        @include('partials.profile.sidebar') 
  
      @else
        @include('partials.admin.sidebar')
  
      @endif
  
      <!-- User Data -->
      @include($content, ['user' => $user, 'entries' => $entries])
    </div>
  </section>
@endsection