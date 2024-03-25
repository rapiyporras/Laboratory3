<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            padding: 20px;
            text-align: center;
            background-color: #1abc9c;
            color: white;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            text-align: center;
            padding: 10px;
            color: white;
        }

        .navbar h1 {
            margin-bottom: 10px;
        }

        .navbar a {
            display: inline-block;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="logout.php">Logout</a>
</div>

<div class="content">
</div>

<div class="footer">
    <p>&copy; <?php echo date("Y"); ?> My Website. All rights reserved.</p>
</div>

</body>
</html>

<?php 
}else{
    header("Location:Loginform.php");
    exit();
}
?>