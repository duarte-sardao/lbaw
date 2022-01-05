//!****************************** GLOBAL VARIABLES ******************************!\\

var editProfileButton;
var submitProfileButton;
var navbarProfileButton;
var navbarCartButton;

//!*********************************** EVENTS ***********************************!\\

window.onload = function(){
  getGlobalVariables();
  addEventListeners();
}

//!*************************** VARS AND EVENTS METHODS **************************!\\

function getGlobalVariables(){
  navbarProfileButton = document.getElementById("navbarProfileButton");
  navbarCartButton = document.getElementById("navbarCartButton");

  //editProfileButton = document.getElementById("editProfileButton");
  //submitProfileButton = document.getElementById("profileSubmitButton");
}

function addEventListeners(){
  navbarProfileButton.addEventListener("click", getProfilePageRequest);

  //editProfileButton.addEventListener("click", displayEditForm);
  //submitProfileButton.addEventListener("click", sendEditProfileRequest); 
}

//!*********************************** UMA COISA QUALQUER ***********************************!\\
function getProfilePageRequest(){
  let id = document.getElementById("userId");

  sendAjaxRequest('get', '/users/' + id.innerText, null, getProfilePageHandler);
}

function getProfilePageHandler(){
  if(this.status != 200){
    window.location = "/";
    alert("An error occurred when accessing your profile.");
  }
}



//!*********************************** EDIT PROFILE ***********************************!\\
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


//!******************************** HTML REQUEST ********************************!\\

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

//!*************************** LOGIN FORM ********************************!\\
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye / eye slash icon
  this.classList.toggle('bi-eye');
});

