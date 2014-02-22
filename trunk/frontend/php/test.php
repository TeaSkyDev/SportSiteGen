<?php


include ("Tournoi.php");
include ("../../mysql_connect.php");

$tour = new Tournoi($bdd);
$data = $tour->get_treeTab_byId(1);

?>


<script>
var tab = <?php echo json_encode($data); ?>
</script>

<?php
include("../js/test.html");
?>