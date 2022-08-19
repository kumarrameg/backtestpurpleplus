<!-- db name :: backtestpairs -->



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BACKTEST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <br>
      <br>
      <a href="dashboard.html" class="btn btn-danger" role="button">Details Results</a>
      <br>
      <br>
      <form method="post" action="insertdb.php">
        <div class="form-group">
          <input type="date" name="currentdate">
        </div>
        <div class="form-group">
          <textarea class="form-control" name="signalresults" rows="21" id="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit-btn" value="submit">Submit</button>
      </form>
    </div>
  </body>
</html>