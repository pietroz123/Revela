<?php include_once('php/included_upload.php'); ?><!DOCTYPE html>
<html lang="en">

	<head>
		<title>Generated input in PHP example - fileuploader - Innostudio.de</title>
		
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Generated input in PHP example - fileuploader - Innostudio.de">
        
        <link rel="shortcut icon" href="https://innostudio.de/fileuploader/images/favicon.ico">

		<!-- fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <link href="../../dist/font/font-fileuploader.css" rel="stylesheet">
        
		<!-- styles -->
		<link href="../../dist/jquery.fileuploader.min.css" media="all" rel="stylesheet">
		
		<!-- js -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
		<script src="../../dist/jquery.fileuploader.min.js" type="text/javascript"></script>
		<script src="./js/custom.js" type="text/javascript"></script>

		<style>
			body {
				font-family: 'Roboto', sans-serif;
				font-size: 14px;
                line-height: normal;
				background-color: #fff;

				margin: 0;
			}
            
            form {
                margin: 15px;
            }
            
            .fileuploader {
                max-width: 560px;
            }
		</style>
	</head>

	<body>
		<form action="php/form_upload.php" method="post" enctype="multipart/form-data">
            <?php
				// this variable is comming from the included file
				$input = $FileUploader->generateInput();
			
				// echo the input
				echo $input;
			?>
            
			<input type="submit">
		</form>
    </body>
</html>