<form class = "card border-primary mt-4" method = "POST" action = "">
  <h4 class="card-title  m-2">
    Write your review!
  </h4>
  <div class="form-group m-2">
    <label class = "" for="rating"><strong>Rating</strong></label>
    <select class="form-control" id="rating">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  <div class="form-group m-2">
    <label class = "" for="coment"><strong>Your review</strong></label>
    <textarea class="form-control" id="coment" rows="3"></textarea>
  </div>

  <div class="form-group m-2">
    <button class="btn btn-outline-success" type = "submit">Submit</button>
  </div>
</form>