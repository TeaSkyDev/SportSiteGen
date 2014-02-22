<?php

echo "salut";
$tab = array();
for ( $j = 0 ; $j < 5 ; $j++) {
    for ( $i = 0 ; $i < 16 ; $i++) {
	$tab[$j][$i]['nom'] = "salut".$i;
	$tab[$j][$i]['gagne'] = "false";
	if ( $i%2 == 0 ) {
	    $tab[$j][$i]['gagne'] = "true";
	}
	
    }
 }

?>

<script>
var tab = <?php echo json_encode($tab); ?>

</script>

<?php 
include("test.html"); 



?>