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
  <form action="calculator.php" method="post"><p> Bill subtotal: $<input type="text" name="subtotal"></p>
    <p>Tip Percentage:<br><p>
    <?php $percents = 10;
      for ($x = 0; $x < 3; $x++) {
        if($percents == 15) $output = "<input type='radio' name='percentage' value='$percents' checked> $percents&#37;";
        else $output = "<input type='radio' name='percentage' value='$percents'> $percents&#37;";
        echo $output;
        $percents += 5;
      }
      echo "<br><input type='radio' name='percentage' value='custom'>Custom: <input type='text' name='custom' style='width: 30px;''> %"
    ?></p></p>
    <input type="submit" value="Submit">
</body>
</html>
