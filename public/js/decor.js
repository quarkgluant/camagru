function decor() {
  select = document.getElementById("select");
  choice = select.selectedIndex  // Récupération de l'index du <option> choisi
  valeur_cherchee = select.options[choice].value; // Récupération de la valeur du <option> choisi
  img = "imgtag2";// Nom de l'image
  img.src = valeur_cherchee;
    var r = confirm(valeur_cherchee);
}
