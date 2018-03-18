//This will check the current time and will display topText acc to that
var d = new Date();
var n = d.getHours();
var tT = document.querySelector(".topText");

if(n>=4 && n<9)
{
    tT.style.background = "red";
    tT.textContent = "Sorry our services are unavailable at this moment. Please try after 9 AM. Thank you for your patience."
}