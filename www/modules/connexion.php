<!--
<!DOCTYPE html>
<html>

<head>
    <title>Welcome/Connexion</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/connexion.css">

    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">
    <style>
        @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }  @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
        @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }           @viewport { user-zoom: fixed ; min-zoom: 100% ; }
    </style>
</head>

<body>
-->
    <form class="connexion" method="post" action="/www/libs/connexion_php.php">
      <p>
            <label for="email">E-Mail</label>
            <input type=email name="email"  placeholder="prenom.nom@cpe.fr" required>
       </p>
        <p>
            <label for="mdp">Password</label>
            <input type=password name="mdp" required> 
       </p>
        <p>
            <label for="connexion_automatique">Connexion Automatique</label>
            <input type=checkbox name="connexion_automatique">
        </p>
        <p>
            <input type="submit" value="connexion">
        </p>
        <p style="color:white">Vous n'êtes pas encore inscrit ? <a href="modules/inscription.php">Inscription</a></p>
    </form>
    
      
    
<!--
</body>
</html>
-->