<div class="aboutus-column">
  <div class="aboutus-card">
      <img id= "DeveloperPhoto" src="images/default.jpg" alt="Carlos">
      <div class="aboutus-container">
          <h2>{{$name}}</h2>
          <p class="aboutus-title">Developer</p>
          <p>{{$text}}</p>
          <p>{{$email}}</p>
          <button class = "btn btn-outline-primary w-50 m-2">
              <a class="w-50 m-2" href={{"mailto:".$email."?subject=Question about your website"}}> Contact me! </a>
          </button>
      </div>
  </div>
</div>