<?php
$assainissement = $model->getInfoPage('assainissement');
// var_dump($hydraulique_urbaine);
?>


<section id="section-bg-assainissement">
  <div class="container ul_unset">
      <div class="row">

          <h1 class="col-12 col-lg-6"><?php echo $assainissement['titre']?></h1>

      </div>
      <div class="row">
        <div class="col-12 col-lg-5 offset-lg-1">
          <div class="video-container-ass">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/s-5GkGP8Tbc?rel=0&autoplay=1"
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen class="iframe_border"></iframe>
       </div>
     </div>
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
        <?php echo $assainissement['texte_right']?>
      </div>
    </div>

    <div class="row">
        <div class=" col-12 col-lg-5 offset-lg-1 custom-text">
          <?php echo $assainissement['texte_left']?>
        </div>
        <div col-12 col-lg-5 offset-lg-1>
        <img src="media/img/bg-blue-1.png">
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
