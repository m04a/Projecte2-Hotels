document.getElementById("crearhabitacio").onclick = function() {crearhabitacio()};
document.getElementById("crearusuari").onclick = function() {esborrartipus()};

function crearhabitacio() {
  document.getElementById("div-crearhabitacio").style.display = 'none';
  document.getElementById("div-crearusuari").style.display = 'block';

}
function crearusuari() {
  document.getElementById("div-crearhabitacio").style.display = 'none';
  document.getElementById("div-crearusuari").style.display = 'block';
}