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
                     <label>Please Select Zip File</label>  
                     <input type="file" name="zip_file" />  
                     <br />  
                     <input type="submit" name="btn_zip" class="btn btn-info" value="Upload" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  