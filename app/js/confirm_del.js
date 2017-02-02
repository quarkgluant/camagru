function confirmDel() {
  var r = confirm("Voulez-vous réellement supprimer votre profil ?");
  if (r == true) {
      x = "Vous avez confirmé !";
      location.href = '../../public/index.php';
  } else {
      x = "Vous avez changé d'avis !";
  }
}
