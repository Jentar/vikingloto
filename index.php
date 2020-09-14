<?php 
  print_r($_REQUEST);

  $showManualNumbers = false;

  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

  $game = filter_input(INPUT_POST, 'game', FILTER_SANITIZE_STRING);
  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

  if (isset($action)) {
    if (empty($email)) {
      echo 'email not valid';
    }

    if ($game == 'automatic') {
      //generate 6 number
      //rand(1,48);
      $randomNumbers = array_rand(range(1, 48), 6);

      print_r($randomNumbers);
    } else {
      $showManualNumbers = true;
    }
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <form method="POST">
        <div class="col-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="type" class="form-control" id="exampleInputPassword1" name="name">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="age">
            <label class="form-check-label" for="exampleCheck1">Older 16</label>
          </div>
          <div class="form-group form-check">
            <input type="radio" class="" name="game" value="manual"> manual

            <input type="radio" class="" name="game" value="automatic"> automatic
          </div>
        </div>
        <div class="col-8">
          <?php if ($showManualNumbers) : ?>

              <?php foreach (range(1, 48) as $number) : ?>
                <input type="checkbox" name="number[]" value="<?php echo $number ?>"> <?php echo $number ?>
              <?php endforeach; ?>

          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="start">Submit</button>
      </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>