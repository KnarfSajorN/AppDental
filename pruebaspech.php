<script src="plugins/ArtyomK/artyom.window.js" ></script>

<script>
var artyom = new Artyom();
/*
artyom.initialize({
            lang:"es-ES",// Más lenguajes son soportados, lee la documentación
            continuous:1,// Reconoce 1 solo comando y basta de escuchar
            listen:true, // Iniciar !
            debug:true, // Muestra un informe en la consola
            speed:1 // Habla normalmente
        }).then(function(){
            console.log("Ready to work !");
        });

// Or add multiple commands at time
var myGroup = [
    {
        description:"Si mi base de datos contiene alguno del nombre dicho, hacer algo",
        smart:true, // Activar comando como un comando smart para poder usar comodines
        indexes:["Sabes quien es *","No se quien  *","Es * una buena persona"],
        // Ejecutar acción
        // i continene el indice que coincide con lo dicho en el array
        action:function(i,wildcard){
            var database = ["Carlos","Bruce","David","Joseph","Kenny"];

            //Si lo dicho, coincide con la tercera propiedad de los indices
            //es decir, "Es xxx una buena persona", haga X, de lo contrario Y
            if(i == 2){
                if(database.indexOf(wildcard.trim())){
                    artyom.say("Soy una máquina, nisiquiera se que es un sentimiento.");
                }else{
                    artyom.say("No se quien es " + wildcard + " y no se como demonios podría decir si es una buena persona o no.");
                }
            }else{
                if(database.indexOf(wildcard.trim())){
                    artyom.say("Por supuesto que se quien es "+ wildcard + ". Una muy buena persona a mi parecer.");
                }else{
                    artyom.say("Mi base de datos no es lo suficientemente amplia, no se quien es " + wildcard);
                }
            }
        }
    },
    {
        indexes:["Que hora es","Es muy tarde"],
        action:function(i){
            if(i == 0){
                UnaFuncionQueDiceElTiempo(new Date());
            }else if(i == 1){
                artyom.say("Nunca es tarde para hacer algo mi amigo!");
            }
        }
    }
];

artyom.addCommands(myGroup); 
*/
function startOneCommandArtyom(){
    //artyom.fatality();// use this to stop any of
    var artyom = new Artyom();

    var myGroup1 = [
    {
        description:"Si mi base de datos contiene alguno del nombre dicho, hacer algo",
        smart:true, // Activar comando como un comando smart para poder usar comodines
        indexes:["Sabes quien es *","No se quien  *","Es * una buena persona"],
        // Ejecutar acción
        // i continene el indice que coincide con lo dicho en el array
        action:function(i,wildcard){
            var database = ["Carlos","Bruce","David","Joseph","Kenny"];

            //Si lo dicho, coincide con la tercera propiedad de los indices
            //es decir, "Es xxx una buena persona", haga X, de lo contrario Y
            if(i == 2){
                if(database.indexOf(wildcard.trim())){
                    artyom.say("Soy una máquina, nisiquiera se que es un sentimiento.");
                }else{
                    artyom.say("No se quien es " + wildcard + " y no se como demonios podría decir si es una buena persona o no.");
                }
            }else{
                if(database.indexOf(wildcard.trim())){
                    artyom.say("Por supuesto que se quien es "+ wildcard + ". Una muy buena persona a mi parecer.");
                }else{
                    artyom.say("Mi base de datos no es lo suficientemente amplia, no se quien es " + wildcard);
                }
            }
        }
    },
    {
        indexes:["Campo motivo de consulta","Es muy tarde"],
        action:function(i){
            if(i == 0){
                BuscarCampoyHablar(i);
            }else if(i == 1){
                artyom.say("Nunca es tarde para hacer algo mi amigo!");
            }
        }
    }
];

function BuscarCampoyHablar(valor){

    var artyom = new Artyom();

        // Configurar reconocimiento de voz
        artyom.addCommands({
            indexes: ['*'], // Acepta cualquier palabra o frase
            smart: true,
            action: function(i, wildcard) {
                var textoReconocido = document.getElementById('texto-reconocido');
                textoReconocido.innerHTML = "<p>Texto reconocido: " + wildcard + "</p>";
            }
        });

        // Iniciar el reconocimiento de voz
        artyom.initialize({
            lang: "es-ES", // Idioma
            continuous: true, // Reconocimiento continuo
            listen: true, // Iniciar el reconocimiento

        });
        
}

        artyom.addCommands(myGroup1); 

    setTimeout(function(){// if you use artyom.fatality , wait 250 ms to initialize again.
         artyom.initialize({
            lang:"es-ES",// A lot of languages are supported. Read the docs !
            continuous:false,// recognize 1 command and stop listening !
            listen:true, // Start recognizing
            debug:true, // Show everything in the console
            speed:1 // talk normally
        }).then(function(){
            console.log("Ready to work !");
        });

        


    },250);



    
}
*/

</script>

<button onclick="startOneCommandArtyom()">Presione el boton</button>

<textarea id="textarea"></textarea>