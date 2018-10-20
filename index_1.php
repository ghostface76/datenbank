<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>


  <?php
  // Datenbankverbindung


  try
  {
    $pdo = new PDO('mysql:host=localhost;dbname=test_card-ausgabe', 'root', '');
  }

  catch (PDOException $e)
  {
    echo 'Datenbank-Fehler: ' . $e->getMessage();
  }






    $sql = "SELECT * FROM mythings";
    $pdo->query($sql);
  ?>

  <!-- Start your project here-->
  <div style="height: 80vh">
    <div class="flex-center flex-column">
      <h1 class="animated fadeIn mb-4">Material Design for Bootstrap</h1>

      <h5 class="animated fadeIn mb-3">Thank you for using our product. We're glad you're with us.</h5>

      <p class="animated fadeIn text-muted">MDB Team</p>
      <h2>Testauasgabe</h2>
    </div>
  </div>
  <section>
    <?php

      $ausgabe = array('Ding1', 'ding2', 'ding3');
      $ausgabestr = implode(' | ', $ausgabe);
      echo $ausgabestr;

     ?>
     <?php
     var_dump($pdo);
      foreach ($pdo as $row) {
        echo "<pre>";
var_dump($pdo);
        
echo "</pre>";

      }

      ?>

     <pre>
        <?php echo $ausgabestr ?>
     </pre>

     <pre>
        <?php print_r($pdo); ?>
     </pre>


     <?php foreach ($pdo as $key => $value): ?>
       <pre>
         <?php print_r($key, $value); ?>
       </pre>
       echo "$key";
     <?php endforeach; ?>

     <?php

      echo count($pdo);
      //echo $pdo[0];

      ?>


  </section>
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
