<?php

	if( !preg_match( "/index.php/i", $_SERVER['PHP_SELF'] ) ) { die(); }

?>
<div class="box">

	<div class="square title">
		<strong>Manage Files</strong>
	</div>

	<?php
		
                
		$query = $db->query( "SELECT * FROM _pages" );
				
		$num   = $db->num( $query );
		
			if ($num == 0) {
			
				echo "<div class='square bad'>";
				echo "<strong>Error</strong>";
				echo "<br />";
				echo "There is currently no pages to manage!";
				echo "</div>";
			}
			
			else {
			
		$j = "a";

		while( $array = $db->assoc( $query ) ) {

			echo "<div class=\"row {$j}\" id=\"file_{$array['id']}\">";

			echo "<a href=\"#\" onclick=\"Radi.deleteFile('{$array['id']}');\">";
			echo "<img title=\"Delete File\" src=\"_img/minus.png\" alt=\"Delete\" align=\"right\" />";
			echo "</a>";

			echo "<a href=\"webmaster.add?id={$array['id']}\">";
			echo "<img title=\"Edit File\" src=\"_img/pencil.png\" alt=\"Edit\" align=\"right\" />";
			echo "</a>";

			echo $array['page'];

			echo "</div>";

			$j++;

			if( $j == "c" ) {

				$j = "a";

			}

		}
	}
	?>

</div>