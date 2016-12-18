<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Tip Calculator</title>
  <link rel="stylesheet" href="styles.css">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
  <div id="app">
  <h1> Tip Calculator </h1>
  <form action="calculator.php" method="post">
  <?php
      $form_sbt = $_POST["subtotal"];
      if (is_numeric($_POST["percentage"])) $form_per = $_POST["percentage"];
      else $form_per = $_POST["custom"];

      $is_valid_sbt = is_numeric($form_sbt) && $form_sbt > 0;
      $is_valid_per = is_numeric($form_per) && $form_per > 0;

      if (!$is_valid_sbt)
	     echo "<p class='error'> Bill subtotal: $<input type='text' name='subtotal' value='$form_sbt' class='error' id='subtotal'></p>";
      else
	     echo "<p> Bill subtotal: $<input type='text' name='subtotal' value='$form_sbt' id='subtotal'></p>";

      if (!$is_valid_per) {
        echo "<p class='error'>Tip Percentage:<br><p class='error'>";
        $percents = 10;
        for ($x = 0; $x < 3; $x++) {
          if($percents == $form_per) $output = "<input type='radio' name='percentage' value='$percents' checked> $percents&#37;";
          else $output = "<input type='radio' name='percentage' value='$percents'> $percents&#37;";
          echo $output;
          $percents += 5;
        }
        echo "<br>";
        if($_POST["percentage"] == "custom")
          echo "<input type='radio' name='percentage' value='custom' checked>Custom: <input type='text' name='custom' class='error' id='custom' value='$form_per'> %";
        else
          echo "<input type='radio' name='percentage' value='custom'>Custom: <input type='text' name='custom' class='error' id='custom'> %";
        echo "</p></p>";
      }

      else {
        echo "<p>Tip Percentage:<br><p>";
        $percents = 10;
        for ($x = 0; $x < 3; $x++) {
          if($percents == $form_per) $output = "<input type='radio' name='percentage' value='$percents' checked> $percents&#37;";
          else $output = "<input type='radio' name='percentage' value='$percents'> $percents&#37;";
          echo $output;
          $percents += 5;
        }
        echo "<br>";
        if($_POST["percentage"] == "custom")
          echo "<input type='radio' name='percentage' value='custom' checked>Custom: <input type='text' name='custom' id='custom' value='$form_per'> %";
        else
          echo "<input type='radio' name='percentage' value='custom'>Custom: <input type='text' name='custom' id='custom'> %";
        echo "</p></p>";
      }

      if ($is_valid_sbt && $is_valid_per) {
         echo "<div id='answer'>";
    	   $tip = $form_sbt*$form_per/100;
    	   $total = $tip + $form_sbt;
    	   echo "Tip: &#36;$tip<br>Total: &#36;$total</div>";
      }
  ?>
      <p><input type="submit" value="Submit"></p></form>
  </div>
</body>
</html>
