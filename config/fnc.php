<?php

        function isActive($page) {
            if($_SERVER['REQUEST_URI'] == '/GestionVehicules/'.$page) {
                return 'active';
            }
        }

        function arrayLinks(){
            return ['wellcome'=>'Acceuil',
                    'modele'=>'Gerer les modeles',
                    'voiture'=>'Gerer les voitures',
                    'propr'=>'Gerer les propriétaires',
                    //'liste-modele'=>'Liste des modeles',
                    'recherche'=>'Recherche avancée',
                    'logout'=>'<span class="material-symbols-outlined">logout</span>',
                ];
        }

        function arraySubLinks(){
            return [
                    'wellcome'=>[],
                    'modele'=>[
                        'modele'=>'Nouveau modele',
                        'liste-modele'=>'Lite modele',
                    ],
                    'voiture'=>[
                        'voiture'=>'Nouveau voiture',
                        'liste-voiture'=>'Lite voiture',
                    ],
                    'propr'=>[
                        'propr'=>'Nouveau propriétaire',
                        'liste-propr'=>'Lite propriétaire',
                    ],
                    //'liste-modele'=>'Liste des modeles',
                    'recherche'=>[],
                    'logout'=>[]
                ];
        }

        function valid_input($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function error_msg($data) {
            $listErrors = null;
            foreach ( $data as $key => $value) {
                if(empty($value)) {
                    $listErrors .="<p class='error-msg'> Merci de remplire le champ : ". $key .". </h3>";
                }
            }
            return $listErrors;
        }

        function allOk($data) {
            $allOk = true;
            foreach ( $data as $key => $value) {
                if(empty($data[$key])) {
                    $allOk = false;
                }
            }
            return $allOk;
        }
    
?>