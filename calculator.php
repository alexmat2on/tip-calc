<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Tip Calculator</title>
  <link rel="stylesheet" href="css/styles.css?v=1.0">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
  <h1> Tip Calculator </h1>
  <form action="calculator.php" method="post">
  <?php
      $form_sbt = $_POST["subtotal"];
      if (is_numeric($_POST["percentage"])) $form_per = $_POST["percentage"];
      else $form_per = $_POST["custom"];

      $is_valid_sbt = is_numeric($form_sbt) && $form_sbt > 0;
      $is_valid_per = is_numeric($form_per) && $form_per > 0;

      if (!$is_valid_sbt)
	     echo "<p style='color:#ff0000;'> Bill subtotal: $<input type='text' name='subtotal' value='$form_sbt' style='color:#ff0000;'></p>";
      else
	     echo "<p> Bill subtotal: $<input type='text' name='subtotal' value='$form_sbt'></p>";

      if (!$is_valid_per) {
        echo "<p style='color:#ff0000;'>Tip Percentage:<br><p style='color:#ff0000;'>";
        $percents = 10;
        for ($x = 0; $x < 3; $x++) {
          if($percents == $form_per) $output = "<input type='radio' name='percentage' value='$percents' checked> $percents&#37;";
          else $output = "<input type='radio' name='percentage' value='$percents'> $percents&#37;";
          echo $output;
          $percents += 5;
        }
        echo "<br>";
        if($_POST["percentage"] == "custom")
          echo "<input type='radio' name='percentage' value='custom' checked>Custom: <input type='text' name='custom' style='width: 30px; color: #ff0000;' value='$form_per'> %";
        else
          echo "<input type='radio' name='percentage' value='custom'>Custom: <input type='text' name='custom' style='width: 30px;''> %";
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
          echo "<input type='radio' name='percentage' value='custom' checked>Custom: <input type='text' name='custom' style='width: 30px;' value='$form_per'> %";
        else
          echo "<input type='radio' name='percentage' value='custom'>Custom: <input type='text' name='custom' style='width: 30px;''> %";
        echo "</p></p>";
      }

      if ($is_valid_sbt && $is_valid_per) {
    	   $tip = $form_sbt*$form_per/100;
    	   $total = $tip + $form_sbt;
    	   echo "<p>Tip: &#36;$tip<br>Total: &#36;$total</p>";
      }
  ?>
    <input type="submit" value="Submit">
</body>
</html>
