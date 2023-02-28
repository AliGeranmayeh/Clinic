<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <style>
      .hideMeAfter5Seconds {
        animation: hideAnimation 0s ease-in 5s;
        animation-fill-mode: forwards;
      }

      @keyframes hideAnimation {
        to {
          visibility: hidden;
          width: 0;
          height: 0;
        }
      }
   </style>
   
  </head>
  <body>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Clinc</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
      <div>
      <ul class = navbar-nav>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
      </div>
      <div></div>
      <div>
        <?php if (!clinic\core\Application::$app->user) : ?>
          <ul class = navbar-nav>
            <li class="nav-item ">
              <a class="nav-link" aria-current="page" href="/login">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">sign up</a>
            </li>
          </ul>
        <?php else: ?>
          <ul class = navbar-nav>
            <li class="nav-item ">
              <a class="nav-link" href="/logout">Welcome <?php echo clinic\core\Application::$app->user->displayUser()?> (logout)</a>
            </li>
          </ul>
       <?php endif; ?> 
      </div>
    </div>
  </div>
</nav>


    <div class="container">
      <?php if (clinic\core\Application::$app->session->getFlash('seccess') != false): ?>
        <div class="alert alert-success hideMeAfter5Seconds" role="alert">
            <?php echo clinic\core\Application::$app->session->getFlash('seccess') ?>
        </div>
        <?php endif; ?>
        {{content}}
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>