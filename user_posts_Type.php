<?php
include('database_connection.php');
session_start();
$sql = "";

switch ($_SESSION["Type"]) {
    case "seeker":
        $sql = "SELECT
    post_seekers.post_id AS post_id,
    post_seekers.userID_seek AS id_user,
    post_seekers.funame_seek AS name,
    post_seekers.domain_post AS domain,
    post_seekers.school_seeker AS CSName,
    post_seekers.degree_seeker AS CSLocation,
    post_seekers.job_position AS Job,
    post_seekers.salary_job AS salary,
    post_seekers.job_spec AS jobReq,
    post_seekers.start_date_seeker AS date,
    post_seekers.TimestampSeeker AS timestamp,
    'seeker' AS type,
    users.profile_pic_user AS profile_pic_user,
    users.gender_usr AS gender_usr
FROM post_seekers
LEFT JOIN users ON post_seekers.userID_seek = users.id_user
ORDER BY timestamp DESC";
        break;

        case "provider":
            $sql = "SELECT
                post_prov.post_id AS post_id,
                post_prov.userID_prov AS id_user,
                post_prov.funame_prov AS name,
                post_prov.domain_post AS domain,
                post_prov.company_name AS CSName,
                post_prov.company_location AS CSLocation,
                post_prov.job_position AS Job,
                post_prov.f_salary AS salary,
                post_prov.job_requirements AS jobReq,
                post_prov.start_date_provider AS date,
                post_prov.TimestampProvider AS timestamp,
                'provider' AS type,
                users.profile_pic_user AS profile_pic_user,
                users.gender_usr AS gender_usr
            FROM post_prov
            LEFT JOIN users ON post_prov.userID_prov = users.id_user
            ORDER BY timestamp DESC";
            break;
        

    case "Home":
        $sql = "SELECT
        post_prov.post_id AS post_id,
        post_prov.userID_prov AS id_user,
        post_prov.funame_prov AS name,
        post_prov.domain_post AS domain,
        post_prov.company_name AS CSName,
        post_prov.company_location AS CSLocation,
        post_prov.job_position AS Job,
        post_prov.f_salary AS salary,
        post_prov.job_requirements AS jobReq,
        post_prov.start_date_provider AS date,
        post_prov.TimestampProvider AS timestamp,
        'provider' AS type,
        users.profile_pic_user AS profile_pic_user,
        users.gender_usr AS gender_usr
    FROM post_prov
    LEFT JOIN users ON post_prov.userID_prov = users.id_user
        UNION
        SELECT
    post_seekers.post_id AS post_id,
    post_seekers.userID_seek AS id_user,
    post_seekers.funame_seek AS name,
    post_seekers.domain_post AS domain,
    post_seekers.school_seeker AS CSName,
    post_seekers.degree_seeker AS CSLocation,
    post_seekers.job_position AS Job,
    post_seekers.salary_job AS salary,
    post_seekers.job_spec AS jobReq,
    post_seekers.start_date_seeker AS date,
    post_seekers.TimestampSeeker AS timestamp,
    'seeker' AS type,
    users.profile_pic_user AS profile_pic_user,
    users.gender_usr AS gender_usr
FROM post_seekers
LEFT JOIN users ON post_seekers.userID_seek = users.id_user
        ORDER BY timestamp DESC";
        break;

    default:
    $sql = "(
        (SELECT
        post_seekers.post_id AS post_id,
        post_seekers.userID_seek AS id_user,
        post_seekers.funame_seek AS name,
        post_seekers.domain_post AS domain,
        post_seekers.school_seeker AS CSName,
        post_seekers.degree_seeker AS CSLocation,
        post_seekers.job_position AS Job,
        post_seekers.salary_job AS salary,
        post_seekers.job_spec AS jobReq,
        post_seekers.start_date_seeker AS date,
        post_seekers.TimestampSeeker AS timestamp,
        'seeker' AS type,
        users.profile_pic_user AS profile_pic_user,
        users.gender_usr AS gender_usr
    FROM post_seekers
    LEFT JOIN users ON post_seekers.userID_seek = users.id_user
        WHERE 
            domain_post = '" . $_SESSION["Type"] . "')
        UNION
        (SELECT
        post_prov.post_id AS post_id,
        post_prov.userID_prov AS id_user,
        post_prov.funame_prov AS name,
        post_prov.domain_post AS domain,
        post_prov.company_name AS CSName,
        post_prov.company_location AS CSLocation,
        post_prov.job_position AS Job,
        post_prov.f_salary AS salary,
        post_prov.job_requirements AS jobReq,
        post_prov.start_date_provider AS date,
        post_prov.TimestampProvider AS timestamp,
        'provider' AS type,
        users.profile_pic_user AS profile_pic_user,
        users.gender_usr AS gender_usr
    FROM post_prov
    LEFT JOIN users ON post_prov.userID_prov = users.id_user
        WHERE 
            domain_post = '" . $_SESSION["Type"] . "')
    )
    ORDER BY timestamp DESC";
        break;
}

