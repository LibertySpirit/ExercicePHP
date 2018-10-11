<form method = "GET">
  Login : <input type="text" name="login"/>
  <br/>
  <input type="radio" name="role" value="client"/>
  client
  <input type="radio" name="role" value="fournisseur"/>
  fournisseur
  <br/>
  <input type="checkbox" name="type" value="cd"/> CD
  <input type="checkbox" name="type" value="dvd"/> DVD
  <br/>
  Catégorie
  <select name="style">
    <option value="2">Classique</option>
    <option value="1">Jazz</option>
    <option value="3">Rock</option>
  </select>
  <br/>
  <button type="button">Pour du JS</button>
  <button type="submit">Valider</button>
</form>