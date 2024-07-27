<?php
require_once('common.php');

$text = $_POST['sometext'];

?>
<!DOCTYPE html>
<html>
<head><title>Submission Complete</title></head>
<body>
<h1>Submission Complete.</h1>
<?php echo $text; ?>
</body>
</html>
