// get step box and buttons
const step1 = document.getElementById("step-one");
const step2 = document.getElementById("step-two");
const step3 = document.getElementById("step-three");
const step4 = document.getElementById("step-four");
const step5 = document.getElementById("step-five");
const step6 = document.getElementById("step-six");
const step7 = document.getElementById("step-seven");
const step8 = document.getElementById("step-eight");
const step9 = document.getElementById("step-nine");

console.log(step1);
const showStep2 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#d71921";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 2;
  step1.style.display = "none";
  step2.style.display = "block";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep1 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#d71921";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 1;
  step1.style.display = "block";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep3 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#d71921";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 3;
  step3.style.display = "block";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep4 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#d71921";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 4;
  step3.style.display = "none";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "block";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep5 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#d71921";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 5;
  step3.style.display = "none";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "block";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep6 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#d71921";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 6;
  step3.style.display = "none";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "block";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep7 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#d71921";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 7;
  step3.style.display = "none";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "block";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep8 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#d71921";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 8;
  step3.style.display = "none";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "block";
  step9.style.display = "none";
};

const showStep9 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#d71921";
  document.getElementById("counter-text").innerHTML = 9;
  step3.style.display = "none";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "block";
};

// step 1
document.getElementById("step1next").addEventListener("click", showStep2);
// step 2
document.getElementById("step2pre").addEventListener("click", showStep1);
document.getElementById("step2next").addEventListener("click", showStep3);

// step 3
document.getElementById("step3pre").addEventListener("click", showStep2);
document.getElementById("step3next").addEventListener("click", showStep4);

// step 4
document.getElementById("step4pre").addEventListener("click", showStep3);
document.getElementById("step4next").addEventListener("click", showStep5);

// step 5
document.getElementById("step5pre").addEventListener("click", showStep4);
document.getElementById("step5next").addEventListener("click", showStep6);

// step 6
document.getElementById("step6pre").addEventListener("click", showStep5);
document.getElementById("step6next").addEventListener("click", showStep7);

// step 7
document.getElementById("step7pre").addEventListener("click", showStep6);
document.getElementById("step7next").addEventListener("click", showStep8);

// step 8
document.getElementById("step8pre").addEventListener("click", showStep7);
document.getElementById("step8next").addEventListener("click", showStep9);

// step 8
document.getElementById("step9pre").addEventListener("click", showStep8);

// certification label hundler
const certificationsBoxToggler = () => {
  const certificationsbox = document.getElementById("certifications-box");
  if (certificationsbox.style.display === "block") {
    certificationsbox.style.display = "none";
  } else {
    certificationsbox.style.display = "block";
  }
};
document
  .getElementById("certifications-box-toggler")
  .addEventListener("click", certificationsBoxToggler);

// ############################## wmployee registation page ###########################

// const employeeResSetp1 = document.getElementById("em-res-step-one");
// const employeeResSetp2 = document.getElementById("em-res-step-two");
// const employeeResSetp3 = document.getElementById("em-res-step-three");

// // hundling show funvtion
// const showEmplyeeResOne = () => {
//   document.getElementById("employee-res-pointer1").style.backgroundColor =
//     "#d71921";
//   document.getElementById("employee-res-pointer1").style.color = "white";
//   document.getElementById("employee-res-pointer2").style.backgroundColor =
//     "#aeaeae";
//   document.getElementById("employee-res-pointer2").style.color = "black";

//   document.getElementById("employee-res-pointer3").style.backgroundColor =
//     "#aeaeae";
//   document.getElementById("employee-res-pointer3").style.color = "black";

//   employeeResSetp2.style.display = "none";
//   employeeResSetp1.style.display = "block";
//   employeeResSetp3.style.display = "none";
// };

// const showEmplyeeResTwo = () => {
//   document.getElementById("employee-res-pointer2").style.backgroundColor =
//     "#d71921";
//   document.getElementById("employee-res-pointer2").style.color = "white";
//   document.getElementById("employee-res-pointer1").style.backgroundColor =
//     "#aeaeae";
//   document.getElementById("employee-res-pointer1").style.color = "black";

//   document.getElementById("employee-res-pointer3").style.backgroundColor =
//     "#aeaeae";
//   document.getElementById("employee-res-pointer3").style.color = "black";

//   employeeResSetp1.style.display = "none";
//   employeeResSetp2.style.display = "block";
//   employeeResSetp3.style.display = "none";
// };

// const showEmplyeeResThree = () => {
//   document.getElementById("employee-res-pointer3").style.backgroundColor =
//     "#d71921";
//   document.getElementById("employee-res-pointer3").style.color = "white";
//   document.getElementById("employee-res-pointer1").style.backgroundColor =
//     "#aeaeae";
//   document.getElementById("employee-res-pointer1").style.color = "black";

//   document.getElementById("employee-res-pointer2").style.backgroundColor =
//     "#aeaeae";
//   document.getElementById("employee-res-pointer2").style.color = "black";

//   employeeResSetp1.style.display = "none";
//   employeeResSetp3.style.display = "block";
//   employeeResSetp2.style.display = "none";
// };

// // hundle next visible

// document
//   .getElementById("employeeResOne")
//   .addEventListener("click", showEmplyeeResTwo);

// document
//   .getElementById("employeeRestwo")
//   .addEventListener("click", showEmplyeeResThree);

// document
//   .getElementById("preemployeeRestwo")
//   .addEventListener("click", showEmplyeeResOne);

// document
//   .getElementById("preemployeeResthree")
//   .addEventListener("click", showEmplyeeResTwo);
