function changeImage() {
  document.getElementById("profile_image").style.borderRadius = "0px";
}

function changeImageBack() {
  document.getElementById("profile_image").style.borderRadius = "50%";
}

function hideEmail() {
  if (document.getElementById("hideEmail").checked) {
    document.getElementById("email").style.visibility = "hidden";
  } else {
    document.getElementById("email").style.visibility = "";
  }
  localStorage.setItem("email", document.getElementById("hideEmail").checked);
}

function hidePhone() {
  if (document.getElementById("hidePhone").checked) {
    document.getElementById("phone").style.visibility = "hidden";
  } else {
    document.getElementById("phone").style.visibility = "";
  }
  localStorage.setItem("phone", document.getElementById("hidePhone").checked);
}

if (localStorage.getItem("phone") != undefined) {
  if (localStorage.getItem("phone")) {
    document.getElementById("hidePhone").checked = true;
    document.getElementById("phone").style.visibility = "hidden";
  } else {
    document.getElementById("hidePhone").checked = false;
    document.getElementById("phone").style.visibility = "";
  }
}

if (localStorage.getItem("email") != undefined) {
  if (localStorage.getItem("email")) {
    document.getElementById("hideEmail").checked = true;
    document.getElementById("email").style.visibility = "hidden";
  } else {
    document.getElementById("hideEmail").checked = false;
    document.getElementById("email").style.visibility = "";
  }
}

document.querySelector("#hideEmail").addEventListener("change", hideEmail);
document.querySelector("#hidePhone").addEventListener("change", hidePhone);
document
  .querySelector("#profile_image")
  .addEventListener("mousemove", changeImage);
document
  .querySelector("#profile_image")
  .addEventListener("mouseout", changeImageBack);
