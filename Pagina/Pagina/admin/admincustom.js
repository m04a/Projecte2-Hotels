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
function esborrar(numhab){
    var answer = confirm('Estas segur que vols la habitació numero ' + numhab + '?' );
    if (answer){
        // if user clicked ok,
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?numhab=' + numhab;
    }
}
