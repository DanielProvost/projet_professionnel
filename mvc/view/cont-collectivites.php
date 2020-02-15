<?php
$collectivites = $model->getInfoPage('collectivites');
 ?>
 <section>
   <div class="container ul_unset">
     <div class="row">
         <h1 class="col-12 col-lg-6"><?php echo $collectivites['titre']?></h1>
     </div>

     <div class="row">
       <div class="col-12 col-lg-5 offset-lg-1 custom-text scrollpoint sp-effect1">
         <div><?php echo $collectivites['texte_left']?></div>
       </div>
       <div class="col-12 col-lg-5 offset-lg-1 custom-text scrollpoint sp-effect1">
         <div><?php echo $collectivites['texte_right']?></div>
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
