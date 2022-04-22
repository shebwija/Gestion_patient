<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid"  style="background-color: blue;">
          <a class="navbar-brand" href="#">
            <img src="image/clin.jpg" style="height: 10vh;" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item" style=" margin-right: 35px; margin-left: 50px; text-align: center;">
                <a class="nav-link" style="color: red; font-size: 20px;width: 200px;" href="index.php">
                  <button type="button" class="btn btn-outline-light" style="width: 100%; height: 40px; ">ACCUEIL</button>
                </a>
              </li>
              <li class="nav-item" style=" margin-right: 35px; margin-left: 50px; text-align: center;">
                <a class="nav-link" style="color: red; font-size: 20px;width: 200px;" href="pages/ajouter_pat.php">
                  <button type="button" class="btn btn-outline-light" style="width: 100%; height: 40px; ">AJOUTER</button>
                </a>
              </li>
              <li class="nav-item" style=" height: 60px; margin-right: 35px;margin-left: 30px; text-align: center;">
                <a class="nav-link" style="color: black; font-size: 20px; width: 200px;" href="pages/liste_pat.php">
                  <button type="button" class="btn btn-outline-light" style="width: 100%; height: 40px; ">LISTE</button>
                </a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" id="myInput" onkeyup="myFunction()" type="search" aria-label="Search">
              <button class="btn btn-outline-light" style="background-color: rgb(74, 15, 236);" type="submit">Recherche</button>
            </form>
          </div>
        </div>
      </nav>