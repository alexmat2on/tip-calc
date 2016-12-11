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
  <form action="calculator.php" method="post"> Bill subtotal: $<input type="text" name="subtotal"><br><br>
    Tip Percentage:<br>
    <?php $percents = 10;
      for ($x = 0; $x < 3; $x++) {
      echo "<input type='radio' name='percentage' value='$percents'> $percents&#37;";
      $percents += 5;
      }
      $tip = $_POST["subtotal"]*$_POST["percentage"]/100;
      $total = $tip + $_POST["subtotal"];
      echo "<br><br>Tip: &#36;$tip<br>Total: &#36;$total";
    ?><br><br>
    <input type="submit" value="Submit">
</body>
</html>
