var player
var player_document = document.documentElement;
var tag = document.createElement('script')
var index = 0
var firstScriptTag = document.getElementsByTagName('script')[0]
tag.src = "https://www.youtube.com/iframe_api"
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag)

function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    videoId: '5qap5aO4i9A',
    playerVars: {'autoplay':'1','controls':'0','autohide':'0','playsinline':'1','showinfo':'0','modestbranding':'1'},
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

function onPlayerReady(event) {
  player.playVideo()
}
function onPlayerStateChange(event) {

}
function playVideo() {
  player.playVideo()
}
function stopVideo() {
  player.stopVideo()
}

const radio_array = [
  { name: 'ChilledCow - Study',
    url: '5qap5aO4i9A',
  },
  { name: 'ChilledCow - Sleep',
    url: 'DWcJFNfaw9c',
  },
  { name: 'CHILL RADIO',
    url: '21qNxnCS8WU',
  },
  { name: 'STEEZYASFUCK',
    url: '-5KAN9_CzSA',
  },
  { name: 'Trap Nation Radio',
    url: 'v3jpVUOi9XU',
  },
  { name: 'Monstercat Silk',
    url: 'd8Oc90QevaI',
  },
  { name: 'Tomorrowland',
    url: 'DY_rFed96mg',
  },
  { name: 'Spinnin\' Radio',
    url: 'I83XWCSBgSc',
  },
  { name: 'Revealed Music',
    url: 'LDJ-LsCDpLM',
  },
  { name: 'Deep House Radio',
    url: 'T52rBA2wh74',
  },
  { name: 'Dance Radio',
    url: 'YSBO7Zl8mU4',
  },
  { name: 'NCS Arcade',
    url: '7tNtU5XFwrU',
  },
  { name: 'Sound Cloudx',
    url: '6H8f1fa_bJQ',
  },
  { name: 'Radio 1',
    url: 'gnyW6uaUgk4',
  },
  { name: 'Radio 90s',
    url: 'CyPqFllXb9s',
  },
  { name: 'Matthew Chávez R&B',
    url: 'L9Q1HUdUMp0',
  },
  { name: 'Matthew Chávez Rap',
    url: '30br7pFoWsc',
  },
  { name: 'UPROXX Music',
    url: '05689ErDUdM',
  },
  { name: 'The Good Life',
    url: '36YnV9STBqc',
  },
  { name: 'Monstafluff Music',
    url: 'LYOrjkdbMDQ',
  },
  { name: 'KozyPop K-Pop',
    url: 'RFHj_vjVxqM',
  },
  { name: 'KozyPop Lofi',
    url: 'lcYJhHqotIQ',
  },
  { name: 'The K-POP',
    url: 'F4aby5WN1Rw',
  },
  { name: 'RazNitzanMusic',
    url: 'WYetg3AuLE4',
  },
  { name: 'Queen Deep - Ibiza',
    url: 'XatJAXQUqX0',
  },
  { name: 'Above & Beyond',
    url: 'IvuwTft-0cM',
  },
  { name: 'NightmareOwl Music',
    url: '5vgw9F5CZRQ',
  },
  { name: 'Nightride FM',
    url: 'kgBcg4uBd9Q',
  },
  { name: 'Dark Monkey Music',
    url: 'GP1XYuTMbqc',
  },
  { name: 'Aim To Head',
    url: '58KjFEZQ8Dw',
  },
  { name: 'Pill Of Trance',
    url: '4ihJ_mA8Fsk',
  },
  { name: 'NINTENDO RADIO',
    url: 'SSwvkfK-sJU',
  },
  { name: 'frequenzy',
    url: '5X18D-EbjUc',
  },
  { name: 'Danheim - Live Viking Music',
    url: 'rHL0IvpUnTY',
  },
  { name: 'Jazz Piano Radio',
    url: 'Dx5qFachd3A',
  },
];

function navigate(my_int) {
  var temp_index = index + my_int
  if (typeof radio_array[temp_index] === 'undefined') {
    if (temp_index>radio_array.length-1) {
      radioSet(radio_array[0], 1)
      index = 0
    } else {
      radioSet(radio_array[radio_array.length-1], radio_array.length)
      index = radio_array.length-1
    }
  } else {
    radioSet(radio_array[temp_index], temp_index+1)
    index = temp_index
  }
}

function radioSet(channel, number) {
  document.getElementById("channel-name").innerHTML = number + ". " + channel['name']
  document.getElementById("player-channel").innerHTML = number
  player.loadVideoById(channel['url'])
}


function toggleZoom() {
  var container = document.getElementById('controls-container')
  var frame = document.getElementById('player')
  if (frame.classList.contains("zoomed")) {
    frame.classList.remove("zoomed")
    container.classList.remove("opac")
  } else {
    frame.classList.add("zoomed")
    container.classList.add("opac")
  }
}

function init(elem) {
  elem.style.cursor = "default"
  elem.innerHTML = ""
  playVideo()
}

function openFullscreen() {
  if (player_document.requestFullscreen) {
    player_document.requestFullscreen();
  } else if (player_document.webkitRequestFullscreen) {
    player_document.webkitRequestFullscreen();
  } else if (player_document.msRequestFullscreen) {
    player_document.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}

function toggleScreen() {
  if (document.fullscreenElement) {
    closeFullscreen()
  } else {
    openFullscreen()
  }
}

function doPiP() {
  document.getElementById('player').contentWindow.document.getElementsByClassName("html5-main-video")[0].requestPictureInPicture()
}