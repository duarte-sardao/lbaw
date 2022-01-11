@extends('layouts.app')

@section('content')
  <section class="d-flex justify-content-around m-5">
    <span id = "userId" hidden>{{$user->id}}</span>
    <div class="row w-100">
      <!-- Side panel -->
      @if(!Auth::user()->isadmin)
        @include('partials.profile.sidebar') 
  
      @else
        @include('partials.admin.sidebar')
  
      @endif
  
      <!-- User Data -->
      @include($content, ['user' => $user, 'entries' => $entries, 'errors' => $errors])
    </div>
  </section>
@endsection