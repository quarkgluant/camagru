<td  class="main">
      <div>
        <hr class="n2"/>
        <h2 id="demo">Démonstration</h2>
        <pre id="preLog">Chargement…</pre>
        <p><video id="video" autoplay="autoplay"></video></p>
        <p><input type="button" id="buttonSnap" value="Prendre une photo" disabled="disabled" onclick="snapshot()" /></p>
        <p>
        <input type="button" id="buttonStart" value="Démarrer" disabled="disabled" onclick="start()" />
        <input type="button" id="buttonStop" value="Arrêter" disabled="disabled" onclick="stop()" />
        </p>
        <p><canvas id="canvas"></canvas></p>

          <script type="text/javascript">//<![CDATA[
        "use strict";
        var video = document.getElementById('video');
        var canvas = document.getElementById('canvas');
        var videoStream = null;
        var preLog = document.getElementById('preLog');

        function log(text)
        {
        	if (preLog) preLog.textContent += ('\n' + text);
        	else alert(text);
        }

        function snapshot()
        {
        	canvas.width = video.videoWidth;
        	canvas.height = video.videoHeight;
        	canvas.getContext('2d').drawImage(video, 0, 0);
        }

        function noStream()
        {
        	log('L’accès à la caméra a été refusé !');
        }

        function stop()
        {
        	var myButton = document.getElementById('buttonStop');
        	if (myButton) myButton.disabled = true;
        	myButton = document.getElementById('buttonSnap');
        	if (myButton) myButton.disabled = true;
        	if (videoStream)
        	{
        		if (videoStream.stop) videoStream.stop();
        		else if (videoStream.msStop) videoStream.msStop();
        		videoStream.onended = null;
        		videoStream = null;
        	}
        	if (video)
        	{
        		video.onerror = null;
        		video.pause();
        		if (video.mozSrcObject)
        			video.mozSrcObject = null;
        		video.src = "";
        	}
        	myButton = document.getElementById('buttonStart');
        	if (myButton) myButton.disabled = false;
        }

        function gotStream(stream)
        {
        	var myButton = document.getElementById('buttonStart');
        	if (myButton) myButton.disabled = true;
        	videoStream = stream;
        	log('Flux vidéo reçu.');
        	video.onerror = function ()
        	{
        		log('video.onerror');
        		if (video) stop();
        	};
        	stream.onended = noStream;
        	if (window.webkitURL) video.src = window.webkitURL.createObjectURL(stream);
        	else if (video.mozSrcObject !== undefined)
        	{//FF18a
        		video.mozSrcObject = stream;
        		video.play();
        	}
        	else if (navigator.mozGetUserMedia)
        	{//FF16a, 17a
        		video.src = stream;
        		video.play();
        	}
        	else if (window.URL) video.src = window.URL.createObjectURL(stream);
        	else video.src = stream;
        	myButton = document.getElementById('buttonSnap');
        	if (myButton) myButton.disabled = false;
        	myButton = document.getElementById('buttonStop');
        	if (myButton) myButton.disabled = false;
        }

        function start()
        {
        	if ((typeof window === 'undefined') || (typeof navigator === 'undefined')) log('Cette page requiert un navigateur Web avec les objets window.* et navigator.* !');
        	else if (!(video && canvas)) log('Erreur de contexte HTML !');
        	else
        	{
        		log('Demande d’accès au flux vidéo…');
        		if (navigator.getUserMedia) navigator.getUserMedia({video:true}, gotStream, noStream);
        		else if (navigator.oGetUserMedia) navigator.oGetUserMedia({video:true}, gotStream, noStream);
        		else if (navigator.mozGetUserMedia) navigator.mozGetUserMedia({video:true}, gotStream, noStream);
        		else if (navigator.webkitGetUserMedia) navigator.webkitGetUserMedia({video:true}, gotStream, noStream);
        		else if (navigator.msGetUserMedia) navigator.msGetUserMedia({video:true, audio:false}, gotStream, noStream);
        		else log('getUserMedia() n’est pas disponible depuis votre navigateur !');
        	}
        }

        start();
//]]></script>
</div>
</td>
