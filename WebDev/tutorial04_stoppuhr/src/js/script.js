$(function() {
  registerClock();
  setTime();
});

function registerClock() {
  setInterval(updateClock, 250);
}

function updateClock() {
  setTime();
  setStopWatch();
}

var currentdate;
function setTime() {
  currentdate = new Date(); 
  
  var datetime = + currentdate.getDate() + "."
                + (currentdate.getMonth()+1)  + "." 
                + currentdate.getFullYear() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
  $("#time").text(datetime);
}

var stopWatchRunning = false;
var startTime;
$("#startstop").click(function() {
  if (stopWatchRunning == false) {
    startTime = new Date();
    stopWatchRunning = true;
  } else {
    stopWatchRunning = false;
  }
});

function setStopWatch() {
  if (stopWatchRunning == false) {
    return;
  }
  var duration = new Date(currentdate - startTime);
  var showDuration = duration.getHours()-1 + ":"  
                + duration.getMinutes() + ":" 
                + duration.getSeconds();
  $("#tracker").text(showDuration);
}


