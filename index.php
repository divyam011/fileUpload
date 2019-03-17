<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors',1);
 ?>
<!DOCTYPE html>
<html lang="en-US ">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    	<div class="container">
    		<div class="upfrm">
		        <form action="upload.php" method="post" enctype="multipart/form-data">
				    Select Image File to Upload:
				    <input type="file" name="file">
				    <input type="submit" name="submit" value="Upload">
				</form>
			</div>
		</div>
		<div class="gallery">
			<h2>uploaded image</h2>
			<?php
				// Include the database configuration file
				$con=mysqli_connect("localhost","root","qwerty","project1");
// Check connection
				if ($con)
				  {
				  	echo"connection done";
				  }
				  else{
				  die("Connection error: " . mysqli_connect_error());
				  }
								// Get images from the database
				$query = $con->query("SELECT * FROM images ORDER BY uploaded_on DESC");

				if($query->num_rows > 0){
				    while($row = $query->fetch_assoc()){
				        $imageURL = 'uploads/'.$row["file_name"];
				?>
				    <img src="<?php echo $imageURL; ?>" alt="" />
				<?php }
				}else{ ?>
				    <p>No image(s) found...</p>
				<?php } 
			?>
		</div>
    </body>

</html>
