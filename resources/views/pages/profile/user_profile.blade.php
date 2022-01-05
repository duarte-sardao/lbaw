@extends('layouts.app')

@section('content')
  <!-- Breadcrumbs -->
  <nav class = "m-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item" aria-current="page">{{$user->username}}</li>
    </ol>
  </nav>

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