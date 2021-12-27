
function addEventListeners() {
  const editProfileButton = document.getElementById("editProfileButton");
  editProfileButton.addEventListener("click", displayEditForm);

  const submitProfileButton = form.getElementById("profileSubmitButton");
  submitProfileButton.addEventListener("click", sendEditProfileRequest); 
}

function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
  let request = new XMLHttpRequest();

  request.open(method, url, true);
  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.addEventListener('load', handler);
  request.send(encodeForAjax(data));
}

function displayEditForm(){
  const form = document.getElementById("profile-form");
  const inputs = form.getElementsByTagName("input");
  const submitProfileButton = form.getElementById("profileSubmitButton");

  for(let i = 0 ; i < inputs.length; i++){
    inputs[i].removeAttribute("disabled");
  }

  submitProfileButton.removeAttribute("hidden");
}

function sendEditProfileRequest(){
  let id = document.getElementById("userId").innerHTML;

  const data = {
    'username' : document.getElementById("email").innerHTML,
    'password' : document.getElementById("password").innerHTML,
    'email' : document.getElementById("email").innerHTML,
    'phone' : document.getElementById("phone").innerHTML,
  };

  sendAjaxRequest('put', '/customers/' + id + '/edit', data, profileEditedHandler);
}

function profileEditedHandler(){
  if(this.status != 200){
    window.location = "/home";
    alert("An error occurred when editing your profile.");
  }
}

addEventListeners();
