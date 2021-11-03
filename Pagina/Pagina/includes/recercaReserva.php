<div class="buscador">
  <form class="buscadorForm form-inline" method="post" action="reservabuscador.php">
<div class="form-group mb-2">
<label for="from">Des de</label>
<input type="text" id="from" name="from">
<label for="to">Fins a </label>
<input type="text" id="to" name="to">
<!-- *** Calendari Final *** -->
</div>
<!-- *** Seleccionar tipus habitació i numero persones Final *** -->
<div class="form-group mb-2">
<label for="tipus">Numero de persones:</label>
  <select name="npersones" id="npersones">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  <option value="4">4</option>
  </select>
</div>
<!-- *** Seleccionar tipus habitació i numero persones Inici *** -->
<div class="form-group mb-2">
<label for="tipus">Nombre de habitacions</label>
  <select name="nhabitacio" id="nhabitacio">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
  </div>
    <button type="submit" name="reservaBuscar" class="btn btn-primary mb-1"><i class="fas fa-search"></i></button>
  </form>
  </div>