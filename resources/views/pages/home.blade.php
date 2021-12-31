@extends('layouts.app')

@section('content')
  <section class = "d-flex flex-column m-5" id="content">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src = "{{asset('images/img1.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src = "{{asset('images/img2.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src = "{{asset('images/img3.jpg')}}" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </section>
@endsection