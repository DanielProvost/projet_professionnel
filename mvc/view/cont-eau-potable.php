<?php
$eau_potable = $model->getInfoPage('eau-potable');
?>


<section id="bg-eau-potable">
  <div class="container ul_unset">
    <div class="row">
        <h1 class="col-12 col-lg-6"><?php echo $eau_potable['titre']?></h1>
        <div class="col-12 col-lg-6 text-encart scrollpoint sp-effect1">
          <?php echo $eau_potable['text_top']?>
        </div>
    </div>
    <div class="row responsive_column_reverse">
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
        <div><?php echo $eau_potable['texte_left']?></div>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1 ">
        <div class="video-container-ass">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/oGPjWQnkLWk?rel=0&autoplay=1&loop=1&playlist=oGPjWQnkLWk"
          frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen class="iframe_border"></iframe>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-1">
        <figure>
          <img src="media/img/eau-pot2.png" class="img-fluid" alt="Eau potable">
        </figure>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
        <div><?php echo $eau_potable['texte_right']?></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-4">
        <img src="media/img/eau-pot1.png" class="img-fluid" alt="Traitement de l'eau">
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
