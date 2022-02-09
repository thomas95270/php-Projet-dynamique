<?php
session_start();
include('assets/inc/head.php');
?>
  <title>Veveille - CarShopt</title>

  <?php
include('assets/inc/header.php');
?>

  <div class="card mb-3">
  <img src="src/img/background1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <!---------------------------------nav-bar---------------------------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Adresse de depart
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">debut de la location</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">fin de la location</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Validé un véhicule</a>
        </li>



        
      </ul>

    </div>
  </div>
</nav>
<!---------------------------------nav-bar fin---------------------------------------->
  </div>
</div>

  </header>

  <!--------------------------card------------------------------------->
  <!-----------------------------car-list------------------------------------->
  <div class="container mt-5">
    <div class="col-12">
      <div class="list-car">
        <!------------------------car----------------------------->
        <div class="card mb-5" style="max-width: 950px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="src/img/vehicule1.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-success">Reservez</button>
              </div>
            </div>
          </div>
        </div>
        <!------------------------car----------------------------->
        <div class="card mb-5" style="max-width: 950px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="src/img/vehicule2.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-success">Reservez</button>
              </div>
            </div>
          </div>
        </div>
        <!------------------------car----------------------------->
        <div class="card mb-5" style="max-width: 950px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="src/img/vehicule3.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-success">Reservez</button>
              </div>
            </div>
          </div>
        </div>
        <!------------------------car----------------------------->
        <div class="card mb-5" style="max-width: 950px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="src/img/vehicule4.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <button type="button" class="btn btn-success">Reservez</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-----------------------------car-list------------------------------------->
  <!------------------------------footer-------------------------------------->
  <footer>
    <p class="copy">Cars-location</p>
  </footer>
  <!------------------------------footer-------------------------------------->






  <!------------------------Script---------------------------------->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="src/js/main.js"></script>
</body>

</html>