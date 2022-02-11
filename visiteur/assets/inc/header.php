</head>
<body>
  <header>
      <!-- ----------------NAV BAR------------------------ -->
      <nav class="navbar navbar-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand"></a>
          <button class="bg-light navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- ----------------NAV MENU DEPLIANT------------------------ -->
          <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-1">
                    <?php if($_SESSION['statut'] ==0){ 
                      
                      echo '<li class="nav-item"><h3>' . $_SESSION["nom"] . ' ' . $_SESSION["prenom"] . '</h3></li>';
                      echo '<li class="nav-item"><h5>' . $_SESSION["email"] . '</h5></li>';
                      echo '<li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">ACCUEIL</a>
                      </li>';
                      echo '<li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="mon_compte.php">Mon compte</a>
                      </li>';
                      echo '<li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="assets/core/deconnexion.php">Se déconnecter</a>
                      </li>';
                    }else{echo
                      '<li class="nav-item">
                      <a class="nav-link" aria-current="page" href="connect.php">Se connecter</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="inscription_form.php">S\'inscrire</a>
                      </li>';
                    }
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">Nous contacter</a>
                    </li>
                  </li>
                </ul>
              </div>
            </div>
            </div>
          </div>
        </nav>
        
    </div>
    
  </header>
  <?php
  ?>