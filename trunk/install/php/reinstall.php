<?php
require_once("fonctions.php");
if(isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['bd']) && isset($_POST['server'])) {
    $bdd = bdd_connexion($_POST['server'], $_POST['login'], $_POST['pass'], $_POST['bd']);
    exec_sql_file($bdd, "../sql/Suppression.sql");
    @unlink("../cms.conf");
    header("Location: ../index.php");
//    echo '<h1 align="center">DONE</h1>';
} else {
?>
<form method="post" action="reinstall.php">
  <h1 align="center">Suppression de la base de donnees pour re-installation</h1><br>
  <table align="center">
    <tr>
      <th>Login : </th><td><input type="text" name="login"/></td>
    </tr>
    <tr>
      <th>Pass : </th><td><input type="password" name="pass"/></td>
    </tr>
    <tr>
      <th>Base : </th><td><input type="text" name="bd"/></td>
    </tr>
    <tr>
      <th>Serveur : </th><td><input type="text" name="server"/></td>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" value="Re installer"/></th>
    </tr>
  </table>
</form>
<?php 
}
?>
