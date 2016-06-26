<?php
	/*
		Plugin Name: MyPlugin
		Author: Benedikt Berger
		Version: 1.0
		Description: Plugin um MySQL Schokofabrik-Datenbank auszulesen
	*/

	/**
	*  Gibt alle Produkte aus
	*/

	function kunstwerk_func(){
    	global $wpdb;
    	ob_start();


	$res2 = $wpdb->get_results("select bezeichnung, gewicht, 'Kunstwerk' as ist from Produkt NATURAL join Kunstwerk where schaetzwert<2000 union select bezeichnung, gewicht, 'Standard' as ist from Produkt natural join Standardsortiment where preis<3");

    	$text = '';
	echo "<h4>billige Kunstwerke: </h4>";
	echo "<table>";
	echo "<tr><td><b>Bezeichnung</b></td><td><b>Gewicht</b></td></tr>";
    	foreach($res2 as $r) {
		echo "<tr><td>";
		echo $r->bezeichnung;
		echo "</td><td>";
		echo $r->gewicht;
		echo "</td>";
	}

	echo "</table>";

	return ob_get_clean();
}

add_shortcode('kunstwerk','kunstwerk_func');

?>
