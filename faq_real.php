

<?php
$mysqli = require "database.php" ;
if($mysqli->connect_error)
{
    die("connection error : " . $mysqli->connect_error);
}
$sql = "SELECT * FROM testimonials ";
$result = $mysqli->query($sql);

$faqs = [];

if($result->num_rows >0)
{
    while($row = $result->fetch_assoc()){
        $faqs[] = [
            
            'content' => $row['content_message'],
           
        ];
    }
}
else {
    echo "there are no messages in the database , thank you ";
}

$mysqli->close();

foreach ($faqs as $faq) {

  echo ' 
  <div class="one-question">
      <div class="question-div">
        
        <h1 style="font-size:20px;">'. $faq['content'] .'</h4>
      </div>
      <div class="buttons">
      <form action="delete_faq_real.php" method="post">
          <input type="hidden" name="id" value="' .$faq['content'] . '">
          <input type="submit" name="delete_user" class="delete-question1"  value="Delete">
      </form>
  </div>
</div>';


  
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
<style>
    .one-question{
      width : 70%;
      margin-left: 20%;
    }
</style>
</html>

