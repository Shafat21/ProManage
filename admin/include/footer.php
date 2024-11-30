<?php
require_once('../assets/constants/check-login.php');

require_once('../assets/constants/config.php');
require_once('../assets/constants/fetch-my-info.php');

$sql = "SELECT * FROM manage_website where status='0'";
$statement = $conn->prepare($sql);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
extract($row); ?>

<style>
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
  }
</style>
<div class="footer">
  Copyright © 2024 Project Development by <a href="https://github.com/Shafat21">Shafat</a> and <a href="https://github.com/CodeWizardOve">Ove</a>
</div>
</body>

</html>
