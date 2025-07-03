<?php
include("funciones/funciones.php");

?>
<style type="text/css">
    html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
    }
 
    #full-screen-background-image {
        z-index: -999;
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
    }
</style>

<body>
    <img alt="full screen background image" src="https://www.esan.edu.pe/conexion/bloggers/2017/10/11/1500x844_medicos.jpg" id="full-screen-background-image" /> 

    <table class="tg">
  <tr>
    <th>
<?php
$sala = $_GET['sala'];

?> 
  
<iframe src="https://tokbox.com/embed/embed/ot-embed.js?embedId=23cd172a-f4a0-4080-8a14-f701f2dcbc4a&room=<?php echo $sala?>&iframe=true" width="800px" height="640px" scrolling="auto" allow="microphone; camera" >
    
</iframe>



      </th>
    <th>  </th>
  </tr>
</table>
</body>