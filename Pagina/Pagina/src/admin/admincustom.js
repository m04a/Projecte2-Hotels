document.getElementById("crearhabitacio").onclick = function() {crearhabitacio()};
document.getElementById("esborrartipus").onclick = function() {esborrartipus()};

function crearhabitacio() {
  document.getElementById("div-esborrarhabitacio").style.display = 'none';
  document.getElementById("div-crearhabitacio").style.display = 'block';

}
function esborrartipus() {
  document.getElementById("div-crearhabitacio").style.display = 'none';
  document.getElementById("div-esborrarhabitacio").style.display = 'block';
}