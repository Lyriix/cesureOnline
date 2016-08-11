<!DOCTYPE html>
<html>
    <!--
  * Please see the included README.md file for license terms and conditions.
  -->

    <head>
        <link rel="stylesheet" type="text/css" href="icon-fonts/font-awesome-4.3.0/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="icon-fonts/elusive-icons-2.0.0/css/elusive-icons.css">
        <link rel="stylesheet" type="text/css" href="css/index/home_default.css">
        <link rel="stylesheet" type="text/css" href="css/index_main.less.css" class="main-less">
        <link rel=stylesheet type=text/css href=css/form.css>
        
        <!--  <link rel="stylesheet" type="text/css" href="icon-fonts/elusive-icons-2.0.0/css/elusive-icons.css"> -->
        <meta charset="UTF-8">
        <title>Cesure Map</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">

        <!--
  * The "meta viewport" tag (below) helps your app size appropriately to a device's ideal viewport.
  * Note that Windows device viewports work better when initialized using the @viewport CSS rule.
  * For a quick overview of "meta viewport" and @viewport, see this article:
  *   http://webdesign.tutsplus.com/tutorials/htmlcss-tutorials/quick-tip-dont-forget-the-viewport-meta-tag
  * To see how it works, try your app on a real device with and without a "meta viewport" tag.
  * Additional useful references include:
  *   http://www.quirksmode.org/mobile/viewports.html
  *   http://www.quirksmode.org/mobile/metaviewport/devices.html
  *   https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html
-->

        <!-- <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, minimum-scale=1, maximum-scale=2"> -->

        <style>
            /* following three (cascaded) are equivalent to above three meta viewport statements */
            /* see http://www.quirksmode.org/blog/archives/2014/05/html5_dev_conf.html */
            /* see http://dev.w3.org/csswg/css-device-adapt/ */
                @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }          @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
                @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }                   @viewport { user-zoom: fixed ; min-zoom: 100% ; }
                /*@-ms-viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }   @viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }*/
        </style>
        <!--
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" type="text/css" href="css/index_main.less.css" class="main-less">
-->
        <!-- IMPORTANT: Do not include a weinre script tag as part of your release builds! -->
        <!-- Place your remote debugging (weinre) script URL from the Test tab here, if it does not work below -->
        <!-- <script src="http://debug-software.intel.com/target/target-script-min.js#insertabiglongfunkynumberfromthexdkstesttab"></script> -->

        <!-- Recommended location for your JavaScript libraries -->
        <!-- These library references (below) are just examples to give you the general idea... -->
        <!-- <script src="lib/mc/hammer.js"></script> -->
        <!-- <script src="lib/ft/fastclick.js"></script> -->

        <!--
  * cordova.js is a phantom lib for "Cordova HTML5 web app," it does nothing in a "Standard HTML5 web app"
  * Seeing a "Failed to load resource: net::ERR_FILE_NOT_FOUND" message caused by this "cordova.js" script?
  * The cordova.js script is required if you convert your "Standard HTML5" project into a "Cordova" project.
  * You can safely ignore the error or comment out this line if you will not be developing a Cordova app.
-->
       <!-- <script src="cordova.js" id="xdkJScordova_"></script> -->

        
        
        <!-- <script src="js/app.js"></script> -->
        <!-- for your event code, see README and file comments for details -->
       <!-- <script src="js/init-app.js"></script> -->
        <!-- for your init code, see README and file comments for details -->
      <!--  <script src="xdk/init-dev.js"></script> -->
        <!-- normalizes device and document ready events, see file for details -->
       <!-- 
        <script type="application/javascript" src="lib/jquery.min.js"></script>
        <script type="application/javascript">
            $.afui.autoLaunch = false; //By default, it is set to true and you're app will run right away.  We set it to false to show a splashscreen
            /* This function runs when the content is loaded.*/
            $.afui.useOSThemes=false;
             $(document).ready(function(){
                setTimeout(function(){
                    $.afui.launch();
                },1500);
            });
        </script>
        -->
    </head>

    <body id="home" class="v2">

        <!-- IMPORTANT: Do not include a weinre script tag as part of your release builds! -->
        <!-- Place your remote debugging (weinre) script URL from the Test tab here, if it does not work above -->
        <!-- <script src="http://debug-software.intel.com/target/target-script-min.js#insertabiglongfunkynumberfromthexdkstesttab"></script> -->

        <!-- en tete -->
        <?php include('entete.php')?>
        
        <!-- Menu -->
        <?php include('menu.php')?>


        <section id="formulaire">
            <article id="filter-aera">
                <header>
                    <h1>Sélection de filtre de recherches</h1>
                </header>
                <form>
                    <p>Filière</p>
                        <select name="filiere" id="filiere">
                            <option class="" value="">Choisissez une Filière</option>
                        <!--   
                            <option class="filEti" value="-">ETI</option>
                            <option class="filCgp" value="-">CGP</option>
                            <option class="filIrc" value="-">IRC</option>
                        -->
                        </select>
              
                    <p>Spécialité</p>
                        <label for="specialite"></label><br>
                        <select name="specialite" id="specialite">
                            <option class="" value="-">-</option>
                            <!--
                            <option class="ETI" value="IMI">Image Modélisation et Informatique</option>
                            <option class="ETI" value="ELEC">Electronique</option>
                            <option class="ETI" value="ROB">Robotique</option>
                            <option class="ETI" value="INF">Informatique</option>
                            <option class="ETI" value="RES">Réseau</option>
                            <option class="CGP" value="GP">GP</option>
                            <option class="CGP" value="POLY">Polymères</option>
                            <option class="CGP" value=""></option>
                            <option class="CGP" value=""></option>
                            <option class="CGP" value=""></option>
                            -->
                           
                        </select> 
                
                    <p>Zone Géographique</p>
                        <label for="zone"></label><br>
                        <select name="Zone Géographique" id="zone">
                            <option value="">-</option>
                            <option value="europe">Europe</option>
                            <option value="amerique-du-nord">Amérique du Nord</option>
                            <option value="amerique-du-sud">Amérique du Sud</option>
                            <option value="asie">Asie</option>
                            <option value="oceanie">Oceanie</option>
                        </select>
                </form>
            </article>

            <article id="map">
                <img src="images/map.jpg" alt="carte du monde">
            </article>
        </section>
        
        
         <!-- Pied de page -->
        <?php include('pieddepage.php')?>

        <script src="js/form.js"></script>
    </body>

</html>