<?php
$eau_potable = $model->getInfoPage('eau-potable');
// var_dump($hydraulique_urbaine);
?>

<section id="bg-eau-potable">
  <div class="container ul_unset">

      <div class="row">
          <h1 class="col-12 col-lg-8"><?php echo $eau_potable['titre']?></h1>
      </div>

      <div class="row">
        <div class="col-12 col-lg-5 offset-lg-1 custom-text">
          <div><?php echo $eau_potable['texte_left']?></div>
        </div>
        <div class="col-12 col-lg-6">
            <img src="/media/img/eau-pot1.png" class="arc_photo" alt="Arc photo personnelle" style="width:100%;">
        </div>
    </div>

    <div class="row responsive_column_reverse">
      <div class="col-12 col-lg-5 offset-lg-1">
        <div class="video-container-ass">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/oGPjWQnkLWk?rel=0&autoplay=1"
          frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen class="iframe_border"></iframe>
      </div>

    </div>
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
        <div><?php echo $eau_potable['texte_right']?></div>
      </div>

  </div>

</div>
</section>
<div class="container ">
  <div class="row d-flex justify-content-center mt-3 bg-fond_cta">

      <div class="cta cta_margin">
        <a href="/devis"<?=$currentPage == 'devis' ? ' class="actif"':''?>>Demande de devis</a>
      </div>

      <div class="cta cta_margin">
        <a href="Tel:0442556784">Nous appeler</a>
      </div>

  </div>
</div>
