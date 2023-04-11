function hideSections() {
  var a = document.getElementById("appform");
  if (a.style.display === "none") {
  a.style.display = "block";
  } 
  else {
  a.style.display = "none";
  }

  var x = document.getElementById("jobApp");
  if (x.style.display === "block") {
    x.style.display = "none";
  } 
}

function hideJob() {
  var x = document.getElementById("jobApp");
    if (x.style.display === "none") {
    x.style.display = "block";
    } 
    else {
    x.style.display = "none";
    }

  var a = document.getElementById("appform");
    if (a.style.display === "block") {
      a.style.display = "none";
  } 
}

