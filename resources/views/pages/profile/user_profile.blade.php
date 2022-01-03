@extends('layouts.app')

@section('content')
  <!-- Breadcrumbs -->
  <nav class = "m-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item" aria-current="page">{{$user->username}}</li>
    </ol>
  </nav>

  <section class="d-flex justify-content-around">
    <!-- Side panel -->
    @if(Auth::user()->id >= 5)
      @include('partials.profile.sidebar') 

    @else
      @include('partials.admin.sidebar')

    @endif

    <!-- User Information -->
    @include('partials.profile.user_data', ['user' => $user])

    <!-- User photo -->
    @include('partials.profile.user_photo', ['user' => $user])
  </section>
@endsection