

<?php
$mysqli = require "database.php" ;
if($mysqli->connect_error)
{
    die("connection error : " . $mysqli->connect_error);
}
$sql = "SELECT * FROM contact_us ";
$result = $mysqli->query($sql);

$faqs = [];

if($result->num_rows >0)
{
    while($row = $result->fetch_assoc()){
        $faqs[] = [
            'name_usr' => $row['sender_name'],
            'content' => $row['msg_content'],
            'subject' =>$row['msg_subject'],
        ];
    }
}
else {
    echo "there is no FAQs in the database , thank you ";
}

$mysqli->close();

foreach ($faqs as $faq) {
    echo '
    <div class="one-question">
        <div class="question-div">
            <h1 style="font-size:20px;">'.htmlspecialchars($faq['name_usr']) .'</h1>'.
            '<h4>'.htmlspecialchars($faq['subject']) .'</h4> 
            <span class="question-content">' . $faq['content'] .'</span>
        </div>
        <div class="buttons">
            <div>
                <button class="answer"><a style="color: white; text-decoration : none"  href="mailto:nesrine.bouzid@ensia.edu.dz">Answer</a>
                </button>
            </div>
            <form action="delete_faq.php" method="post">
                <input type="hidden" name="id" value="' .$faq['content'] . '">
                <input type="submit" name="delete_user" class="delete-question1"  value="Delete">
            </form>
        </div>
    </div>' ;

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>


</html>

