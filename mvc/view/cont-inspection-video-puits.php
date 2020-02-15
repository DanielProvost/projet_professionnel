<?php
$inspection = $model->getInfoPage('inspection-video-puits');

?>

<section>
  <div class="container ul_unset scrollpoint sp-effect1">
      <div class="row">
          <h1 class="col-12 col-lg-6"><?php echo $inspection['titre']?></h1>
      </div>

      <div class="row responsive_column_reverse scrollpoint sp-effect1">
        <div class="col-12 col-lg-5 offset-lg-1 custom-text">
          <div><?php echo $inspection['texte_left']?></div>
        </div>
        <div class="col-12 col-lg-6">
          <figure>
            <img src="/media/img/inspection-1.png" class="img_inspection-1" alt="" style="">
          </figure>
        </div>
      </div>
  </div>
</section>

<section  id="bg-inspection-de-puits">
  <div class="container ul_unset scrollpoint sp-effect1">
    <div class="col-12 col-lg-6 offset-lg-3">
      <figure>
        <img src="/media/img/inspection-2.png" class="img_inspection-2" alt="" style="">
      </figure>
    </div>
  </div>
</section>

<section class="scrollpoint sp-effect1">
  <div class="container ul_unset">
    <div class="row">
      <div class="col-12 col-lg-6">
        <figure>
          <img src="/media/img/inspection-3.png" class="img_inspection-3" alt="Cameras de forage" style="">
        </figure>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
        <?php echo $inspection['texte_right']?>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-6 offset-lg-3 scrollpoint sp-effect1">
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
        <a href="/devis"<?=$currentPage == 'devis' ? ' class="actif"':''?>>Demande de devis</a>
      </div>
      <div class="cta cta_margin">
        <a href="Tel:0442556784">Nous appeler</a>
      </div>
  </div>
</div>
