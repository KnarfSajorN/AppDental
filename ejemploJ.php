<?php  ?>
<!-- <div id="file"></div> -->
<input type="file" id="file">

<script>
File.load = function (file_url) {
    return fetch(file_url).then(res => res.blob());
};

function load(fileName) {
  File.load(fileName).then(function (blob) {
    var reader = new FileReader();

    reader.onload = function (e) {
      console.log(e);
      document.getElementById('file').value = e.target.result;
    };

    reader.readAsText(blob);
  });  
}

load('historiaClinica2_img.png');
</script>

