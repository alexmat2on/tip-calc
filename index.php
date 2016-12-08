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
  <form> Bill subtotal $<input type="text" name="subtotal"><br>
    Tip Percentage:<br>
    <?php $percents = 10;
      for ($x = 0; $x <= 3; $x++) {
      echo '<input type="radio" name="percents" value="$percents"';
      $percents += 5;
    }
    ?>
</body>
</html>
