function confirmDel() {
  var r = confirm("Voulez-vous réellement supprimer votre profil ?");
  if (r == true) {
      x = "Vous avez confirmé !";
      location.href = './../del_out.php';
  } else {
      x = "Vous avez changé d'avis !";
  }
}
