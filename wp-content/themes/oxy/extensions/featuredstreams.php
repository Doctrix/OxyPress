<!-- jQuery & Isotope & Global -->
<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/global.js"></script>
<!-- Style.css -->
<link rel="stylesheet" href="assets/css/style.css">


<div id="main" class="isotope">

<h2>Oxy Twitch</h2>
 
<div class="filtersContent">
            <h3 class="toolboxTitle">Filtrer par jeu</h3>

<?php
// Nouvelle instance de Twitch_API
$twitchInit = new Twitch_API();
        
        foreach ($twitchInit->getAPI_FeaturedStreams(50, 0) as $key => $item) {
			// Si pas de jeu, filtre = "Jeu inconnu"
			$gameName = (empty($item['stream_game'])) ? 'Jeu inconnu' : $item['stream_game'];
            $chaine .= $gameName.', ';
        }
        
        // On fait un explode sur la virgule et l'espace d’après pour récupérer uniquement nos mots dans le tableau
        $tableau = explode(', ',$chaine);
            
            foreach ($tableau as $new_tab) 
            {
               $tab[$new_tab] = $new_tab;
            }
            echo '<div class="itemsFilter">
                   		<span class="filterItem"><a href="#" class="current allgames" data-filter="*">Tous les jeux</a></span>';
                    
                // On sort un nouveau tableau avec les items sans doublons
                foreach($tab as $item){
                	// On clean le nom du jeu pour créer un nom de class sans caractères spéciaux
                    $gameNameTag = str_replace(str_split(' .+=`\'\\/:*?!%ù;(),@&§çéèà°€£"<>|'), '-', $item);
					if($item != "") echo ' - <span class="filterItem"><a href="#" data-filter=".'.$gameNameTag.'">'.$item.'</a></span>';
                }

            echo '</div>';
            ?>
           
</div>

<h2>Liste des Streams</h2>

<div id="container" class="itemsContainer">

<?php

$i=1;
// Get Featured Streams
foreach ($twitchInit->getAPI_FeaturedStreams(50, 0) as $key => $item) {

// Si on ne trouve pas de jeu, on le nomme "Jeu inconnu"
$gameName = (empty($item['stream_game'])) ? 'Jeu inconnu' : $item['stream_game'];

$gameNameTag = str_replace(str_split(' .+=`\'\\/:*?!%ù;(),@&§çéèà°€£"<>|'), '-', $gameName);
		
	echo '<div class="streamBox isotope-item '.$gameNameTag.'">
				
				<div class="thumbContainer"><a href="'.$item['url'].'"><img src="'.$item['preview_medium'].'" /></a></div>				
			
				<div class="streamInfos">
					<span class="jeu"><a href="'.$item['url'].'">'.$gameName.'</a></span>
					<ul class="infos">
						<li class="username">par <a href="'.$item['url'].'">'.$item['display_name'].'</a></li>
						<li class="viewers">'.$item['stream_viewers'].' spectateurs</li>
					</ul>
				</div>
			
			</div>';

	$i++;
}

?>


</div><!-- #container -->

</div><!-- #main -->