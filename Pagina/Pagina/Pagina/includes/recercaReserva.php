<div class="mx-auto">
  <form class="buscadorForm form-inline" method="post" action="index.php?r=reservabuscador">
<div class="form-group mb-2">
        <div class="wrapper">
<label for="from">Des de</label>
<input type="text" id="from" name="from">
</div>
<!-- *** Calendari Final *** -->
</div>
<div class="form-group mb-2 formdes">
  <div class="wrapper">
<label for="to">Fins a </label>
<input type="text" id="to" name="to">
</div>
</div>
<!-- *** Seleccionar tipus habitació i numero persones Final *** -->
<div class="form-group mb-2 formdes">
<label for="tipus">Numero de persones:</label>
  <select name="npersones" id="npersones">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  <option value="4">4</option>
  </select>
</div>
<!-- *** Seleccionar tipus habitació i numero persones Inici *** -->
<div class="form-group mb-2 formdes">
<label for="tipus">Nombre de habitacions</label>
  <select name="nhabitacio" id="nhabitacio">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
      <option value="4">4</option>
  </select>
  </div>
  <div class="form-group mb-2 formdes">
    <button type="submit" name="reservaBuscar" id="cercaBtn" class="btn btn-outline-danger mb-1"><i class="fa fa-search"></i></button>
  </div>
  </form>
</div>