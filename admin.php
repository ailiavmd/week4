<!DOCTYPE html>
<html>
    
    <head>
        
        <script src="https://use.fontawesome.com/88ffc56346.js"></script>
        
        <title>VANARTS STUDENT MOCK PROJECT SITE</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is a student exercise website for the Vancouver Institute of Media Arts (www.vanarts.com).">
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        
        <link href="css/normalize.css" rel="stylesheet" type="text/css">
        <link href="css/main.css?v=1" rel="stylesheet" type="text/css">
    
    </head>
    
	<body class="admin-p">
        
        <div class="row">
            <h1>Welcome, ellory!</h1>
        </div>
        
        <div class="row admin-area">
            
            <div class="small-12 columns">
                <h3>Upload Publication</h3>
                
                <form class="admin-f" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <label>title</label><input type="text" name="title" required>
                    <label>theme</label><input type="text" name="theme" required>
                    <label>year</label><input type="number" name="year" min="1970" required>
                    <label>cover image</label><input type="file" name="imageUploaded" required>
                    <label>genre</label><input type="text" name="genre" required>
                    <label>description</label><textarea name="description" required></textarea>
                    <input type="submit" name="w_submit" value="Upload" id="w_submit">
                </form>

                <?php

                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "eb_db";

                    $connection = mysqli_connect($host, $username, $password, $database);

                    if(isset($_POST['w_submit'])) {
                        $title = mysqli_real_escape_string($connection, $_POST['title']);
                        $theme = mysqli_real_escape_string($connection, $_POST['theme']);
                        $year = mysqli_real_escape_string($connection, $_POST['year']);
                        $targetDirectory = "img/books/";
                        $targetFile = $targetDirectory . basename($_FILES['imageUploaded']['name']);
                        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);                        
                        $genre = mysqli_real_escape_string($connection, $_POST['genre']);
                        $description = mysqli_real_escape_string($connection, $_POST['description']);
                        $uploadOk = true;

                        if(!$connection) {
                            die("Connection has failed: " . mysqli_connect_error());
                        }
                        
                        else {
                            
                            $imageName = mysqli_real_escape_string($connection, $targetFile);
                            $uploadOk = true;
                            
                            // Check if file already exists
                            ///////////////////////////////
                            if (file_exists($targetFile)) {
                                echo "<p>FAILED - Image file already exists.</p>";
                                $uploadOk = false;
                            }

                            // Allow certain file formats ''
                            ////////////////////////////////
                            if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif" ) {
                                echo "<p>FAILED - Image was not JPG, JPEG, PNG or GIF.</p>";
                                $uploadOk = false;
                            }
                            
                            if ($uploadOk == false) {
                                echo "<p>File can't be uploaded.</p>";
                            } 
                            
                            else {
                                if(move_uploaded_file($_FILES['imageUploaded']['tmp_name'], $targetFile)) {
                                    echo "<h2>Upload successful!</h2>";

                                    $bookInsert = "INSERT INTO works_tb (title, theme, year, img, description, genre) VALUES ('" .$title. "', '" .$theme. "', '" .$year. "', '" .$targetFile. "', '" .$description. "', '" .$genre. "')";
                                    $resultbookInsert = mysqli_query($connection, $bookInsert);
                                }
                                else {
                                    echo "<p>The File did not upload successfully</p>";
                                }
                                
                            }

                        }
                    }

                    // Make sure to close connection
                    if(!$connection){
                        mysqli_close($connection);
                    }

                ?>

            </div>
        </div>

        <div class="row">
            <p><a href="index.php"><i class="fa fa-long-arrow-left"></i> Go to home page</a></p>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="js/script.js" type="text/javascript"></script>

	</body>
</html>