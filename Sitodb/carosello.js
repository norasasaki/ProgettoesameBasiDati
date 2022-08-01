function funzioneAvanti () {
  try {
    if (slide_attuale < (nodi_slide.length-1)) {
      nodi_slide[slide_attuale].classList.add("no");
      slide_attuale++;
      nodi_slide[slide_attuale].classList.remove("no");

    }
  } catch (e) {
    alert("funzioneAvanti" + e);
  }
}
function funzioneIndietro () {
  try {
    if (slide_attuale != 0) {
      nodi_slide[slide_attuale].classList.add("no");
      slide_attuale--;
      nodi_slide[slide_attuale].classList.remove("no");
    }
  } catch (e) {
    alert ("funzioneIndietro" + e)
  }
}

//carosello piccolo
function funzioneAvanti1 () {
  try {
    if (slideattualeB < (nodi_slide1.length-2) || slideattualeC < (nodi_slide1.length-3)) {
      nodi_slide1[slideattualeB].classList.add("no");
	  nodi_slide1[slideattualeC].classList.add("no");
      slideattualeB += 2;
	  slideattualeC += 2 ;
      nodi_slide1[slideattualeB].classList.remove("no");
	  nodi_slide1[slideattualeC].classList.remove("no");

    }
  } catch (e) {
    alert("funzioneAvanti" + e);
  }
}
function funzioneIndietro1 () {
  try {
    if (slideattualeB != 0 || slideattualeC != 1) {
      nodi_slide1[slideattualeB].classList.add("no");
	  nodi_slide1[slideattualeC].classList.add("no");
      slideattualeB -= 2;
	  slideattualeC -= 2;
      nodi_slide1[slideattualeB].classList.remove("no");
	  nodi_slide1[slideattualeC].classList.remove("no");
    }
  } catch (e) {
    alert ("funzioneIndietro" + e)
  }
}

var slide_attuale;
var slide_attualeB;
var nodi_slide = new Array;
var nodi_slide1 = new Array;

function gestoreLoad () {
 try {
	nodi_slide[0] = document.getElementById("0");
    nodi_slide[1] = document.getElementById("1");
    nodi_slide[2] = document.getElementById("2");
    nodi_slide[3] = document.getElementById("3");
    nodi_slide[4] = document.getElementById("4");
	
    nodi_slide1[0] = document.getElementById("5");
	nodi_slide1[1] = document.getElementById("6");
    nodi_slide1[2] = document.getElementById("7");
    nodi_slide1[3] = document.getElementById("8");
    nodi_slide1[4] = document.getElementById("9");
	nodi_slide1[5] = document.getElementById("10");
	
	nodoPrev = document.getElementById("prev");
	nodoNext = document.getElementById("next");
	nodoPrev1 = document.getElementById("prev1");
	nodoNext1 = document.getElementById("next1");
	slide_attuale = 0;
	if (nodoNext != null && nodoPrev != null) {
		nodoPrev.onclick = funzioneIndietro;
		nodoNext.onclick = funzioneAvanti;
	}
	slideattualeB = 0;
	slideattualeC = 1;
	if (nodoNext1 != null && nodoPrev1 != null) {
		nodoPrev1.onclick = funzioneIndietro1;
		nodoNext1.onclick = funzioneAvanti1;
	}
 } catch ( e ) {
 alert("gestoreLoad " + e);
 }
}
window.onload = gestoreLoad;