<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/doan/public/css/style_User.css">
    <link rel="stylesheet" type="text/css" href="/doan/public/css/page_User.css">
    <link rel="stylesheet" type="text/css" href="/doan/public/libs/bootstrap.css">
    <script src="/doan/public/js/jquery.js"></script>
    <script src="/doan/public/js/bootstrap.js"></script>
    
    <title>USER</title>
</head>
<body>
    <!-- HEADER -->

    <?php 
        require_once "./mvc/views/blocks/block_header_user.php";
    ?> 

    <?php 
        require_once "./mvc/views/pages/" . $data["page"] . ".php";
    ?>      
</body>
</html>