var btnPopupmessagerie = document.getElementById('btnLola');
var popupmessagerie = document.getElementById('popupmessage');
var  btnClosemessagerie = document.getElementById('btnClosemess');

btnPopupmessagerie.addEventListener('click',openModal);

function openModal() {
    overlay4.style.display = 'block';
}

btnClosemessagerie.addEventListener('click', closeModal);

function closeModal() {
    overlay4.style.display = "none";
}
