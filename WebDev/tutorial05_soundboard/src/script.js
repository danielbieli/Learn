function main() {
  //Hauptfunktion
  console.log("Hallo Welt! Ich bin das Soundboard!");
  var button = document.getElementById('btn_horn');
  button.addEventListener('click', hornClick, false);
  
  var button = document.getElementById('btn_klatschen');
  button.addEventListener('click', klatschenClick, false);
  
  var button = document.getElementById('btn_tusch');
  button.addEventListener('click', tuschClick, false);
  
  document.addEventListener('keydown', keyDown, false);
  
}

function keyDown(evt) {
  //wenn Taste 1
  if (evt.key=="1") {
    hornClick();
  } else if (evt.key=="2") {
    //wenn Taste 2
    klatschenClick();
  } else if (evt.key=="3") {
    //wenn Taste 3
    tuschClick();
  }
  
}

function hornClick() {
  playAudio('horn');
}

function klatschenClick() {
  playAudio('klatschen');
}

function tuschClick() {
  playAudio('tusch');
}

function playAudio(audioId) {
  console.log("play Audio: " + audioId);
  var audio = document.getElementById(audioId);
  audio.addEventListener('ended', function () { hideIcon(audioId); } , false);
  console.log("Audio:" + audio.src);
  if (audio.paused == true) {
    audio.play();     
    document.getElementById('icon_'+audioId).hidden = false;
    //icon anzeigen
  } else {
    audio.load();
    document.getElementById('icon_'+audioId).hidden = true;
    //icon ausblenden
  }
}

function hideIcon(audioId) {
  document.getElementById('icon_'+audioId).hidden = true;
}
