 <?php
$hydrogeologie = $model->getInfoPage('hydrogeologie');
// var_dump($hydraulique_urbaine);
?>

<section>
  <div class="container ul_unset">

    <div class="row">
        <h1 class="col-12 col-lg-8"><?php echo $hydrogeologie['titre']?></h1>
    </div>

    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-1">
        <figure>
            <img src="media/img/hydrogeologie.png" class="img_hydrogeologie" alt="Hydrogéologie">
        </figure>
      </div>
      <div class="col-12 col-lg-5 offset-lg-1 custom-text">
          <div><?php echo $hydrogeologie['texte_right']?></div>
      </div>
    </div>
  </div>
</section>

<section class="section-bg-fluviale">
    <img src="/media/img/bg-pink-1.png" class="bg-fluviale-left">
    <img src="media/img/bg-pink-2.png" class="bg-fluviale-right">
</section>

<section>
  <div class="container ul_unset">


    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-1 custom-text"><?php echo $hydrogeologie['texte_left']?></div>
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
