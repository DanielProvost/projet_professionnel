<?php
$assainissement = $model->getInfoPage('assainissement');
// var_dump($assainissement);
?>


<section id="section-bg-assainissement">
  <div class="container ul_unset">
      <div class="row">
          <h1 class="col-12 col-lg-6"><?php echo $assainissement['titre']?></h1>
        <div class="col-12 col-lg-6 text-encart scrollpoint sp-effect1" id="encart_assainissement">
          <?php echo $assainissement['text_top']?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-5 offset-lg-1">
          <div class="video-container-ass">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/hVCNazRzCTA?autoplay=1&rel=0&loop=1&playlist=hVCNazRzCTA"
            frameborder="0" allow="accelerometer; autoplay; replay; loop; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen class="iframe_border">
            </iframe>
          </div>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1 custom-text">
          <?php echo $assainissement['texte_right']?>
        </div>
    </div>
    <div class="row responsive_column_reverse">
      <div class=" col-12 col-lg-5 offset-lg-1 custom-text">
        <?php echo $assainissement['texte_left']?>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1">
        <img src="/media/img/assainissement-1.png" class="img-fluid" alt="Assainissement">
        <img src="/media/img/bg-blue-1.png" alt="background bleu">
      </div>
    </div>
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
