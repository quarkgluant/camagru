function fusion() {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../images_fusion.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        window.location.pathname = 'http://localhost:8080/base/app/src/views/main_camagru.php';
            }
        };
  var params = 'image='+imgtag2.src+'&image_incrustee='+imgtag4.src;
  console.log(params);
  xhr.send(params)
}
