<?php
session_start();
?>

<html>
<body>
Member area.

<a href="logout.php">Logout</a>

<?php 
print_r($_SESSION);

?>
</body>
</html>
