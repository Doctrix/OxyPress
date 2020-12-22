<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twitch API Demo</title>

<?php require_once('assets/api/TwitchAPI.php'); ?>

</head>

<body>
<?php 
// Nouvelle instance de Twitch_API
$twitchInit = new Twitch_API();

echo '<h1>Tuto</h1>';


echo '<h2>[ Liste Teams ]</h2>';
$i=0;
// Get API Teams
foreach ($twitchInit->getAPI_ListTeams(5, 0) as $key => $item) {

	echo "<h3>Team n°$i</h3>";
	echo $item['name']." - ".$item['display_name']." - ".$item['created_at']." - ".$item['updated_at']."<br />";

$i++;
}


echo '<h2>[ Recherche Teams ]</h2>';
// Get Search Team - Recherche "testteam"
foreach ($twitchInit->getAPI_SearchTeam("testteam") as $key => $item) {
	echo "$key => $item <br />";
}


echo '<h2>[ Liste Streams ]</h2>';
$i=1;
// Get Featured Streams
foreach ($twitchInit->getAPI_FeaturedStreams(2, 0) as $key => $item) {

	echo "<h3>Stream n°$i</h3>";
	echo "[status] 	=> ".$item['status']."<br />
          [mature] 	=> ".$item['mature']."<br />
		  [display_name] 	=> ".$item['display_name']."<br />
		  [name] 			=> ".$item['name']."<br />
		  [game] 			=> ".$item['game']."<br />
		  [created_at] 		=> ".$item['created_at']."<br />
		  [updated_at] 		=> ".$item['updated_at']."<br />
		  [logo]			=> ".$item['logo']."<br />
		  [url]				=> ".$item['url']."<br />
		  [views] 			=> ".$item['views']."<br />
		  [followers] 		=> ".$item['followers']."<br />
		  [preview_medium] 	=> ".$item['preview_medium']."<br />
		  [stream_game] 	=> ".$item['stream_game']."<br />
		  [stream_viewers] 	=> ".$item['stream_viewers']."<br />
		  ";
	$i++;
}


echo '<h2>[ Recherche Channel ]</h2>';
// Get Channel infos - La chaîne "playstation"
foreach ($twitchInit->getAPI_Channel("playstation") as $key => $item) {
	echo "$key => $item <br />";
}


echo '<h2>[ Recherche Top Jeux ]</h2>';
$i=1;
// Get Top Games
foreach ($twitchInit->getAPI_TopGames(3, 0) as $key => $item) {

	echo "<h3>Top Jeu n°$i</h3>";
	echo "[name] 			=> ".$item['name']."<br />
		  [_id] 			=> ".$item['_id']."<br />
		  [small_box] 	=> ".$item['small_box']."<br />
		  [medium_box] 	=> ".$item['medium_box']."<br />
		  [large_box] 	=> ".$item['large_box']."<br />
		 
		  ";
	$i++;
}


echo '<h2>[ Recherche User ]</h2>';
// Get User infos - Recherche "playstation"
foreach ($twitchInit->getAPI_User("playstation") as $key => $item) {
	echo "$key => $item <br />";
}


echo '<h2>[ Recherche Streams par nom de Jeu ]</h2>';
$i=1;
// Get Search Streams - Recherche "Starcraft"
foreach ($twitchInit->getAPI_SearchStreams("Starcraft", 3, 0) as $key => $item) {

	echo "<h3>Stream n°$i</h3>";
	echo "[status] 	=> ".$item['status']."<br />
          [mature] 	=> ".$item['mature']."<br />
		  [display_name] 	=> ".$item['display_name']."<br />
		  [name] 			=> ".$item['name']."<br />
		  [game] 			=> ".$item['game']."<br />
		  [created_at] 		=> ".$item['created_at']."<br />
		  [updated_at] 		=> ".$item['updated_at']."<br />
		  [logo]			=> ".$item['logo']."<br />
		  [url]				=> ".$item['url']."<br />
		  [views] 			=> ".$item['views']."<br />
		  [followers] 		=> ".$item['followers']."<br />
		  [preview_medium] 	=> ".$item['preview_medium']."<br />
		  [stream_game] 	=> ".$item['stream_game']."<br />
		  [stream_viewers] 	=> ".$item['stream_viewers']."<br />
		  ";
	$i++;
}


?>

<p>Créé par Hadrien Boyer pour <a href="http://hadri.info">Hadri.info</a> - 2014</p>

</body>
</html>