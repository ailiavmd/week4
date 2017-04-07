<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>VANARTS STUDENT MOCK PROJECT SITE</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <script src="https://use.fontawesome.com/88ffc56346.js"></script>
    </head>
    <body>
        <div class="works">
            <?php
                include('partials/page_header.php');
            ?>

            <div class="row w-grid">
            
            <?php
                $host="localhost";		
                $username="root";
                $password="";
                $database="eb_db";

                $connect = mysqli_connect($host, $username, $password, $database);

                if (!$connect) {
                    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
                }
                else {

                    $query = "SELECT * FROM works_tb";

                    $queryResult = mysqli_query($connect, $query);

                    $rows = mysqli_num_rows($queryResult);

                    if($rows > 0) {
                        echo "<ul>";

                        while ($rowArray = mysqli_fetch_assoc($queryResult)) {
                            $title = $rowArray["title"];
                            $theme = $rowArray["theme"];
                            $year= $rowArray["year"];
                            $path = $rowArray["img"];
                            $genre = $rowArray["genre"];
                            $description = $rowArray["description"];

                            echo "<li class='w-item' data-title='".$title."' data-theme='".$theme."' data-year='".$year."' data-genre='".$genre."' data-description='".$description."' data-alt='".$title."' data-path='".$path."' style='background-image:url(".$path.")'></li>";

                        }
                        echo "</ul>";
                    }
                    mysqli_close($connect);
                }
            ?>

            </div>

            <?php
                include('partials/page_footer.php');
                include('contact.php');
                include('partials/w_info.php');
            ?>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="js/books.js"></script>
            <script src="js/main.js"></script>
        </div>
    </body>
</html>
