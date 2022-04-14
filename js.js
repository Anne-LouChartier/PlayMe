var header = document.querySelector('header');

var btnPopupinscription = document.getElementById('inscription');
var btnPopupconnexion = document.getElementById('connexion');
var popupinscription = document.getElementById('popupinscription');
var popupconnexion = document.getElementById('popupconnexion');
var  btnCloseinscription = document.getElementById('btnClose');
var btnCloseconnexion = document.getElementById('btnClose2');

btnPopupinscription.addEventListener('click',openModal);

function openModal() {
    overlay.style.display = 'block';
}
// openModal();
btnPopupconnexion.addEventListener('click',openModal2);

function openModal2() {
    overlay2.style.display = 'block';
}
// openModal2();
btnCloseconnexion.addEventListener('click', closeModal);

function closeModal() {
    overlay2.style.display = "none";
}

btnCloseinscription.addEventListener('click', closeModal2);

function closeModal2() {
    overlay.style.display = "none";
}

var musique = document.getElementById('audioPlayer');
var btnPlay = document.getElementById('logoplay');
var musique2 = document.getElementById('audioPlayer2');
var btnNext = document.getElementById('next');
var btnPrevious = document.getElementById('previous');

btnPlay.addEventListener('click', myFunction);

function myFunction() {
    musique.play();
}

header.addEventListener('click', myFunction2);

function myFunction2() {
    musique.pause();
}

btnNext.addEventListener('click', myFunction3);

function myFunction3() {
    musique.pause();
    musique2.play();
}

btnPrevious.addEventListener('click', myFunction4);

function myFunction4() {
    musique2.pause();
    musique.play();
}