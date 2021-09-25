<title>YouTube Radio</title>

<div onclick="init(this)" class="barrier d-flex justify-content-center align-items-center h-100 w-100 fixed-top">
  <span class="material-icons" style="font-size:9em">play_circle_outline</span>
</div>

<div id="player"></div>

<div id="controls-container" class="controls-container row fixed-bottom mx-3">
  <div class="col-8 col-sm-6 col-md-4 d-sm-block d-none mb-4">
    <button id="channel-name" class="btn knob btn-float btn-light c-round" type="button">1. ChilledCow - Study</button>
  </div>
  <div class="col-5 col-sm-6 col-md-4 d-flex justify-content-center align-items-center mb-4">
    <div class="d-flex justify-content-center align-items-center button-container shadow w-100">
      <button onclick="navigate(-1)" class="btn btn-float btn-light shadow-none" type="button"><span class="material-icons">skip_previous</span></button>
      <input id="player-volume" oninput="player.setVolume(this.value)" type="range" value="100" class="form-control-range d-none d-sm-block mx-2">
      <button id="player-channel" class="btn btn-float btn-light shadow-none d-block d-sm-none" type="button">1</button>
      <button onclick="navigate(1)" class="btn btn-float btn-light shadow-none" type="button"><span class="material-icons">skip_next</span></button>
    </div>
  </div>
  <div class="col-4 d-none d-md-flex mb-4">
    <!-- We would have PiP if cors didn't exist ¯\_(ツ)_/¯ -->
    <!-- <button onclick="doPiP()" class="btn knob btn-float btn-light c-round ml-auto" type="button"><span class="material-icons">picture_in_picture_alt</span></button> -->
    <button onclick="toggleZoom()" class="btn knob btn-float btn-light c-round ml-auto" type="button"><span class="material-icons">crop_free</span></button>
    <button onclick="toggleScreen()" class="btn knob btn-float btn-light c-round ml-2" type="button"><span class="material-icons">open_in_full</span></button>
  </div>
</div>