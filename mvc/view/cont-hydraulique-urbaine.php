<?php
$hydraulique_urbaine = $model->getInfoPage('hydraulique-urbaine');
// var_dump($hydraulique_urbaine);
?>

<section id="bg-hydro-urbaine ">
  <div class="container ul_unset">
      <div class="row">
          <h1 class="col-12 col-lg-6"><?php echo $hydraulique_urbaine['titre']?></h1>

        <div class="col-12 col-lg-6  text-encart scrollpoint sp-effect1">
          <?php echo $hydraulique_urbaine['text_top']?>
        </div>
      </div>
      <div class="row responsive_column_reverse">
        <div class="col-12 col-lg-5 offset-lg-1 custom-text scrollpoint sp-effect1">
          <?php echo $hydraulique_urbaine['texte_left']?>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1">
          <figure class="scrollpoint sp-effect1">
            <img src="/media/img/hydro-urb1-1.png" class="img_hydro-urb1 img-responsive" alt="">
          </figure>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-5 offset-lg-1">
          <figure class="scrollpoint sp-effect2">
              <img src="media/img/bg-pink-3.png" class="tache-abs" id="bg-pink-6">
          </figure>
          <figure class="scrollpoint sp-effect2">
              <img src="/media/img/hydro-urb2-1.png" class="img_hydro-urb2 img-responsive" alt="">
          </figure>
        </div>
        <div class="col-12 col-lg-5 offset-lg-1 custom-text scrollpoint ">
          <?php echo $hydraulique_urbaine['texte_right']?>
        </div>
      </div>
      <div class="col-12 col-lg-5 offset-lg-4 scrollpoint ">
        <img src="/media/img/hydro-urb3.png" class="img_hydro-urb3 img-responsive" alt="">
      </div>
  </div>
</section>
<div class="container scrollpoint sp-effect3">
  <div class="row d-flex justify-content-center mt-3 bg-fond_cta">
      <div class="cta cta_margin">
        <a href="/devis"<?=$currentPage == 'devis' ? ' class="actif"':''?>>Demande de devis</a>
      </div>
      <div class="cta cta_margin">
        <a href="Tel:0442556784">Nous appeler</a>
      </div>
  </div>
</div>
