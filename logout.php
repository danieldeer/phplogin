<?php
session_start();

?>

<html>
<body>
Logged out. Return to <a href="index.php">Home</a>.
</body>
</html>


<?php
session_unset();
session_destroy();

?>
