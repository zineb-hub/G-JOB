
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="rosey/img/WITH-BG/1.png" />
    <link rel="stylesheet" href="imane/adminDash.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
<div>

</div>
<?php include "meno.php";?>
<div id="pageContainer2" >
<div>

        </div>
            <h1>Users List</h1>
            <div id="usersPage">
                    <?php include "show_user.php"; ?>  
            </div>
            
</div>

</body>
<style>
    *{
        text-decoration: none;
    }
body{
    flex-direction: column;
display: flex;
align-items:center;
justify-content: space-around;

}
#usersPage{
    display: flex;
    justify-content: center;
    flex-direction: column;
}
.one-user
{
    display: flex;
    justify-content: center;
    flex-direction: column;
   
}
ul#meno{
    display : flex;
    flex-direction: row;
}
    </style>

</html>