$result = $connect->query($sql);

$output = ''; // Initialize an empty string to accumulate posts

// JavaScript code to limit the description to 100 characters
/*echo '<script>
    function limitDescription(description, maxLength, postId) {
        if (description.length > maxLength) {
            const trimmedText = description.substring(0, maxLength).trim();
            document.getElementById("postDescription" + postId).textContent = `${trimmedText}...`;
        }
    }
</script>';*/

// Your HTML code
if ($result->num_rows > 0) {
    // Fetch and print the records
    while ($row = $result->fetch_assoc()) {
    // Extract data from PHP to JavaScript variables for each row
    $id_user = isset($row['id_user']) ? htmlspecialchars($row['id_user']) : null;
    $type = isset($row['type']) ? htmlspecialchars($row['type']) : null;
    $post_id = isset($row['post_id']) ? htmlspecialchars($row['post_id']) : null;

    if ($id_user === null || $type === null || $post_id === null) {
        // One of the essential variables is null, break out of the loop
        break;
    }

        if (isset($row['profile_pic_user'])) {
            $profile_pic = htmlspecialchars($row['profile_pic_user']);
        } else {
            // Set default profile picture based on gender, or use a generic default image
            $default_image_url = 'https://www.shutterstock.com/image-vector/default-avatar-profile-icon-social-600nw-1677509740.jpg';
        
            // Assuming you have a gender field in your user table
            if ($row['gender_usr'] == "female") {
                $profile_pic = 'https://cdn.vectorstock.com/i/preview-1x/29/08/avatar-10-vector-37332908.jpg';
            } elseif ($row['gender_usr'] == "male") {
                $profile_pic = 'https://media.istockphoto.com/id/1397556857/vector/avatar-13.jpg?s=612x612&w=0&k=20&c=n4kOY_OEVVIMkiCNOnFbCxM0yQBiKVea-ylQG62JErI=';
            } else {
                // Handle other gender options if needed
                $profile_pic = $default_image_url;
            }
        }
        
    $Domain = isset($row['domain']) ? htmlspecialchars($row['domain']) : '';
    $Salary = isset($row['salary']) ? htmlspecialchars($row['salary']) : '';
    $Name = isset($row['name']) ? htmlspecialchars($row['name']) : '';
    $JPosition = isset($row['Job']) ? htmlspecialchars($row['Job']) : '';
    $JSpec = isset($row['jobReq']) ? htmlspecialchars($row['jobReq']) : '';
    $CSName = isset($row['CSName']) ? htmlspecialchars($row['CSName']) : '';
    $CSdegree = isset($row['CSLocation']) ? htmlspecialchars($row['CSLocation']) : '';
    $date = isset($row['date']) ? htmlspecialchars($row['date']) : '';
    $Timestamp = isset($row['timestamp']) ? htmlspecialchars($row['timestamp']) : '';
        
        if ($type == 'seeker') {
            $direction = "seekpost.php";
        } else {
            $direction = "provpost.php";
        }
        $photo_domain = "";
        switch ($Domain) {
            case 'Design':
                $photo_domain = "https://res.cloudinary.com/cloudinary-marketing/images/w_1540,h_847/f_auto,q_auto/v1649718802/Web_Assets/blog/auto_everything_post/auto_everything_post-jpg?_i=AA";
                break;
            case 'IT':
                $photo_domain = "https://www.mhhealthcare.com/wp-content/uploads/2019/02/iStock-808157346.jpg";
                break;
            case 'Government and Public Service':
                $photo_domain = "https://resources.nejmcareercenter.org/wp-content/uploads/ExploringPublicServicePhysicianPractices.jpg";
                break;
            case 'Business and Management':
                $photo_domain = "https://cdn.educba.com/academy/wp-content/uploads/2019/04/Career-in-Business-Management-1.jpg";
                break;
            case 'Medical field':
                $photo_domain = "https://www.gethow.org/wp-content/uploads/2016/12/medical.jpg";
                break;
            case 'Healthcare':
                $photo_domain = "https://teambuilding.com/wp-content/uploads/2023/01/team-building-ideas-for-healthcare-professionals.jpg";
                break;
            case 'Education':
                $photo_domain = "https://www.himama.com/blog/wp-content/uploads/2018/12/header_tompic.png";
                break;
            case 'Engineering':
                $photo_domain = "https://miro.medium.com/v2/resize:fit:870/1*uZteELzHfg996pgUw9CtsQ.jpeg";
                break;
            case 'Finance':
                $photo_domain = "https://studyworkgrow.com.au/wp-content/uploads/2021/03/FInancial-Manager.png";
                break;
            case 'Marketing':
                $photo_domain = "https://pathstream.com/wp-content/uploads/Blog-Post-Templates-79.png";
                break;
            case 'Arts and Entertainments':
                $photo_domain = "https://www.dailyartmagazine.com/wp-content/uploads/2021/08/Wassily-Kandinsky-Composition-8-1923.jpeg";
                break;
        }
    $output .= '                            
    <div class="col-md-4 grid-item">
    <div class="card">
        <a href='.$direction.' style="cursor: pointer;">
            <img
                onclick="setPostIdCookie('.$post_id.')" style="cursor: pointer;"
                class="img-fluid"
                src='.$photo_domain.'
                alt="'.$Domain.'"
            />
        </a>
        <div class="card-block">
            <h2 class="card-title">
                <a 
                onclick="setPostIdCookie('.$post_id.')"
                href='.$direction.'
                    >'.$JPosition.'</a
                >
            </h2>
            <h4 class="card-text" id="postDescription'.$post_id.'">
            '.$Name.' from '.$CSName.' of the level '.$CSdegree.'  is looking for a '.$JPosition.' position in the domain of '.$Domain.' with specifications:  '.$JSpec.' and a salary: '.$Salary.'DA.
            </h4>
            <div class="metafooter">
                <div class="wrapfooter">
                    <span class="meta-footer-thumb">
                        <a href="otherviewprofile.php" onclick="setUserIdCookie('.$id_user.')" style="cursor: pointer;">
                        <img
                            class="author-thumb"
                            src='.$profile_pic.'
                            alt="'.$Name.'"
                        />
                    </span>
                    <span class="author-meta" href="otherviewprofile.php" onclick="setUserIdCookie('.$id_user.')" style="cursor: pointer;">
                    <span class="post-name"><a target="_blank" onclick="setUserIdCookie('.$id_user.')" href="otherviewprofile.php">'.$Name.'</a></span><br />
                    <span class="post-date">'.$date.'</span>
                    </span>
                    <span class="post-read-more">
                        <a
                            href="otherviewprofile.php" onclick="setUserIdCookie('.$id_user.')" style="cursor: pointer;"
                            title="Read Story"
                            ><i
                                class="fa fa-link"
                            ></i
                        ></a>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>';


        // Call JavaScript function to limit description
        //$output .= '<script>limitDescription("' . addslashes($row['jobReq']) . '", 100, ' . $row['post_id'] . ')</script>';
    }

    // Close the database connection after using the data
    $result->free_result();
    $connect->close();
}

// Output the accumulated HTML posts
echo $output;
?>




