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

// var btnRecherche = document.getElementById('searchbutton');
// var recherche = document.getElementById('recherchemult');

// btnRecherche.addEventListener('click', openSearch);

// function openSearch() {
//     recherche.style.display = "block";
// }