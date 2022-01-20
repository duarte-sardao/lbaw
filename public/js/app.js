//!****************************** GLOBAL VARIABLES ******************************!\\

var editProfileButton;
var priceRange = document.querySelector("input[name = 'price']");
var ratingRange = document.querySelector("input[name = 'rating']");
var filterForm;

//!*********************************** EVENTS ***********************************!\\

window.onload = function(){
  getGlobalVariables();
  addEventListeners();
}

//!*************************** VARS AND EVENTS METHODS **************************!\\

function getGlobalVariables(){
  editProfileButton = document.getElementById("editProfileButton");
  /* priceRange = document.querySelector("input[name = 'price']");
  ratingRange = document.querySelector("input[name = 'rating']"); */
  filterForm = document.getElementById("filter");

  console.log(priceRange.value);
  console.log(ratingRange.value);
}

function addEventListeners(){
  editProfileButton.addEventListener("click", displayEditForm);
}

//!************************************** FILTERS *************************************!\\

priceRange.onmousemove = function(){
  let span = document.querySelector(".col-md.form-group span#priceSpan");
  span.innerText = priceRange.value + "€";
}

ratingRange.onmousemove = function(){
  let span = document.querySelector(".col-md.form-group span#ratingSpan")
  span.innerText = ratingRange.value;
}

//!*********************************** EDIT PROFILE ***********************************!\\
function displayEditForm(){
  const form = document.getElementById("profile-form");
  const inputs = form.getElementsByTagName("input");

  for(let i = 0 ; i < inputs.length; i++){
    inputs[i].removeAttribute("disabled");
  }

  editProfileButton.hidden = true;

  const submitProfileButton = document.getElementById("profileSubmitButton");
  const uploadPhotoInput = document.getElementById("uploadPhotoInput");
  const profileDeleteButton = document.getElementById("profileDeleteButton");
  
  submitProfileButton.hidden = false;
  uploadPhotoInput.hidden = false;
  profileDeleteButton.hidden = false;
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

