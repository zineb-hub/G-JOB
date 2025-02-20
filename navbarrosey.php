<?php
include_once("database_connection2.php");
$I_D = $_SESSION["user_id"];
$Q = "SELECT profile_pic_user FROM users WHERE users.id_user=?";
$ST = $connect->prepare($Q);
$ST->bind_param('i', $I_D);
$ST->execute();
if ($ST->error) {
    echo "Error: " . $ST->error . "<br>";
}
$result = $ST->get_result();
$user = $result->fetch_object();
$prof_pic = ($user->profile_pic_user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="rosey/css/UserNavBar.css" />
    <link rel="icon" href="rosey/img/WITH-BG/1.png" />
    <link rel="stylesheet" href="rosey/css/settings.css" />
    <script src='rosey/js/navbar.js'></script>
    <script src='rosey/js/sidebar.js'></script>
</head>

<body>
    <div class="nav_bar">
        <a href="index.php"><img class="logo" src="rosey\img\WITHOUT-BG\4.png" /></a>
        <a style="position: fixed; left: 10px; justify-self: flex-start" href="index.php"><img class="logo-alt"
                src="rosey\img/WITHOUT-BG/3.png" /></a>

        <button class="nav_buttons dashboard">
            <a href="index.php">Dashboard</a>
        </button>
        <div class="notifchatdrop">


            <button class="nav_buttons main-dropdown">
                <?php echo "<img id='dropdown-img' class='dropdown-img' src=$prof_pic />"; ?>
            </button>
            <div class="dropdown-content">
                <a class="ddlinks" href="profile.php">Profile<br /></a>
                <hr />
                <?php
                if ($_SESSION['admin'] == 1)
                    echo "<a class='ddlinks' href='adminDash.php'>Admin Dashboard<br /></a>
                <hr />";
                else echo"<br />";
                ?>

                <a class="ddlinks" href="provformindex.php">Post an offer<br /></a>
                <hr />

                <a class="ddlinks" href="seekformindexs.php">Post an application<br /></a>
                <hr />
                <a class="ddlinks" href="faq.php">Help And Support<br /></a>

                <hr />
                <a class="ddlinks" href="settings.php">Settings<br /></a>
                <hr />

                <a class="ddlinks">
                    <form method="post" action="log_out.php"> <input type="submit" name="logout" value="log out"> <br />
                </a>
            </div>
        </div>
        <button class="sidebar">&#8801;</button>
        <div class="sidebar-content">
            <button class="nav_buttons exit">x</button>
            <button class="nav_buttons dashboard">
                <a href="index.php">Dashboard</a>
            </button>

            <hr />
            <a href="profile.php">Profile</a>
            <hr />
            <a href="provformindex.php">Post an offer</a>
            <hr />

            <a href="seekformindex.php">Post an application</a>
            <hr />
            <a href="faq.php">Help And Support</a>

            <hr />
            <a href="settings.php">Settings</a>
            <hr />

            <hr />
            <a class ="navbuttons">
                <form method="post" action="log_out.php"> <input type="submit" name="logout" value="log out"> </form>
            </a>
        </div>
    </div>
</body>
<style></style>


</html>