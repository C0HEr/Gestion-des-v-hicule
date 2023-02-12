<?php
    include "config/cnx.php";
    include "config/fnc.php";
    include 'layouts/header.php';
    if(isset($_SESSION['user'])) {
        switch($_SERVER['REQUEST_URI']) {
            case '/GestionVehicules/':
                include 'pages/home.php';
                break;
            case '/GestionVehicules/modele':
                include 'pages/new_modele.php';
                break;
            case '/GestionVehicules/voiture':
                include 'pages/new_voiture.php';
                break;
            case '/GestionVehicules/propr':
                include 'pages/new_proprietaire.php';
                break;
            case '/GestionVehicules/liste-modele':
                include 'pages/liste_modele.php';
                break;
            case '/GestionVehicules/liste-voiture':
                include 'pages/liste_voiture.php';
                break;
            case '/GestionVehicules/liste-propr':
                include 'pages/liste_propr.php';
                break;
            case '/GestionVehicules/recherche':
                include 'pages/recherche.php';
                break;
            case '/GestionVehicules/login':
                include 'pages/login.php';
                break;
            case '/GestionVehicules/logout':
                include 'pages/logout.php';
                break;
            default:
                include 'pages/home.php';
                break;  
            }
    } else {
        include 'pages/login.php';
    }


    include 'layouts/footer.php';