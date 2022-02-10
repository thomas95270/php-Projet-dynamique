</head>
<body>
    <header>
      <nav class="navbar navbar-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand"></a>
          <button class="bg-light navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-1">
                    <?php if($_SESSION['statut'] ==0){ 
                      echo '<li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="compte.php">Mon compte</a>
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
        
        <div id="filtres">
              <div class="agence text-white">
                Adresse de départ <br>
                
              </div>
              <div class="date_debut text-white">
                debut de location <br>
              </div>
              <div class="date_fin text-white">
                Fin de location <br>
              </div>
              <div class="valider text-white ">
                Valider un véhicule
              </div>
            </div>
        
      </header>