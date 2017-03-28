function fusion() {
var r = confirm("Voulez-vous réellement fusionner les images !");
if (r == true) {
    if (imgtag.src !== imgtagsrc_initial) // on n'envoie que si une image a ete prise
    {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../images_fusion.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                window.location.pathname = 'camagru/app/src/views/main_camagru.php';
            }
        };
        var params = 'image='+imgtag.src+'&image_incrustee='+decorPng.src;
        console.log(params);
        xhr.send(params);
        setTimeout(function(){
            window.location.reload();
         },
          5000);
    }
    else {
        alert("veuillez prendre la photo dans/de votre tronche");
    }
  }
}
