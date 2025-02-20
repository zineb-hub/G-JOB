<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="rosey/img/WITH-BG/1.png" />
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="imane/adminDash.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap" <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="whole-page">
        <div id="sideBar">
            <div id="secTitle">

                <span id="adminDahsboard">Admin Dashboard.</span>
            </div>
            <div id="adminInfo">
                <div id="profilePic">
                    <a href="profile.html">
                        <img id="profilePicture" src="rosey/img/WITHOUT-BG/3.png" alt="">
                    </a>

                </div>
                <div id="profileName">
                    <span id="adminName">G-JOBS</span>
                </div>
            </div>
            <ul id="menu">
                <li class="List">
                    <a class="pageLink" href="#">
                        <button class="pageName" onclick="page1()">Website statistics
                            <img class="arrowSign" src="imane/pics/icons8-arrow-50.png" alt="">
                        </button>
                    </a>
                </li>
                <li class="List">
                    <a class="pageLink" href="#">
                        <button class="pageName" onclick="page2()">All users
                            <img class="arrowSign" src="imane/pics/icons8-arrow-50.png" alt="">
                        </button>
                    </a>
                </li>
                <li class="List">
                    <a class="pageLink" href="#">
                        <button class="pageName" onclick="page3()">Provider posts
                            <img class="arrowSign" src="imane/pics/icons8-arrow-50.png" alt="">
                        </button>
                    </a>
                </li>
                <li class="List">
                    <a class="pageLink" href="#">
                        <button class="pageName" onclick="page4()">Seeker posts
                            <img class="arrowSign" src="imane/pics/icons8-arrow-50.png" alt="">
                        </button>
                    </a>
                </li>
                <li class="List">
                    <a class="pageLink" href="#">
                        <button class="pageName" onclick="page5()">All questions
                            <img class="arrowSign" src="imane/pics/icons8-arrow-50.png" alt="">
                        </button>
                    </a>
                </li>
                <li class="List">
                    <a class="pageLink" href="#">
                        <button class="pageName" onclick="page6()">Testimonials
                            <img class="arrowSign" src="imane/pics/icons8-arrow-50.png" alt="">
                        </button>
                    </a>
                </li>
                <li class="List">
                    <a class="pageLink" href="#">
                        <button class="pageName"> <a id="website-button" href="website_design.php" style="text-decoration: none; color : white;
                         ">add new admin</a>
                            <img class="arrowSign" src="imane/pics/icons8-arrow-50.png" alt="">
                        </button>
                    </a>
                </li>
            </ul>

        </div>
        <div id="pageContent">
            <div id="pageContainer1">
                <div>
                    <h1>Website's activity</h1>
                </div>
                <div class="row">
                    <div class="caseStat">
                        <h3 class="caseTitle">Number of users</h3>
                        <img class="caseIcon" src="imane/pics/icons8-user-50.png" alt="">
                        <span class="NumberDiv"><?php include("usercount.php") ?></span>
                    </div>
                    <div class="caseStat">
                        <h3 class="caseTitle">Number of likes</h3>
                        <img class="caseIcon" src="imane/pics/like_icon.png" alt="">
                        <span class="NumberDiv"></span>
                    </div>
                    <div class="caseStat">
                        <h3 class="caseTitle">Overall rating</h3>
                        <img class="caseIcon" src="imane/pics/icons8-rating-50.png" alt="">
                        <span class="NumberDiv"><?php include("ratting_stat.php") ?></span>
                    </div>
                </div>

            </div>

        </div>

        <div id="pageContainer2" style="display: none;">
            <h1>Users List</h1>
            <div id="usersPage">
                <div id="all-users">
                    <?php include("show_user.php"); ?>
                </div>
            </div>



        </div>

        <div id="pageContainer3" style="display: none;">
            <h1>Providers posts</h1>
            <div id="postsPage">

                <div class="posts-content">

                    <div class="posts-grid">
                        <?php include "show_prov_post.php"; ?>
                    </div>
                </div>

            </div>

            <div id="pageContainer4" style="display: none;">
                <h1>Seekers posts</h1>
                <div id="postsPage">

                    <div class="posts-content">

                        <div class="posts-grid">
                            <?php include "show_seeker_post.php"; ?>
                        </div>
                    </div>

                </div>

                <div id="pageContainer5" style="display: none;">
                    <div>
                        <h1>Questions list</h1>
                    </div>
                    <div id="usersPage">
                        <div id="all-users">
                            <?php include("faq.php") ?>
                        </div>

                    </div>
                </div>

                <div id="pageContainer6" style="display: none;">
                    <h1>Testimonials</h1>
                    <div id="usersPage">
                        <div id="all-users">
                            <?php include("faq_real.php"); ?>
                        </div>
                    </div>
                </div>

                <div id="pageContainer7" style="display: none;">
                    <h1>Update website</h1>
                    <div id="pageSite-update">
                        <div id="all-users1">
                            <img id="logo-picture" class="logo" src="https://i.pinimg.com/564x/20/c0/0f/20c00f0f135c950096a54b7b465e45cc.jpg" />
                            <div id="change-buttons">
                                <button id="deletelogo">
                                    Delete website's logo
                                </button>
                                <label id="uploadlogo" for="new-logo">
                                    Upload new logo
                                </label>
                                <input id="new-logo" type="file" style="display: none" onchange="changeProfilePicture(event)" name="file-upload" />
                            </div>
                            <div id="name-change">
                                <form action="">
                                    <label id="update-name" for="new-name">Website's name:</label>
                                    <input id="update-name-field" type="text" name="new-name">
                                    <input id="submit-name" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <script src="imane/adminDash.js"></script>
</body>

</html>