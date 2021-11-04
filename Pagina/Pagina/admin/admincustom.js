function borraruser(usuari){
    var res = confirm('Estas segur que vols el usuari ' + usuari + '?' );
    if (res){
        // if user clicked ok,
        // pass the id to delete.php and execute the delete query
        window.location = 'borraruser.php?usuari=' + usuari;
    }
}
document.getElementById("crearhabitacio").onclick = function() {crearhabitacio()};
document.getElementById("crearusuari").onclick = function() {crearusuari()};

function crearhabitacio() {
  document.getElementById("div-crearhabitacio").style.display = 'block';
  document.getElementById("div-crearusuari").style.display = 'none';

}
function crearusuari() {
  document.getElementById("div-crearhabitacio").style.display = 'none';
  document.getElementById("div-crearusuari").style.display = 'block';
}

// confirm record deletion
function esborrar(idtipo){
    var answer = confirm('Estas segur que vols esborrar el tipus numero ' + idtipo + '?' );
    if (answer){
        // if user clicked ok,
        // pass the id to delete.php and execute the delete query
        window.location = 'esborrar.php?idtipo=' + idtipo;
    }
}
