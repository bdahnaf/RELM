 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>e-Learning | Home</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
				<?php
				include 'dbconfig.php';
				$sql = 'SELECT DISTINCT class, title, filelocation FROM tblData';
				  
					if ($result=mysqli_query($con,$sql))
					  {
						  echo '<h3>List of classes available</h3>';
					  // Fetch one and one row
					  while ($row=mysqli_fetch_row($result))
						{
						?>

							<h5>
							<?php echo $row[0] . ' ' . $row[1] . ' <a href="' . $row[2] . '">Link</a>';  ?>
							</h5>
						
						<?php
						}
				  // Free result set
					  mysqli_free_result($result);
					}

				?>
				
				
           </div>  
           <br />  
      </body>  
 </html>  