<?php
$msg = isset($_GET['msg']) == TRUE ? $_GET['msg'] : "Aucun message";

echo '<table align="center" style="border:1px solid green">
	<tr>
		<th>'.$msg.'</th>
	</tr>
</table>';
?>