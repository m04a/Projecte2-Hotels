document.getElementById("crearhabitacio").onclick = function() {crearhabitacio()};
document.getElementById("crearusuari").onclick = function() {esborrartipus()};

function crearhabitacio() {
  document.getElementById("div-esborrarhabitacio").style.display = 'none';
  document.getElementById("div-crearusuari").style.display = 'block';

}
function esborrartipus() {
  document.getElementById("div-crearhabitacio").style.display = 'none';
  document.getElementById("div-crearusuari").style.display = 'block';
}