<?php

  // GETS THE DATA OF THE IMAGE AND DECODES IT.
  $data =  $_POST["imageData"];
  if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
    $data = substr($data, strpos($data, ',') + 1);
    $type = strtolower($type[1]); // jpg, png, gif

    if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
        throw new \Exception('invalid image type');
    }

    $data = base64_decode($data);

    if ($data === false) {
      throw new \Exception('base64_decode failed');
      }
  } else {
    throw new \Exception('did not match data URI with image data');
  }


  // SAVING THE DATA IN THE PNG FILE
  $myfile = fopen("newfile.png", "w") or die("Unable to open file!");
  fwrite($myfile, $data);
  fclose($myfile);



  //THESE ARE THE LOCATIONS OF CLOTHES
  $urls = $_POST['urlsOfClothes'];

  //you can check how they look by uncommenting this
          /*foreach($urls as $url){
              echo $url;
            }*/
?>
