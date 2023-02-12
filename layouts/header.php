<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des véhicule</title>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="assets/js/script.js"></script>
</head>
<body>
    
    <header>
        <div class="logo">
            <a href="/GestionVehicules/wellcome">
                <span class="material-symbols-outlined">directions_car</span> Gestion véhicule </a>
        </div>
        <nav>
            <ul>
                <?php 
                    session_start();
                    
                    if(isset($_SESSION['user'])) {
                        if($_SESSION["valid"]) {
                            $links = arrayLinks();
                            $subLinks = arraySubLinks();
                            foreach($links as $key=>$val) {
                                echo '<li class="'.isActive($key).'">';
                                    echo '<a href="'.$key.'">'.$val.'</a><ul>';
                                    foreach($subLinks[$key] as $keySub=>$valSub) {
                                        echo '<li class="sub-'.isActive($keySub).'">';
                                            echo '<a href="'.$keySub.'">'.$valSub.'</a>';
                                        echo '</li>';
                                    }
                                echo '</ul></li>';
                            }
                        }
                    } else {
                        echo '<li><a href="/GestionVehicules/login"> Login   <span class="material-symbols-outlined">login</span></a></li>';
                    }
                    
                ?>
            </ul>
        </nav>
    </header>

    <main>

