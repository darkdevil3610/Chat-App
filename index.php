<html>
  <head>
    <title>Chat App</title>
    <link rel = "stylesheet" href = "style.css">
    <link rel = "icon" href = "icon.png">
  </head>
  <body>
    <?php 
      function createChat() {
        $myfile = fopen("chat.txt", "w") or die("Error 404");
        $txt = "<div class = \"msg\">".gmdate("d-m-Y H:i:s")."<br>Chat created.</div>";
        fwrite($myfile, $txt);
        fclose($myfile);
      }

      $myfile = fopen("chat.txt", "r") or createChat();
      $myfile = fopen("chat.txt", "r");
      echo "<div id = \"main\"> ".fread($myfile,filesize("chat.txt"))."</div>";
      fclose($myfile);
    ?> 
    <div id = "sendbar">
      <form method = "post" action = "send.php">
        Message: <input type = "text" name = "msg" required><br>
        Username: <input type = "text" name = "name"><br>
        <input type = "submit" name = "submit">
        <button type = "button" onclick = "location.reload();" style = "float:right;margin: 5px;">Check for new messages</button>
      </form>
    </div>

    <!--
    This script places a badge on your repl's full-browser view back to your repl's cover
    page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
    teal, blue, blurple, magenta, pink!
    -->
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>