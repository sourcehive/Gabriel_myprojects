<?php

session_start();
$link = mysqli_connect("localhost", "root", "", "twitter1");


if (mysqli_connect_error()) {

 print_r(mysqli_connect_error());
exit();

}

if ($_GET['function'] == "Logout") {


session_unset();


}

function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}

  function displayTweets($type) {

    global $link;
   if ($type == 'public') {

     $whereClause = "";


   }
  
   $query = "SELECT * FROM tweets".$whereClause." ORDER BY 'datetime'  DESC LIMIT 10";
   $result = mysqli_query($link, $query);

   if (mysqli_num_rows($result) == 0) {

     echo "there are no Tweets to display";

   } else {

       while ($row = mysqli_fetch_assoc($result)) {
         
        $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
         $userQueryResult = mysqli_query($link, $userQuery);
         $user = mysqli_fetch_assoc($userQueryResult);
         
        echo "<div class ='tweet'><p>" .$user['email']."<span class='time'>".time_since(time() - strtotime($row['datetime']))." ago</span>;
        </p>";

        echo "<p>".$row ['tweets']."</p>";

        echo "<p>Follow</p></div>";


       }

   }

  }

   function displaySearch() {
    
    echo '<form class="form-inline">
  <div class="form-group">
    <input type="text"  class="form-control" id="search" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-primary">Search Tweets</button>
</form>';
    
   }
   
   function displayTweetBox() {
        
    if ($_SESSION['id'] > 0) {
        
        echo '<form  class="form"
      <div class="form-group">

<textarea class="form-control" id="tweetContent"></textarea>
</div>
<button type="submit" class="btn btn-primary">Post Tweet</button>
</form>';
        
        
    }
    
    
}
    
    
    



?>