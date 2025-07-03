const AssistantName = localStorage.getItem("AssistantName");
var Assistant = new Artyom();

// -------------------------------------------------------
// buscar voces disponibles
// -------------------------------------------------------
let vocesDisponiblesNavegador = []; // Obtener todas las voces disponibles Google
let vocesDisponiblesAssistant = Object.keys(Assistant.ArtyomVoicesIdentifiers); // Obtener todas las voces disponibles del asistente
let AssistantIdiomasDetectados = {}; // Objeto para realizar un seguimiento de los idiomas detectados
window.speechSynthesis.onvoiceschanged = function () {
  vocesDisponiblesNavegador = window.speechSynthesis.getVoices();

  vocesDisponiblesAssistant.forEach((voiceAssistant) => {
    vocesDisponiblesNavegador.find((voice) => {
      if (
        voice.lang === voiceAssistant &&
        !AssistantIdiomasDetectados[voiceAssistant]
      ) {
        console.log(voiceAssistant);
        AssistantIdiomasDetectados[voiceAssistant] = true; // Marcar el idioma como detectado
      }
    });
  });
};
// -------------------------------------------------------

// Start the commands !
Assistant.initialize({
  lang: "es-ES", // GreatBritain english
  continuous: true, // Listen forever
  soundex: true, // Use the soundex algorithm to increase accuracy
  debug: true, // Show messages in the console
  listen: true, // Start to listen commands !
  // If providen, you can only trigger a command if you say its name
  // e.g to trigger Good Morning, you need to say "Assistant Good Morning"
  name: AssistantName,
})
  .then(() => {
    // console.log("Artyom has been succesfully initialized");
    Assistant.say("Bienvenido");
    // Assistant.say("cachápa cachápa cachápa y queso, cachápa y cochino frito");
  })
  .catch((err) => {
    // console.error("Artyom couldn't be initialized: ", err);
  });

Assistant.addCommands([
  {
    indexes: ["Clic en *"],
    smart: true,
    action: (i, wildcard) => {
      // buscar elemento con wildcard en el DOM y hacer click en él
      // en este caso, wildcard = 'Gallery'
      // hay que busar un elemento en la pantall auqe tenga la palabra 'Gallery' en el innerText y hacer click en él
      // Buscar el primer elemento con el texto "gallery"
      var elementoEncontrado = assistant_search_element(wildcard);

      // Si se encuentra el elemento, hacer algo con él (por ejemplo, imprimir su etiqueta)
      console.log(elementoEncontrado);
      if (elementoEncontrado !== null) {
        elementoEncontrado.click();
      } else {
        Assistant.say("No se encontró : " + wildcard);
      }
    },
  },
]);

// --------------------------------------------
// Funciones
// --------------------------------------------
// variable con elementos reconocibles en el DOM
// estos son cualquier a, input, button, etc
// on load
document.addEventListener("DOMContentLoaded", function () {
  let reconocibles = document.getElementsByTagName("*");
  for (let i = 0; i < reconocibles.length; i++) {
    // si es un a, input, button, etc
    if (
      reconocibles[i].tagName === "A" ||
      reconocibles[i].tagName === "INPUT" ||
      reconocibles[i].tagName === "BUTTON"
    ) {
      // agregar data-artyom a los elementos
      reconocibles[i].setAttribute("data-artyom", "true");
    }
  }
});

function assistant_search_element(textoInicial) {
  // si textoinicial termina en . quitarlo
  if (textoInicial.endsWith(".")) {
    textoInicial = textoInicial.substring(0, textoInicial.length - 1);
  }
  // Buscar el primer elemento con el texto
  var elementos = document.querySelectorAll("[data-artyom]");
  for (var i = 0; i < elementos.length; i++) {
    console.log(
      elementos[i].innerText.toLowerCase(),
      textoInicial.toLowerCase()
    );
    if (elementos[i].innerText.toLowerCase() === textoInicial.toLowerCase()) {
      return elementos[i];
    }
  }
  // Si no se encuentra ningún elemento con el texto, devolver null
  return null;
}
