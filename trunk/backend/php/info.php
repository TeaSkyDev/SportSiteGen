<?php
$msg  = isset($_GET['msg']) == TRUE ? $_GET['msg'] : "Aucun message";
$page = isset($_GET['page_r']) == TRUE ? $_GET['page_r'] : "accueil";

echo '<script language="javascript">alert("'.$msg.'");
document.location.href="index.php?page='.$page.'"
</script>';
?>