<?php 
session_start();
$output="";
for($i=0;$i<count($_SESSION['items']);$i++){
    $output.=$_SESSION['items'][$i];
    $output.="\r\n";    
}
$fileName="users/".$_SESSION['items'][0]."_".$_SESSION['items'][1].".txt";
try
{

	$file = fopen( $fileName, "w" ); 
	fwrite( $file, $output);
	// close the file when you're done!
	fclose( $file );
}
catch (Exception $ex)
{
	// if there was a problem, throw an error message and stop.
	echo 'Message: ' . $e->getMessage();
	exit();
}                    

    
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Success</title>
</head>
<body>
    <p>Your informations have been saved successfully.</p>
</body>
</html>