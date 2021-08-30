<?php

require_once 'InstagramDownload/src/InstagramDownload.php';
use Ayesh\InstagramDownload\InstagramDownload;

$error_condition = false;
$error_msg = '';

if(isset($_POST["btn-url"])) {
  $url_user = $_POST["inpt-url"];
  try {
    $client = new InstagramDownload($url_user);
    $url = $client->getDownloadUrl();
    $type = $client->getType(); 
    header("Location: ".$url);
  }
  catch (\InvalidArgumentException $exception) {
    $error_condition = true;
    $error_msg = $exception->getMessage();
  }
  catch (\RuntimeException $exception) {
    $error_condition = true;
    $error_msg = $exception->getMessage();
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <title>Download Url</title>
</head>
<body>
  <div class="container">
    <div class="row d-block">
      <h1 class="text-center mt-3 mb-2">INSTAGRAM DOWNLOADER</h1>
      <form action="" method="post" class="mt-3 mb-2">
        <input type="text" class="form-control <?php if($error_condition == true): ?>is-invalid<?php endif; ?>" id="judul" name="inpt-url" placeholder="Enter Url..." autocomplete="off" autofocus>
        <div class="invalid-feedback">
            <?= $error_msg ?>
        </div>
        <button class="mt-3 btn-block btn-user float-right btn btn-primary" type="submit" name="btn-url">Download</button>
      </form>
    </div>
  </div>
    
  <!-- SCRIPT JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>