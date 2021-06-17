<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>TSF Bank</title>
    <style>
    </style>
  </head>
  <body>
    <!--navbar-->
    <?php
    include 'navbar.php';
    ?>
    <!---About the bank --->
    <section id="intro" class="d-flex justify-content-md-evenly flex-column-reverse align-items-center flex-md-row">
      <div class="d-flex justify-content-sm-center flex-column align-items-center flex-md-column justify-content-md-start align-items-md-start">
        <br>
        <h2>Welcome to </h2><br>
        <div class="">
          <button id="TSF">
            TSF Bank
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div><br>
        <div class="text-effect">
          <h4 id="tagline" class="d-flex justify-content-end">-We listen. You prosper.</h4>
        </div>
      </div>
      <div id="logo" class="d-md-none w-50 h-50">
        <img src="bank.png" alt="Profile Picture" class="w-100 h-100 rounded-circle shadow bg-body rounded">
      </div>
      <div class="d-md-block d-none w-25 h-25">
        <img src="bank.png" alt="Profile Picture" class="w-100 h-100 rounded-circle shadow bg-body rounded">
      </div>
    </section>
    <!---footer--->
    <div>
      <?php
      include 'footer.php';
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
  </body>
</html>
