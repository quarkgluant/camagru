var video = document.querySelector("#videoElement");

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

if (navigator.getUserMedia) {
    navigator.getUserMedia({video: true}, handleVideo, videoError);
}

function handleVideo(stream) {
    video.src = window.URL.createObjectURL(stream);
}

function videoError(e) {
    // no webcam found - do something
}
var v,canvas,context,w,h;
var imgtag = document.getElementById('imgtag');
var imgtagsrc_initial = imgtag.src;
var sel = document.getElementById('fileselect');

document.addEventListener('DOMContentLoaded', function(){
        v = document.getElementById('videoElement');
    canvas = document.getElementById('canvas');
    context = canvas.getContext('2d');
    w = canvas.width;
    h = canvas.height;

},false);

function draw(v,c,w,h) {

    if(v.paused || v.ended) return false;

    context.drawImage(v,0,0,w,h);
   var uri = canvas.toDataURL("image/png");
   imgtag.src = uri;
}

document.getElementById('save').addEventListener('click',function(e){
        draw(v,context,w,h);
});

var fr;

sel.addEventListener('change',function(e){
    var f = sel.files[0];
    fr = new FileReader();
    fr.onload = receivedData;
    fr.readAsDataURL(f);
})

function receivedData() {
      imgtag.src = fr.result;
}
