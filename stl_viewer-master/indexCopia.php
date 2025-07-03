<?php

// include '../funciones/conn3.php';
// include '../funciones/funciones.php';

$idarchivo = $_GET['archivo'];
$idcarpeta = $_GET['carpeta'];

$server='localhost';
$user='medicaso_rootBase';
$pass='5qA?o]t6d-h25qA?o]t6d-h2';
$dbname='medicaso_dev_baseGeneral';
$conn3 = mysqli_connect($server,$user,$pass,$dbname)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


$queryCarpetas = mysqli_query($conn3, "SELECT * FROM STL_Carpetas WHERE ID='$idcarpeta' ");                                        
foreach ($queryCarpetas as $tablaCarpetas) {
    $desCarpeta = $tablaCarpetas['descripcion'];
    $IDCarpeta = $tablaCarpetas['ID'];
    
}

$queryArchivos = mysqli_query($conn3, "SELECT * FROM STL_Archivos WHERE ID='$idarchivo'");
foreach ($queryArchivos as $tablaArchivosSTL) {
$nombre_archivo = $tablaArchivosSTL['nombre_archivo'];
$descripcion = $tablaArchivosSTL['descripcion'];
$ID = $tablaArchivosSTL['ID'];
}



$carpeta = $desCarpeta;
$archivo = $nombre_archivo;


$url = '../STL_Carpetas/' . $carpeta . '/'. $archivo;




?>
<html>
<head>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #000;
    color: #fff;
    user-select: none;
}
#cont {
    width: 800px;
    margin: auto;
}
#inpt {
    display: none;
}
#entry {
    text-align: center;
    text-decoration: underline;
    background-color: #fff;
    color: #000;
    font-size: 48px;
    padding: 5px;
    border: 1px solid #fff;
}
#entry:hover {
    cursor: pointer;
    background-color: #000;
    color: #fff;
}
#disp {
    display: none;
    font-family: monospace;
    font-size: 18px;
}
#cnvs {
    float: left;
    cursor: -webkit-grabbing;
}
#settings {
    height: 100%;
}
input[type='range'] {
    display: block;
    margin: auto;
}
#sliders {
    text-align: center;
}
</style>
<script src='https://git.io/zengine.js'></script>
</head>
<body>
<div id='cont'>
    <h style='font-size: 64; text-align: center;'>STL Visor</h>
    
    
    
    
 <!--
<p>This webapp allows you to view any stl file directly in the broswer, client-side. All the code was written by me and can be found over on <a href='https://github.com/joeiddon/stl_viewer'>GitHub</a>. Feel free to have a look - it's ownly about 200 lines long.</p>   
    <p>For the 3D rendering, I am using my 3D JavaScript engine - <a href='https://github.com/joeiddon/zengine'>zengine.js</a>. It is not as efficient as other libraries, but I wrote it entirely by myself and so I know exactly how it works and what is going on. However due to this, <b>large <i>.stl</i> files are slow to render.</b></p>
    <p>Click the button below to load in your file.</p>
    <br><br>
 -->    
    
    
    
    
    <label for='inpt' id='entry'>Subir archivo <i>.stl</i></label>
    <a href="<?php echo $url ?>" style="color:white">Abrir</a>
    <input id='inpt' type='file' accept='.stl'></input>
</div>
<div id='disp'>
    <canvas id='cnvs'></canvas>
    <div id='settings'>
        <h style='font-size: 20px;text-align:middle;'>options</h>
        <br><br>
        <input id='wrfrm' type='checkbox' onchange='wireframe=this.checked; update();' checked></input>
        <label for='wrfrm'>Visor</label>
        <br><br>
        <div id='sliders'>
            <label for='dst'>Distancia</label>
            <br>
            <input id='dst' type='range' min='0' value='128' max='400' oninput='cam.y=-this.value;update();'></input>
            <br>
            <a id='dwnld_a'>Descarga</input>
        </div>
    </div>
    

</div>
<script>
    'use strict';

/*
written to parse according to:
https://en.m.wikipedia.org/wiki/STL_(file_format)
---
assumes unit vectors are included and not (0,0,0)
^
i.e. that needs fixing
---
also, could use requestAnimationFrame instead of
updating on each mouse movement :/
*/

let cont =     document.getElementById('cont');
let inpt =     document.getElementById('inpt');
let disp =     document.getElementById('disp');
let cnvs =     document.getElementById('cnvs');
let settings = document.getElementById('settings');
let dst =      document.getElementById('dst');
let dwnld_a =  document.getElementById('dwnld_a');

let world = [];
let wireframe = false;
let cam = {x: 0, y: -128, z: 0, yaw: 0, pitch: 0, roll: 0, fov: 60};
let mm_damp = 256;
let ms_damp = 20;
//width of settings div
let set_w = 400;

let inputs = document.getElementsByTagName('input');
for (var i = 0; i < inputs.length; i++){
    if (inputs[i].type == 'range'){
        inputs[i].style.width = set_w / 2;
    }
}

inpt.addEventListener('change', function (e){
    let r = new FileReader();
    r.onload = function(){
        parse_stl(this.result);
        generate_file();
        center_world();
        disp.style.display = 'block';
        cont.style.display = 'none';
        resize();
        update();
        window.addEventListener('resize', resize);
        cnvs.addEventListener('mousedown', md);
        cnvs.addEventListener('mousewheel', ms);
    }
    r.readAsArrayBuffer(e.target.files[0]);
});

