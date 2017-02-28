
function inclViews($nameView, $directive, array $array, $option = 1) {
       // declarer la gestion du cryptage pour crypter les chemins
       $cryptagePath = new inputDataHlp();
//        $listcategory = $this->returnList();
//        $listIdentification = $this->panierLogin();
       extract($array);
       ob_start();
       /* ici compile dans une variable le corps de la page */
       include(RACINE_SYSTEM . '/views/' . $directive . '/' . $nameView . 'Views.php');
       $view = ob_get_contents(); /* récupère le corps de la page en binaire */
       ob_end_clean(); /* effacement de l'enregistrement de la vue du corps de la page */
       /* création des chemins pour les fichers css et js */
       $filesuppl = $directive . '/' . $nameView;
       $fileCss = "";
       $fileJs = "";

       if ($option >= 1):
           $fileCss = '<link href="' . RACINE_URL . 'css/' . $filesuppl . '.css" rel="stylesheet">';
       endif;
       if ($option >= 2):
           $fileJs = ' <script src="' . RACINE_URL . 'js/' . $filesuppl . '.js"></script>';
       endif;

       /* inclure le corps avec l'entete et le pied */
       include(RACINE_SYSTEM . '/views/layout/bodyViews.php');
   }
