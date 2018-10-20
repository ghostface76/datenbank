<?php
require_once('inc/klassen_inc.php');
//NOTE, INFO, IDEA, DEBUG, REMOVE, OPTIMIZE, REVIEW, HACK, UNDONE, TO DO, REFACTOR, DEPRECATED, TASK, CHGME, NOTREACHED, WTF, BUG, ERROR, OMG, ERR, OMFGRLY, WARNING, WARN and BROKEN
?>
<!DOCTYPE html>
<html lang="de">

  <head>
      <?php echo $meta->Headangaben(); ?>
  </head>



  <body>

    <section>
      <!--NOTE: Suchformular -->
      <form class="form-inline m-5" action="index.php" method="post">
        <input class="form-control form-control-sm mr-3 w-25"
               id="suche"
               name="suche"
               type="text"
               placeholder="Suche"
               value=""
               aria-label="Search">
        <i class="fa fa-search" aria-hidden="true"></i>
      </form>


    </section>


<?php
// Datenbankverbindung
require 'inc/conn.php';
//$conn->verbindenDatenbank();
// Suchformular auswerten

if (isset($_REQUEST['suche']))
{
  echo "gesuchten Daten werden ausgegeben";
  $suchwort = $_REQUEST['suche'];
// TODO: ausgabe formatieren
//Abfrage zusammenbauen mit Parameter, der übergeben werden soll (?)
  $statement = $pdo->prepare
          ("SELECT *
        FROM mythings
        WHERE bezeichnung LIKE :bezeichnung");

  $statement->execute(array('bezeichnung' => "%$suchwort%"));
  echo "<div class='row'>";

  //
  while ($row = $statement->fetch())
  {
    echo $row['bezeichnung'];
    ?>
        <!-- Card -->
        <div class="card">
          <!-- Card image -->
          <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">

          <!-- Card content -->
          <div class="card-body">

            <!-- Title -->
            <h4 class="card-title"><a><?php echo $row['bezeichnung']; ?></a></h4>
            <!-- Text -->
            <p class="card-text"><?php echo $row['beschreibung']; ?></p>
            <p><strong>ausleihbar: </strong><?php echo $row['status']; ?></p>
            <!-- Button -->
            <a href="#" class="btn btn-primary">Button</a>

          </div>

        </div>
        <!-- Card -->

    <?php
  }

  echo "</div>";
  /* echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>"; */
}



// Abfrage erstellen
$sql = "SELECT * FROM mythings";
// Abfrage in Objekt speichern
$ausgabe = $pdo->query($sql);
?>
    <div class="row">
    <?php foreach ($ausgabe as $row)
    { ?>

        <!-- Card -->
        <div class="card">
          <!-- Card image -->
          <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">

          <!-- Card content -->
          <div class="card-body">

            <!-- Title -->
            <h4 class="card-title"><a><?php echo $row['bezeichnung']; ?></a></h4>
            <!-- Text -->
            <p class="card-text"><?php echo $row['beschreibung']; ?></p>
            <p><strong>ausleihbar: </strong><?php echo $row['status']; ?></p>
            <!-- Button -->
            <a href="#" class="btn btn-primary">Button</a>

          </div>

        </div>
        <!-- Card -->

<?php } ?>

      <!-- Material form subscription -->
      <!-- NOTE: Neuen Artikel einfügen-->
      <div class="card">

        <h5 class="card-header info-color white-text py-4">
          <strong>Neues Ding einfügen</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-4">

          <!-- Form -->
          <form action="index.php"
                method="post"
                class=""
                style="color: #757575;"

                >

            <!-- Bezeichnung -->
            <div class="md-form mt-3">
              <input type="text"
                     name="bezeichnung"
                     id="bezeichnung"
                     class="form-control" required>
              <label for="bezeichnung">Bezeichnung</label>
            </div>

            <!-- Beschreibung -->
            <div class="md-form">
              <i class="fa fa-pencil prefix"></i>
              <textarea name="name"
                        rows="1"
                        cols="10"
                        type="text"
                        class="md-textarea form-control">
              </textarea>
              <label for="beschreibung">Beschreibung</label>
            </div>



            <div class="md-form mt-3">
              <input type="text"
                     id=""
                     class="form-control"
                     name="zustand">
              <label for="zustand">Zustand</label>
            </div>

            <div class="md-form mt-3">
              <input type="text"
                     id="status_neu"
                     class="form-control">
              <label for="status_neu">Status</label>
            </div>

            <!-- Datum TODO: Datepicker einfügen -->
            <div class="md-form">
              <input type="date" id="materialSubscriptionFormEmail" class="form-control">
              <label for="materialSubscriptionFormEmail">Verleihdatum</label>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">eintragen</button>

          </form>
          <!-- Form -->

        </div>

      </div>
      <!-- Material form subscription -->
    </div>

    <h2>Ende</h2>

    <pre>
<?php print_r($_REQUEST) ?>
    </pre>

<?php
// TODO eingabe in Datenbank eintragen
// IDEA eingaben verifizieren

if (isset($_REQUEST['bezeichnung']))
{
  echo "neue Daten empfangen";

  $statement = $pdo->prepare("INSERT INTO mythings (bezeichnung)
                             VALUES (?)");
  $statement->execute(array($_REQUEST['bezeichnung']));
}
else
{
  echo "Dinge werden nur angezeigt";
}
?>



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
