<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <title>    </title>

    <style>
    #info {
    font-size: 20px;
    }
    #headline {
    text-decoration: none
    }
    #results {
    font-size: 14px;
    font-weight: bold;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    min-height: 150px;
    }
    #start_button {
    border: 0;
    background-color:transparent;
    padding: 0;
    }
    .interim {
    color: gray;
    }
    .final {
    color: black;
    padding-right: 3px;
    }
    .marquee {
    margin: 20px auto;
    }

    #buttons {
    margin: 10px 0;
    position: relative;
    top: -50px;
    }

    #copy {
    margin-top: 20px;
    }

    #copy > div {
    display: none;
    margin: 0 70px;
    }
    </style>
  </head>

  <body>
    <div class="browser-landing" id="main">
      <div class="compact marquee-stacked" id="marquee">
        <div class="marquee-copy">
          <h1>
           
          </h1>
        </div>
      </div>

      <div class="compact marquee">
        <div id="info">
          <p id="info_start">
           Haga clic en el botón Iniciar / detener y comience a hablar.
          </p>
          <p id="info_speak_now" style="display:none">
           Habla ahora.
          </p>
          <p id="info_no_speech" style="display:none">
         No se detectó el habla. Es posible que deba ajustar su <a href=
            "//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">micrófono
             </a>.
          </p>
          <p id="info_no_microphone" style="display:none">
            No se encontró micrófono. Asegúrese de que haya un micrófono instalado y que
            <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
            micrófono  </a> están configurados correctamente
          </p>
          <p id="info_allow" style="display:none">
Haga clic en el botón "Permitir" arriba para habilitar su micrófono.           </p>
          <p id="info_denied" style="display:none">
Se denegó el permiso para usar el micrófono.          </p>
          <p id="info_blocked" style="display:none">
            El permiso para usar el micrófono está bloqueado. Para cambiar, ve a
            chrome://settings/contentExceptions#media-stream
          </p>
          <p id="info_upgrade" style="display:none">
           No es compatible con este navegador. Utilizar <a href=
            "//www.google.com/chrome">Chrome</a>versión 25 o posterior.
          </p>
        </div>
        <div id="div_start">
          <button id="start_button" onclick="startButton(event)">Iniciar / detener</button>
        </div>
        <div id="results">
          <span class="final" id="final_span"></span> 
          <span class="interim" id="interim_span"></span>
        </div>
 
        <div class="compact marquee" id="div_language">
          <select hidden  id="select_language" onchange="updateCountry()">
            </select>&nbsp;&nbsp; <select hidden id="select_dialect">
            </select>
        </div>

 

      </div>
    </div>
  

<script>
"use strict";

/*
 * Simple program to demo speech recognition
 *
 * Based on https://www.google.com/intl/en/chrome/demos/speech.html
 *
 * Must run on a remote server, and access via https not http.
 * Works on only Chrome
 */

/*
 * Choose your language


 */
