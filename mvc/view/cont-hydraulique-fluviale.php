<?php
$hydraulique_fluviale = $model->getInfoPage('hydraulique-fluviale');
// var_dump($hydraulique_urbaine);
?>


<section>
  <div class="container ul_unset">

      <div class="row">
          <h1 class="col-12 col-lg-8"><?php echo $hydraulique_fluviale['titre']?></h1>
      </div>

      <div class="row responsive_column_reverse">

        <div class="col-12 col-lg-6">
            <img src="/media/img/hydro-flu1.png" class="arc_photo" alt="Arc photo personnelle" style="width:100%;">
        </div>
        <div class="col-12 col-lg-5 offset-lg-1 custom-text">
          <div><?php echo $hydraulique_fluviale['texte_right']?></div>
        </div>
        </div>
  </div>
</section>

<div class="section-bg-fluviale">
    <img src="/media/img/bg-pink-1.png" class="bg-fluviale-left">
    <img src="media/img/bg-pink-2.png" class="bg-fluviale-right">
</div>

<section>
<div class="container ul_unset">
    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
        <div><?php echo $hydraulique_fluviale['texte_left']?></div>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1 ">
          <div class="video-container-ass">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/1UQMo9MYbRI?rel=0&autoplay=1"
            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen class="iframe_border"></iframe>
      </div>
    </div>
</div>

    <div class="row">
      <figure class="col-12 col-lg-5 offset-lg-4">
          <img src="/media/img/hydro-flu2.png" class="arc_photo" alt="Arc photo personnelle" style="width:100%;">
          <img src="media/img/bg-blue-1.png" class="tache-abs" id="bg-blue-3">
      </figure>
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
