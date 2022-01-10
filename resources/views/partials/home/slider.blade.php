<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    @include('partials.home.slider_active_entry', [
      'name' => 'Gigabyte Radeon RX 6900 XT',
      'text' => 'Lorem ipsum dolor sit amet',
      'img' => 'images/img1.jpg',
      'link' => 'products/18'
      ])

    @include('partials.home.slider_entry', [
      'name' => 'ASRock TRX40 Taichi',
      'text' => 'Lorem ipsum dolor sit amet',
      'img' => 'images/img2.jpg',
      'link' => 'products/28'
      ])

    @include('partials.home.slider_entry', [
      'name' => 'AMD Ryzen Threadripper 3990X',
      'text' => 'Lorem ipsum dolor sit amet',
      'img' => 'images/img3.jpg',
      'link' => 'products/6'
      ])
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>