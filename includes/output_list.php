<?php
require_once 'require/functions.php';
require_once 'require/connect.php';

$result = get_all_info("SELECT * FROM `Staff`");

if ($result->num_rows > 0) {
  echo "<div class='output_list'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $userId = htmlspecialchars($row['id'],ENT_QUOTES);
        $imageURL = htmlspecialchars($row['imageURL'],ENT_QUOTES);
        $NameOfStaffMember = htmlspecialchars($row['NameOfStaffMember'],ENT_QUOTES);

      echo "<div class='individual'>
            <p><span>ID: </span>$userId</p>
          <p><span>Username: </span><img src='$imageURL' class='image_db'></p>
          <p><span>Password: </span>$NameOfStaffMember</p>
        </div>";
    }
    echo "</div>";
} else {
    echo "0 results";
}

?>