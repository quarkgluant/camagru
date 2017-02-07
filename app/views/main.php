<td  class="main">
  <form>
    <table style="border:solid 1px black; border-radius:5px; text-align:left; box-shadow:0 0 10px;">
      <tr>
        <td>
          <div>
          <input type="button" value="Click photo !" id="save" />
          <b><- Prenez une photo ! -><b/>
          </div>

      </td>
       <td>

      </td>
    </tr>
      <tr>
        <td>
      <div>
      </br>
        <canvas id="canvas" width="500" height="375"></canvas>
            </div>

        </div>
      </td>
       <td>
         <div id="container">
             <video autoplay id="videoElement">
             </video>
      </td>

    </tr>
    <tr>
    <td>
      <div>
        <input id="fileselect" type="file" accept="image/*" capture="camera">
                <b><- Ou choisissez une image ! -><b/>
          </div>
        </td>
        <td>
         <div id="container2">
        <img id="imgtag" src="" width="500" height="375" alt="capture d'image" style="position:absolute;z-index:1;"/>
        <img id="imgtag2" src="" width="500" height="375" style="position:absolute;z-index:2;"/>
        </div>
    </td>
</tr>
</table>
<input type="reset">
</form>
</td>
