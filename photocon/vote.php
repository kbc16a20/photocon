<?php
session_start();
if (!isset($_SESSION["number"])) {
    $_SESSION["number"] = 1;
}
if (isset($_POST["add"])) {
    $_SESSION["number"]++;
} else if (isset($_POST["reset"])) {
    $_SESSION["number"] = 1;
}
echo $_SESSION["number"];
?>

<form method="POST" action="">
    <input type="submit" name="add" value="投票する">
</form>
<form method="POST" action="">
</form>