function parse_stl(f){
    let b_arr = new Uint8Array(f);
    let s = '';
    for (let i = 0; i < 5; i++){
        s += String.fromCharCode(b_arr[i]);
    }
    if (s == 'solid'){
        parse_ascii(f);
    } else {
        parse_bin(f);
    }
}

function update(){
    zengine.render(world, cam, cnvs, wireframe);
}

function center_world(){
    let center = {x: 0, y: 0, z: 0}
    for (let f = 0; f < world.length; f++){
        let c = zengine.centroid(world[f].verts);
        center.x += c.x;
        center.y += c.y;
        center.z += c.z;
    }
    center.x /= world.length;
    center.y /= world.length;
    center.z /= world.length;
    world = world.map(f=>({verts: f.verts.map(zengine.translate(-center.x, -center.y, -center.z)),
                           vect: f.vect,
                           col: f.col}));
}

function parse_ascii(f){
    let b_arr = new Uint8Array(f);
    let ascii = '';
    for (let i = 0; i < b_arr.length; i++){
        ascii += String.fromCharCode(b_arr[i]);
    }
    let re = /-?[0-9]+\.?[0-9]*(e-?[0-9]+\.?[0-9]*)?/g;
    let nums = ascii.match(re);
    for (let f = 0; f < nums.length; f += 12){
        let vect = {x: parseFloat(nums[f]),
                    y: parseFloat(nums[f+1]),
                    z: parseFloat(nums[f+2])};
        let verts = [];
        for (let i = 3; i < 12; i +=3){
            verts.push({x: parseFloat(nums[f+i]),
                        y: parseFloat(nums[f+i+1]),
                        z: parseFloat(nums[f+i+2])});
        }
        world.push({verts: verts, vect: vect, col: {h:0, s:0, l:100}});
    }
}

function parse_bin(f){
    let dv = new DataView(f);
    let pointer = 80;
    let no_faces = dv.getUint32(pointer, true);
    pointer += 4;
    for (let f = 0; f < no_faces; f++){
        let vect = {x: dv.getFloat32(pointer,   true),
                    y: dv.getFloat32(pointer+4, true),
                    z: dv.getFloat32(pointer+8, true)};
        pointer += 12; //as 3 * 4 byte ints (32 bit)
        let verts = [];
        for (let v = 0; v < 3; v++){
            verts.push({x: dv.getFloat32(pointer,   true),
                        y: dv.getFloat32(pointer+4, true),
                        z: dv.getFloat32(pointer+8, true)});
            pointer += 12;
        }
        world.push({verts: verts, vect: vect, col: {h:0, s:0, l:100}});
        let atbc = dv.getUint16(pointer, true);
        if (atbc != 0) throw Error('attribute byte count not 0');
        pointer += 2;
    }
}

/*  mouse events  */
function md(e){
    cnvs.style.cursor = '-webkit-grabbing';
    document.body.addEventListener('mouseup', mu);
    document.body.addEventListener('mousemove', mm);
    cnvs.removeEventListener('mousedown', md);
}

function mu(){
    cnvs.style.cursor = '-webkit-grab';
    document.body.removeEventListener('mousemove', mm);
    cnvs.addEventListener('mousedown', md);
    document.body.removeEventListener('mouseup', mu);
}

function mm(e){
    var dx = e.movementX / mm_damp;
    var dy = e.movementY / mm_damp;
    world = world.map(f=>({verts: f.verts.map(zengine.z_axis_rotate(dx))
                                         .map(zengine.x_axis_rotate(dy * -1)),
                           vect: zengine.x_axis_rotate(dy * -1)(
                                 zengine.z_axis_rotate(dx)(f.vect)),
                           col: f.col}));
    update();
}

function ms(e){
    cam.y += e.deltaY / ms_damp;
    dst.value = -cam.y;
    update();
}

function resize(){
    cnvs.width = innerWidth - set_w;
    cnvs.height = innerHeight;
    update();
}

function generate_file(){
    dwnld_a.download = inpt.files[0].name.replace('.stl','.json');
    dwnld_a.href = URL.createObjectURL(new Blob([JSON.stringify(world)], {type: 'text/json'}));
}




</script>

<script>
        // Espera a que la página se haya cargado completamente
        document.addEventListener('DOMContentLoaded', function() {
            // Especifica la URL o ruta del archivo STL que deseas cargar
            var archivoSTLURL = '<?php echo $url ?>';  // Reemplaza con la ruta y nombre de tu archivo STL

            //alert(archivoSTLURL);


            // Selecciona el elemento input file
            var inputSTL = document.getElementById('inpt');

            // Crea un objeto File con la URL del archivo STL
            var archivoSTL = new File([archivoSTLURL], '<?php echo $archivo ?>', { type: 'model/stl' });
            // Crea un objeto FileList que contiene el archivo STL
            var fileList = new DataTransfer();
            fileList.items.add(archivoSTL);

            console.log(fileList);

            // Establece el valor del input file con el objeto FileList
            
            inputSTL.files = fileList.files;
            }, 1000);

</script>




</body>
</html>
