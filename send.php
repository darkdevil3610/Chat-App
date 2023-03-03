<?php
  $input = $_POST['msg'];
  $user = $_POST['name'];

  if($user != strip_tags($user) || $input != strip_tags($input) || count(str_split($input)) > 2048 || count(str_split($user)) > 256) {
    header("Location: index.php");
  }
  if($user == strip_tags($user) && $input == strip_tags($input) && count(str_split($input)) <= 2048 && count(str_split($user)) <= 256) {
    if ($input == "") {
      $input = "<br>";
    }
    if ($user == "") {
      $user = "<span class = \"warning\">Anonymus user</span>";
    }

    $inputSpl = explode("**", $input);
    $input = "";
    
    for ($i = 0; $i < count($inputSpl) - 1; $i += 2) {
      $input = $input.$inputSpl[$i]."<b>".$inputSpl[$i + 1]."</b>";
    }
    $input = $input.$inputSpl[count($inputSpl) - 1];
    
    $inputSpl = explode("__", $input);
    $input = "";
    for ($i = 0; $i < count($inputSpl) - 1; $i += 2) {
      $input = $input.$inputSpl[$i]."<i>".$inputSpl[$i + 1]."</i>";
    }
    $input = $input.$inputSpl[count($inputSpl) - 1];

    $inputSpl = explode("\\n", $input);
    $input = "";
    for ($i = 0; $i < count($inputSpl) - 1; $i ++) {
      $input = $input.$inputSpl[$i]."<br>";
    }
    $input = $input.$inputSpl[count($inputSpl) - 1];

    preg_match("/@\w+/", $input, $matches);
    $inputSpl = explode(" ", $input);
    $input = "";
    for ($i = 0; $i < count($inputSpl); $i ++) {
      if ($inputSpl[$i] == $matches[0]) {
        $input = $input."<span class = \"ping\">".$inputSpl[$i]." </span>";
      }
      else {
        $input = $input.$inputSpl[$i]." ";
      }
    }
    
    $myfile = fopen("chat.txt", "a");
    fwrite($myfile, "<br><div class = \"msg\">".gmdate("d-m-Y H:i:s")." UTC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$user."<br>".$input."</div>\n\n");
    fclose($myfile);
    header("Location: index.php");
  }
?>