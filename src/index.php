<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <title>Patient</title>

    <style>
        .inner-container{
            width: 90%;
            min-height: 200px;
            margin: 10px auto;
            background-color: #e0e0e0;
            padding: 20px;
        }
    </style>

</head>

<body>
    

<div class="container">
    <?php include_once("includes/navbar.html");?>
    
    <br><br>

    <div class="inner-container">
        <?php 
            $page_view = "route/view.php";

            if(isset($_GET) && isset($_GET["page"])){
                $page = $_GET["page"];
                $white_list = ["home", "view", "add"];

                if(array_search($page, $white_list) !== false){
                    $page_view = "route/" . $page . ".php";
                }
            }

            require_once($page_view);
        ?>
    </div>
</div>

</body>
</html>