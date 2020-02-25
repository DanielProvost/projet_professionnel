<?php
$service = $model->getInfoPage('services');
// var_dump($service);
?>

<div class="container ul_unset">
    <div class="row">
        <h1 class="col-12 col-lg-6">PREVISIONS DES CRUES</h1>
        <div class="col-12 col-lg-4  offset-lg-1 text-encart scrollpoint sp-effect1">
          <?php echo $service['text_top']?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-5 offset-lg-1">
          <div class="video-container-ass">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/bbEeTuO09IM?rel=0&autoplay=1&loop=1&playlist=bbEeTuO09IM"
          frameborder="0" allow="accelerometer; autoplay; loop; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen class="iframe_border"></iframe>
        </div>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1 custom-text">
            <?php echo $service['texte_left']?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-5 offset-lg-1 custom-text">
          <div><?php echo $service['texte_right']?></div>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1">
          <figure>
            <img src="/media/img/services1.png" class="services1" alt="image_service">
          </figure>
        </div>
    </div>

</div>
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
