 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>e-Learning | File Upload</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Course File Upload</h3><br />  
                <form method="post" enctype="multipart/form-data" action="upload.php">
					<label>Author Name</label>
					<br />
					<input type="text" name="authorName" />
					<br />
					<br />
					<label>Class Name</label>
					<br />
					<select name="className">
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>	
					<br />
					<br />
					<label>Title</label>
					<br />
					<input type="text" name="title" />
					<br />
					<br />
					<label>Tags</label>
					<br />
					<input type="text" name="tags" />
					<br />
					<br />
                     <label>Please Select Zip File</label>  
                     <input type="file" name="zip_file" />
                    <br />
                     <input type="submit" name="btn_zip" class="btn btn-info" value="Upload" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  