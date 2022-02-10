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
                      echo '<li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">ACCUEIL</a>
                      </li>';
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
        
<!-- ----------------FORMULAIRE Filtres pour reservation------------------------ -->
<div id="filtres">
  <div class="agence text-white">
    <!-- ----------------FILTRE AGENCE------------------------ -->
      <form action="index.php" method='POST' onChange="submit()">
        Adresse de départ : <br>
        <?php
          $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', '');
          $sql = "SELECT  id_agence, titre FROM agence;";
          $requete = $bdd->prepare($sql);
          $requete->execute();
          $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
          if(isset($_POST['id_agence'])){
            foreach($resultat as $id){
              if($_POST['id_agence']==$id['id_agence']){
                $_SESSION['id_agence']=$id['id_agence'];
                $_SESSION['agence']=$id['titre'];
              }else if (($_POST['id_agence']==0)){
                $_SESSION['id_agence']= 0;
                $_SESSION['agence']="";
              }
            }
          }
          ?>
        <select name="id_agence" id="id_agence">
          <option name="agence">Choisissez une agence</option>';
          <?php
              foreach($resultat as $agence){
                echo '<option name="agence" value="' .$agence["id_agence"] . '">'.$agence["titre"].'</option>';}
                ?>
          <option name="id_agence" value="0">Toutes les agences</option>';
        </select>
      </form>
    </div>
    <!-- ----------------FILTRE Date Debut------------------------ -->
    <div class="date_debut text-white">
        <form action="index.php" method='POST' onChange="submit()">
          Début de loacation : <br>
          <input type="date" name="date_depart" id="date_depart"
          value="<?php if(isset ($_POST['date_depart'])){
                    echo $_POST['date_depart'];
                    $_SESSION['date_depart']=$_POST['date_depart'];
                    } ?>">
          <input type="time" name="heure_depart" id="heure_depart"
          value="<?php if(isset ($_POST['heure_depart'])){
            echo $_POST['heure_depart'];
                    $_SESSION['heure_depart']=$_POST['heure_depart'];
                    } ?>">
        </div>
      </form>
      <!-- ----------------FILTRE Date fin------------------------ -->
      <div class="date_fin text-white">
        <form action="index.php" method='POST' onChange="submit()">
          Fin de location : <br>
          <input type="date" name="date_fin" id="date_fin"
          value="<?php if(isset ($_POST['date_fin'])){
            echo $_POST['date_fin'];
                    $_SESSION['date_fin']=$_POST['date_fin'];
                  } ?>">
          <input type="time" name="heure_fin" id="heure_fin"
          value="<?php if(isset ($_POST['date_fin'])){
            echo $_POST['date_fin'];
            $_SESSION['date_fin']=$_POST['date_fin'];
          } ?>">
        </form>
      </div>
      <input type="submit" class="valider text-white" value="Valider un véhicule">
      
    </div>
    
  </header>