
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		require "function/vocabulary/select.php";
	    
	    $count = intval($_GET["count"]);
	    runRandomVocabulary($count);

	  //   header('Location: random.php');
		 // exit;


	?>

	<script type="text/javascript">
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1; //January is 0!

		var yyyy = today.getFullYear();
		if (dd < 10) {
		  dd = '0' + dd;
		} 
		if (mm < 10) {
		  mm = '0' + mm;
		} 
		var today = yyyy + '-' + mm + '-' + dd;

		document.location = "random.php?date=" + today;
	</script>
</body>
</html>
