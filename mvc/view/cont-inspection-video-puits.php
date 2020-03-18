<?php
$inspection = $model->getInfoPage('inspection-video-puits');
?>

<section>
  <div class="container ul_unset scrollpoint sp-effect1">
      <div class="row">
          <h1 class="col-12 col-lg-6">INSPECTION CAMERA DE PUITS ET DE CANALISATIONS</h1>
      </div>
      <div class="row responsive_column_reverse scrollpoint sp-effect1">
        <div class="col-12 col-lg-5 offset-lg-1 custom-text">
          <div><?php echo $inspection['texte_left']?></div>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1">
          <div class="video-container-ass">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/26m--_giftQ?rel=0&autoplay=1&loop=1&playlist=26m--_giftQ"
          frameborder="0" allow="accelerometer; autoplay; loop; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen class="iframe_border"></iframe>
        </div>
      </div>
  </div>
</section>

<section  id="bg-inspection-de-puits">
  <div class="container ul_unset scrollpoint sp-effect1">
    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-1">
        <figure>
          <img src="/media/img/inspection-2.png" class="img_inspection-2" alt="" style="">
        </figure>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1">
        <figure>
          <img src="/media/img/inspection-puit.png" class="img_inspection-2" alt="" style="">
        </figure>
      </div>
    </div>
</section>

<section class="scrollpoint sp-effect1">
  <div class="container ul_unset">
    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-1">
        <figure>
          <img src="/media/img/inspection-1.png" class="img_inspection-1" alt="" style="">
        </figure>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
        <?php echo $inspection['texte_right']?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-5 text-encart_inspection offset-lg-1 scrollpoint sp-effect1">
        <?php echo $inspection['text_top'] ?>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1">
        <img src="/media/img/inspection-5.png" class="img_inspection-1" alt="Passage de la camera dans les canalisations">
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-4 scrollpoint sp-effect1">
        <figure>
          <img src="/media/img/carteTvs.png" class="img_inspection-2" alt="Equipemennt d'accès au puit">
        </figure>
      </div>
    </div>
    <div class="row materiel_tvs" style="position:relative;">
      <img src="/media/img/fond_inspection.png" style="position: absolute;width:100%;" alt="background inspection"/>
      <div class="col-12 col-lg-3 offset-lg-1 scrollpoint sp-effect1">
        <figure>
          <img src="/media/img/chariot.png" class="img_inspection-3 images_tvs" alt="Equipemennt d'accès au puit">
        </figure>
      </div>
      <div class="col-12 col-lg-4 offset-lg-1 scrollpoint sp-effect1">
        <figure>
          <img src="/media/img/canalisation.png" class="img_inspection-3 images_tvs" alt="Equipement de canalisations">
        </figure>
      </div>
      <div class="col-12 col-lg-2 offset-lg-1 scrollpoint sp-effect1">
        <figure>
          <img src="/media/img/tête-rotative.png" class="img_inspection-5 images_tvs" alt="Equipemennt d'accès au puit">
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6 offset-lg-4 scrollpoint sp-effect1" style="text-align:center;">
        <figure>
          <img src="/media/img/inspection-4.png" class="img_inspection-4" alt="Equipemennt d'accès au puit" style="">
        </figure>
      </div>
    </div>
  </div>
</section>

<div class="container scrollpoint sp-effect1">
  <div class="row d-flex justify-content-center mt-3 bg-fond_cta">
      <div class="cta cta_margin">
        <a href="/devis">Demande de devis</a>
      </div>
      <div class="cta cta_margin">
        <a href="Tel:0442556784">Nous appeler</a>
      </div>
  </div>
</div>