var langs =
[['English',         ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Filipino',        ['fil-PH']],
 ['Français',        ['fr-FR']],
 ['Basa Jawa',       ['jv-ID']],
 ['Galego',          ['gl-ES']],
 ['ગુજરાતી',           ['gu-IN']],
 ['Hrvatski',        ['hr-HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['ಕನ್ನಡ',             ['kn-IN']],
 ['ភាសាខ្មែរ',          ['km-KH']],
 ['Latviešu',        ['lv-LV']],
 ['Lietuvių',        ['lt-LT']],
 ['മലയാളം',          ['ml-IN']],
 ['मराठी',             ['mr-IN']],
 ['Magyar',          ['hu-HU']],
 ['ລາວ',              ['lo-LA']],
 ['Nederlands',      ['nl-NL']],
 ['नेपाली भाषा',        ['ne-NP']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['සිංහල',          ['si-LK']],
 ['Slovenščina',     ['sl-SI']],
 ['Basa Sunda',      ['su-ID']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Kiswahili',       ['sw-TZ', 'Tanzania'],
                     ['sw-KE', 'Kenya']],
 ['ქართული',       ['ka-GE']],
 ['Հայերեն',          ['hy-AM']],
 ['தமிழ்',            ['ta-IN', 'இந்தியா'],
                     ['ta-SG', 'சிங்கப்பூர்'],
                     ['ta-LK', 'இலங்கை'],
                     ['ta-MY', 'மலேசியா']],
 ['తెలుగు',           ['te-IN']],
 ['Tiếng Việt',      ['vi-VN']],
 ['Türkçe',          ['tr-TR']],
 ['اُردُو',            ['ur-PK', 'پاکستان'],
                     ['ur-IN', 'بھارت']],
 ['Ελληνικά',         ['el-GR']],
 ['български',         ['bg-BG']],
 ['Pусский',          ['ru-RU']],
 ['Српски',           ['sr-RS']],
 ['Українська',        ['uk-UA']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['हिन्दी',             ['hi-IN']],
 ['ภาษาไทย',         ['th-TH']]];

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 1;
updateCountry();
select_dialect.selectedIndex = 3;
showInfo('info_start');

function updateCountry() {
  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
    select_dialect.remove(i);
  }
  var list = langs[select_language.selectedIndex];
  for (var i = 1; i < list.length; i++) {
    select_dialect.options.add(new Option(list[i][1], list[i][0]));
  }
  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

/*
 * Set up recognizer
 */
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
if (!('webkitSpeechRecognition' in window)) { 
  upgrade(); 
} else {
  start_button.style.display = 'inline-block';
  var recognition = new webkitSpeechRecognition(); 
  recognition.continuous = true; 
  recognition.interimResults = true; 

  recognition.onstart = function() { 
    recognizing = true; 
    showInfo('info_speak_now'); 
  };

  // Things that can go wrong
  recognition.onerror = function(event) { 
    if (event.error == 'no-speech') { 
      showInfo('info_no_speech'); 
      ignore_onend = true;
    }
    if (event.error == 'audio-capture') {
      showInfo('info_no_microphone');
      ignore_onend = true;
    }
    if (event.error == 'not-allowed') {
      if (event.timeStamp - start_timestamp < 100) {
        showInfo('info_blocked');
      } else {
        showInfo('info_denied');
      }
      ignore_onend = true;
    }
  };

  recognition.onend = function() { 
    recognizing = false;
    if (ignore_onend) {
      return;
    }
    if (!final_transcript) {
      showInfo('info_start');
      return;
    }
    showInfo('');
    if (window.getSelection) {
      window.getSelection().removeAllRanges();
      var range = document.createRange();
      range.selectNode(document.getElementById('final_span'));
      window.getSelection().addRange(range);
    }

    // Display or otherwise utilize result
    doit (final_transcript); 
  };

  recognition.onresult = function(event) { 
    var interim_transcript = '';
    if (typeof(event.results) == 'undefined') {
      recognition.onend = null;
      recognition.stop();
      upgrade();
      return;
    }

    // event.results is an array of the recognized strings
    for (var i = event.resultIndex; i < event.results.length; ++i) { 
      if (event.results[i].isFinal) { 
        final_transcript += event.results[i][0].transcript; 
      } else { 
        interim_transcript += event.results[i][0].transcript; 
      }
    }

    final_span.innerHTML = linebreak(final_transcript); 
    interim_span.innerHTML = linebreak(interim_transcript);
  };
}

// User message about browser
function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}

// Convert line breaks to HTML
var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

function startButton(event) {
  // Stop
  if (recognizing) {
    recognition.stop();
  }

  // Start
  else {
    final_transcript = '';
    recognition.lang = select_dialect.value;
    recognition.start();
    ignore_onend = false;
    final_span.innerHTML = '';
    interim_span.innerHTML = '';
    showInfo('info_allow');
    start_timestamp = event.timeStamp;
  }
}

// Display selected message, hide others
function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}

/*
 ***************************************************************************
 * Voice drawing program, just an example of usage of above code
 ***************************************************************************
 */

// "Roy G Biv" colors only
var colors = ["red", "orange", "yellow", "green", "blue", "indigo", "violet"] 

// Limited set of shapes
var shapes = ["square", "rectangle", "circle", "ellipse"]

function doit (string) { 
	/*
	 * Example of something you could do with the recognized text
	 */

	string = string.toLowerCase()

	// Search for a color, else we choose black
	var color = colors.filter ( 
		function (c) { 
			return string.match (new RegExp ("\\b" + c + "\\b")) 
		}) [0] 

	// Search for a shape, else we don't draw
	var shape = shapes.filter ( 
		function (s) { 
			return string.match (new RegExp ("\\b" + s + "\\b")) 
		}) [0] 

	// If found a shape, draw it
	if (shape) { 
		var canvas = document.getElementById ("MyCanvas");
		var gc = canvas.getContext ("2d")
		gc.fillStyle = color? color: "black" 
		
		// Generate some random coordinates
		var x = 50 + Math.floor (400 * Math.random ())
		var y = 50 + Math.floor (400 * Math.random ())
		var w = 20 + Math.floor (100 * Math.random ())
		var h = 20 + Math.floor (100 * Math.random ())

		if (shape=="square") { 
			gc.fillRect (x, y, w, w) 
		}
		else if (shape=="rectangle") { 
			gc.fillRect (x, y, w, h) 
		}
		else if (shape=="circle") { 
			gc.beginPath(); 
			gc.arc (x, y, w/2, 0, Math.PI * 2); 
			gc.fill(); 
		}
		else if (shape=="ellipse") { 
			gc.beginPath(); 
			gc.ellipse (x, y, w/2, h/2, 0, 0, Math.PI * 2); 
			gc.fill(); 
		}
	}

	// For testing, display the understood message (2 words)
	console.log ("Color = " + color + ", Shape = " + shape)
}

    </script>
  </body>
</html>
