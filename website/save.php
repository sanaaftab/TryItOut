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

  //  WE ONLY NEED TO SAVE $data in the file
        //these 2 dont work
        //file_put_contents("img.{$type}", $data);

        //file_put_contents("img.txt", "me");

        /*  DOESNT WORK FOR SOME REASON (error: unable to open file)
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $txt = "John Doe\n";
        fwrite($myfile, $txt);
        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);
        fclose($myfile);
        */


  //These are the locations of clothes
  $urls = $_POST['urlsOfClothes'];

  //you can check how they look by uncommenting this
          /*foreach($urls as $url){
              echo $url;
            }*/
?>
