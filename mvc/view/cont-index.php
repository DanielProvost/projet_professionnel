    <?php
    $accueil = $model->getInfoPage('index');
    $actus = $model->getInfoActu();

// print_r($actus);
    ?>

    <header>
        <div class="video-responsive">
            <h1>L’expertise qui donne du sens !</h1>
            <iframe src="https://player.vimeo.com/video/383086293?autoplay=1&loop=1&background=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <img src="/media/img/bloc-radius.png" class="bloc-radius-header" alt="">
        </div>
    </header>

    <section id="bloc-presentation" class="scrollpoint sp-effect1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h2>Nos services</h2>
                    <div class="offset-lg-2 ul_unset">
                      <?php echo $accueil['texte_left']?>
                    </div>
                </div>

                  <div class="col-12 col-xl-6">
                    <div class="container">
                      <div class="row" id="vign_services">

                          <div class="vignette">
                            <a href="/particuliers">
                              <h3>PARTICULIERS</h3>
                              <img src="media/img/services_particuliers.jpg" class="img-services" alt="Image particuliers">
                              <div class="symbole">+</div>
                            </a>
                          </div>

                          <div class="vignette">
                            <a href="/entreprises">
                              <h3>ENTREPRISES</h3>
                              <img src="media/img/entreprises_services.jpg" class="img-services" alt="Image entreprise">
                              <div class="symbole">+</div>
                            </a>
                          </div>
                        </div>
                      <div class="row justify-content-center">
                        <div class="vignette margin_coll">
                          <a href="/collectivites">
                            <h3>COLLECTIVITÉS</h3>
                            <img src="media/img/collectivites_services.png" class="img-services" alt="Image collectivités">
                            <div class="symbole">+</div>
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>

    </section>

    <?php if(!empty($actus)){ ?>
    <!-- Actualites -->
    <section id="actu">
        <div id="carouselActu" class="carousel slide container scrollpoint sp-effect2" data-ride="carousel">
            <h2 class="col-12 col-md-9 offset-md-3 text-center">Nos actualités</h2>
          <div class="carousel-inner">
            <?php
            $isFirstSlide = true;
            foreach ($actus as $actu):
            ?>

            <div class="carousel-item <?= $isFirstSlide ? 'active' : '' ?>">
                <div class="bloc-actu">
                    <div class="bloc-actu-date"><?=$model->formatDateActu($actu['date'])?></div>
                    <div class="bloc-actu-img">
                        <img src=<?=$actu["img"]; ?> alt="titre actu" class="image_size">

                        <?php if(count($actus) > 1) { ?>
                        <a class="carousel-control-prev" href="#carouselActu" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précedent</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselActu" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                      <?php } ?>

                    </div>
                    <div class="bloc-actu-text">
                        <h4><?=$actu["titre"] ?></h4>
                        <p><?=$actu["resume"] ?></p>
                        <a href="<?=$model->genLink('actualite', $actu['id'], $actu['titre'])?>" class="">En savoir plus</a>
                    </div>
                </div>
            </div>

            <?php
            $isFirstSlide = false;
            endforeach
            ?>
          </div>
        </div>
    </section>
  <?php } ?>
    <!-- Home -->

    <section id="bloc-home" class="scrollpoint sp-effect3">
        <div class="container">
            <div class="row">
                <h2 class="col-12 col-lg-6">Hydratis recrute !</h2>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-1 custom-text">
                  <?php echo $accueil['texte_right']?>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6"><img src="/media/img/home1-1.png" class="img-fluid" alt="Illustration accueil"></div>
            </div>
        </div>
        <div id="home-bloc-right"><img src="/media/img/accueil2-2.png" class="img-fluid" alt="Illustration accueil"></div>
    </section>

    <!-- Metier -->
    <section id="metier">
        <div class="container scrollpoint sp-effect4">
            <img src="/media/img/bg-blue-1.png" class="tache-abs" id="bg-blue-1">
            <h2 class="text-right">Nos métiers</h2>
            <ul class="row" id="list-metier">
                <li class="col-12 col-sm-6">
                    <img src="/media/img/bg-pink-3.png" class="tache-abs" id="bg-pink-3">
                    <a href="services">
                        <figure>
                            <img src="/media/img/previsions-des-crues-1.png" class="img-fluid" alt="Prévisions des crues">
                            <figcaption><h3>Prévisions des crues</h3></figcaption>
                        </figure>
                    </a>
                </li>
                <li class="col-12 col-sm-6">
                    <a href="hydraulique-urbaine">
                        <figure>
                            <img src="/media/img/hydraulique-urbaine-1.png" class="img-fluid" alt="Hydraulique urbaine">
                            <figcaption><h3>Hydraulique urbaine</h3></figcaption>
                        </figure>
                    </a>
                </li>
                <li class="col-12 col-sm-6">
                    <img src="/media/img/bg-pink-4.png" class="tache-abs" id="bg-pink-4">
                    <a href="hydrogeologie">
                        <figure>
                            <img src="media/img/hydrogeologie.png" class="img-fluid" alt="Hydrogéologie">
                            <figcaption><h3>Hydrogéologie</h3></figcaption>
                        </figure>
                    </a>
                </li>
                <li class="col-12 col-sm-6">
                    <a href="hydraulique-fluviale">
                        <figure>
                            <img src="/media/img/hydraulique-fluviale-1.png" class="img-fluid" alt="Hydraulique fluviale">
                            <figcaption><h3>Hydraulique fluviale</h3></figcaption>
                        </figure>
                    </a>
                </li>
                <li class="col-12 col-sm-6">
                    <a href="eau-potable">
                        <figure>
                            <img src="/media/img/eau-potable-1.png" class="img-fluid" alt="Eau potable">
                            <figcaption><h3>Eau potable</h3></figcaption>
                        </figure>
                    </a>
                </li>
                <li class="col-12 col-sm-6">
                    <img src="/media/img/bg-blue-2.png" class="tache-abs" id="bg-blue-2">
                    <a href="assainissement">
                        <figure>
                            <img src="media/img/assainissement-1.png" class="img-fluid" alt="Assainissement">
                            <figcaption><h3>Assainissement</h3></figcaption>
                        </figure>
                    </a>
                </li>
                <li class="col-12 col-sm-6">
                    <img src="/media/img/bg-pink-5.png" class="tache-abs" id="bg-pink-5">
                    <a href="/inspection-video-puits">
                        <figure>
                            <img src="/media/img/inspection-des-puits.png" class="img-fluid" alt="Inspection des puits">
                            <figcaption><h3>Inspection des puits</h3></figcaption>
                        </figure>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <div class="container ">
      <div class="row d-flex justify-content-center mt-3 bg-fond_cta">
          <div class="cta cta_margin">
            <a href="/devis">Demande de devis</a>
          </div>
          <div class="cta cta_margin">
            <a href="Tel:0442556784">Nous appeler</a>
          </div>
      </div>
    </div>
