<script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            /*var fecha_prep = new Date();
                                                            var year = fecha_prep.getFullYear();
                                                            var month = String(fecha_prep.getMonth() + 1).padStart(2, '0');
                                                            var day = String(fecha_prep.getDate()).padStart(2, '0');

                                                            var formattedDate = `${year}-${month}-${day}`;
                                                            document.getElementsByName('x93183715287')[0].value = formattedDate;*/
                                                        });


                                                        // Definir la función obtenerValores
                                                        function obtenerValores() {
                                                            var campos = ["x4496208179", "x30271305433", "x76800219895", "x51320433291", "x23387018549", "x46054596461", "x18193008127"];
                                                            var contador = 0; // Variable para almacenar el contador

                                                            campos.forEach(function(nombreCampo) {
                                                                var campo = document.getElementsByName(nombreCampo)[0];
                                                                var valorSeleccionado = $(campo).val(); // Obtener el valor seleccionado con Select2

                                                                if (valorSeleccionado.includes("0 Puntos,")) {
                                                                    contador += 0; // Sumar 0 al contador
                                                                } else if (valorSeleccionado.includes("1 Punto,")) {
                                                                    contador += 1; // Sumar 1 al contador
                                                                } else if (valorSeleccionado.includes("2 Puntos,")) {
                                                                    contador += 2; // Sumar 1 al contador
                                                                } else if (valorSeleccionado.includes("3 Puntos,")) {
                                                                    contador += 3; // Sumar 1 al contador
                                                                }

                                                                // Mostrar el contador actualizado
                                                                //console.log(`Contador = ${contador}`);
                                                            });

                                                            var r = contador;
                                                            document.getElementsByName("x53033926042")[0].value = r;


                                                            if (r.toFixed(2) < 6) {
                                                                ComposicionCorporal = 'Ausencia';
                                                            } else if (r.toFixed(2) >= 6 & r.toFixed(2) <= 14) {

                                                                ComposicionCorporal = 'Leve';
                                                            } else if (r.toFixed(2) >= 15 & r.toFixed(2) <= 25) {

                                                                ComposicionCorporal = 'Moderado';
                                                            } else if (r.toFixed(2) >= 26 & r.toFixed(2) <= 39) {

                                                                ComposicionCorporal = 'Alto';
                                                            } else if (r.toFixed(2) >= 40) {

                                                                ComposicionCorporal = 'Muy Alto';
                                                            }





                                                            document.getElementsByName("x66131721653")[0].value = ComposicionCorporal;

                                                        }

                                                        // Esperar a que el DOM esté completamente cargado
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            var campos = ["x4496208179", "x30271305433", "x76800219895", "x51320433291", "x23387018549", "x46054596461", "x18193008127"];

                                                            // Inicializar Select2 en los campos
                                                            campos.forEach(function(nombreCampo) {
                                                                var campo = document.getElementsByName(nombreCampo)[0];
                                                                $(campo).select2();

                                                                // Agregar el evento de cambio de Select2
                                                                $(campo).on('select2:select', function() {
                                                                    obtenerValores(); // Llamar a la función para recalcular los valores
                                                                });
                                                            });
                                                        });
                                                    </script>