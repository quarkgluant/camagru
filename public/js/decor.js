function decor() {
  select = document.getElementById("decor");
  choice = select.selectedIndex  // Récupération de l'index du <option> choisi
  valeur_cherchee = select.options[choice].value; // Récupération de la valeur du <option> choisi
  img = document.getElementById("imgtag3");// Nom de l'image
  var r = confirm(valeur_cherchee);
  if (r == true)
  {
    document.getElementById("save").disabled = false;
    img.src = valeur_cherchee;
  }
}
