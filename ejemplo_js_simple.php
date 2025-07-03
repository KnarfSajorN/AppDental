



              <div class="form-group col-md-2">
                
                <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" onChange="multiplicar();" required>
              </div>


              <div class="form-group col-md-2">
                
                <input type="number" class="form-control input-lg" id="2" name="cantidad" placeholder="cantidad" onChange="multiplicar();" required>
              </div>



<!--
              <div class="form-group col-md-2">
                <input type="number" class="form-control input-lg" id="2" name="base" placeholder="precio" onChange="multiplicar();" required>
              </div>
-->


              <div class="form-group col-md-2">
                <input type="number" class="form-control input-lg" id="3" name="subTotal" placeholder="subTotal" required>
              </div>




<script type="text/javascript">
     
function multiplicar(){
  m1 = document.getElementById("1").value;
  m2 = document.getElementById("2").value;
  var r =parseInt(m1) + parseInt(m2);


  

  document.getElementById("3").value = r;
}
</script>