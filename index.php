<?php
session_start();
require_once './config/db.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
      crossorigin="anonymous"
    />
    
    <title><?php echo 'Bienvenu ici!'; ?></title>
  </head>
  <body>
    <h2 class="text-center text-primary">PHP ajax db fetch options</h2>
    <div class="container p-5">
      <div class="alert alert-success" id="msg" role="alert">
        Success!!
      </div>
      <form id="registerForm">
        <div class="row mb-3">
          <label for="univ_id" class="form-label"
            >Votre universite</label
          >
          <input
            class="form-control"
            list="datalistOptions"
            id="univ_id"
            placeholder="Type to search..."
            name="univ_name"
          />
          <datalist id="datalistOptions">
          <?php
          $req = $conn->prepare('SELECT univ_name FROM phpajaxdb.universites');
          $req->execute();
          $res = $req->fetchAll(PDO::FETCH_ASSOC);
          foreach ($res as $row) { ?>
            <option value="<?php echo $row['univ_name']; ?>"><?php echo $row[
    'univ_name'
]; ?></option>
          <?php }
          ?>
          </datalist>
        </div>
        <button type="button" class="btn btn-success" id="univ_envoie">Ajouter une universite</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#msg').hide();
        $(document).on('click', '#univ_envoie', function(){
          var univ_name = $('#univ_id').val();
          $.ajax({
            url: './traitement.php',
            type: 'POST',
            data: {
              'save':1,
              'univ_name': univ_name
            },
            success: function(res, err){
              $('#univ_id').val('');
              $('#msg').show();

            }
          })
        })
      })
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
