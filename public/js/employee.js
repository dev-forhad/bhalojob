// ############################## wmployee registation page ###########################

const employeeResSetp1 = document.getElementById("em-res-step-one");

const employeeResSetp2 = document.getElementById("em-res-step-two");
const employeeResSetp3 = document.getElementById("em-res-step-three");

// hundling show funvtion
const showEmplyeeResOne = () => {
  document.getElementById("employee-res-pointer1").style.backgroundColor =
    "#d71921";
  document.getElementById("employee-res-pointer1").style.color = "white";
  document.getElementById("employee-res-pointer2").style.backgroundColor =
    "#aeaeae";
  document.getElementById("employee-res-pointer2").style.color = "black";

  document.getElementById("employee-res-pointer3").style.backgroundColor =
    "#aeaeae";
  document.getElementById("employee-res-pointer3").style.color = "black";

  employeeResSetp2.style.display = "none";
  employeeResSetp1.style.display = "block";
  employeeResSetp3.style.display = "none";
};

const showEmplyeeResTwo = () => {
  document.getElementById("employee-res-pointer2").style.backgroundColor =
    "#d71921";
  document.getElementById("employee-res-pointer2").style.color = "white";
  document.getElementById("employee-res-pointer1").style.backgroundColor =
    "#aeaeae";
  document.getElementById("employee-res-pointer1").style.color = "black";

  document.getElementById("employee-res-pointer3").style.backgroundColor =
    "#aeaeae";
  document.getElementById("employee-res-pointer3").style.color = "black";

  employeeResSetp1.style.display = "none";
  employeeResSetp2.style.display = "block";
  employeeResSetp3.style.display = "none";
};

const showEmplyeeResThree = () => {
  document.getElementById("employee-res-pointer3").style.backgroundColor =
    "#d71921";
  document.getElementById("employee-res-pointer3").style.color = "white";
  document.getElementById("employee-res-pointer1").style.backgroundColor =
    "#aeaeae";
  document.getElementById("employee-res-pointer1").style.color = "black";

  document.getElementById("employee-res-pointer2").style.backgroundColor =
    "#aeaeae";
  document.getElementById("employee-res-pointer2").style.color = "black";

  employeeResSetp1.style.display = "none";
  employeeResSetp3.style.display = "block";
  employeeResSetp2.style.display = "none";
};

// hundle next visible

document
  .getElementById("employeeResOne")
  .addEventListener("click", showEmplyeeResTwo);

document
  .getElementById("employeeRestwo")
  .addEventListener("click", showEmplyeeResThree);

document
  .getElementById("preemployeeRestwo")
  .addEventListener("click", showEmplyeeResOne);

document
  .getElementById("preemployeeResthree")
  .addEventListener("click", showEmplyeeResTwo);

// image uploader hundler
const uploadImage = () => {
  document.getElementById("filePicker").click();
};

function prevwprofile() {
  const uploadedImg = document.getElementById("uploadedImg");
  const file = document.getElementById("filePicker").files[0];
  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", () => {
      uploadedImg.src = reader.result;
    });
    reader.readAsDataURL(file);
  } else {
    uploadedImg.src = "";
  }
}
