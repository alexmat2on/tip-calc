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
      $is_valid_sbt = is_numeric($_POST["subtotal"]) && $_POST["subtotal"] >= 0;
      if (!$is_valid_sbt) 
	echo "<p style='color:#ff0000;'> Bill subtotal: $<input type='text' name='subtotal' value='$_POST[subtotal]' style='color:#ff0000;'></p>";
      else 
	echo "<p> Bill subtotal: $<input type='text' name='subtotal' value='$_POST[subtotal]'></p>";
      echo "Tip Percentage:<br><p>";
      $percents = 10;
      for ($x = 0; $x < 3; $x++) {
      if($percents == $_POST["percentage"]) $output = "<input type='radio' name='percentage' value='$percents' checked> $percents&#37;";
      else $output = "<input type='radio' name='percentage' value='$percents'> $percents&#37;";
      echo $output;
      $percents += 5;
    }
    echo "</p>";
    
    if ($is_valid_sbt) { 
    	$tip = $_POST["subtotal"]*$_POST["percentage"]/100;
    	$total = $tip + $_POST["subtotal"];
    	echo "<p>Tip: &#36;$tip<br>Total: &#36;$total</p>";
    }
    ?>
    <input type="submit" value="Submit">
</body>
</html>
