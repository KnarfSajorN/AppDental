

<script>



  function AgregarAperturaCaja(usuario_id,pos) {
    
    $.ajax({
      type: "POST",
      url: "Ajax_IncludeCaja.php",
      data: {
        pos: pos,
        usuario_id: usuario_id,
        Tipo_Consulta: "Consultar Apertura Caja"
      },
      success: function(response) {
        var Respuesta = JSON.parse(response);

        if(Respuesta.Estado == "Inactivo"){

            var informacionPOS = document.getElementById('InformacionPOS');
            if (informacionPOS) {
                informacionPOS.style.display = 'none';
            }else{
                window.location.reload();
            }

            Swal.fire({
            title: 'Apertura de Caja',
            html: '<label for="precio_swal">Monto Apertura de Caja</label><br>' +
                  '<input id="precio_swal"  type="number" class="input-lg form-control" placeholder="10" style="width:100%;" step="0.01" value="0">' ,
                
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Descartar',
            focusConfirm: false,
            customClass: {
                    confirmButton: 'btn btn-outline-info rounded-pill shadow',
                    cancelButton: 'btn btn-outline-danger rounded-pill shadow'
                },
            preConfirm: () => {
                const precio_swal1 = Swal.getPopup().querySelector('#precio_swal').value;

                if (precio_swal1=="") {
                Swal.showValidationMessage(`Completa todos los campos`);
                }
                return {
                precio_swal: precio_swal1,
                }
            },
            }).then((result) => {
            if (result.isConfirmed) {
                //console.log(result.value.precio_swal);
                
                $.ajax({
                type: "POST",
                url: "Ajax_IncludeCaja.php",
                data: {
                    Precio:result.value.precio_swal,
                    usuario_id: usuario_id,
                    pos: pos,
                    Tipo_Consulta: "Agregar Apertura Caja"
                },
                success: function(response) {
                    //console.log(response);
                    var Respuesta1 = JSON.parse(response);

                    if(Respuesta1.Estado == "Creado"){
                        Swal.fire(
                            'Se Creo la Apertura de Caja!',
                        )
                        var informacionPOS = document.getElementById('InformacionPOS');
                        if (informacionPOS) {
                            informacionPOS.style.display = 'block';
                        }

                    }else if(Respuesta1.Estado == "Error"){
                        Swal.fire(
                            'Error al Agregar la Apertura de Caja!',
                        )
                        window.location.reload();
                    }
                    
                }
                });
                
            }
            })


        }
        

      }
    });



  }


  $(document).ready(function() {
           
    AgregarAperturaCaja(<?=$UsuarioAperturaCaja;?>,<?=$POSAperturaCaja;?>)

    });

</script>
