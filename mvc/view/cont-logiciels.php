<?php
$logiciel = $model->getInfoPage('logiciels');
// var_dump($service);
?>

<section>
<div class="container ul_unset">
    <div class="row">
        <h1 class="col-12 col-lg-8"><?php echo $logiciel['titre']?></h1>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2 custom-text">
            <div><?php echo $logiciel['texte_left']?></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-9">
          <h2>Notre Outil</h2>
        </div>
    </div>
    <div class="row scrollpoint sp-effect1">
      <div class="bloc_outil col-12 col-lg-4 offset-lg-2">
        <div class="bloc_outil1 border_radius">
          <img src="media/img/notre-outil_number1.png">
          <h3>L'installation</h3>
          <p>L'installation des points de mesures,<br>
             pluviomètres, hygromètres, capteurs<br>
             de mesures quantitatives et qualitatives<br>
             de l'eau.</p>
        </div>
        <div class="bloc_outil3 border_radius">
          <img src="media/img/notre-outil_number2.png">
          <h3>Le serveur</h3>
          <p>L'installation et la mise en service<br>
             du serveur interne.</p>
        </div>
      </div>

      <div class="bloc_outil col-12 col-lg-6">
        <div class="bloc_outil2 border_radius">
          <img src="media/img/notre-outil_number3.png">
          <h3>L'annonce</h3>
          <p>L'annonce de prévisions de la hauteur<br>
             d'eau sur un point de suivi en temps réel<br>
             sur votre téléphone portable et/ou PC de<br>
             surveillance. Cette prouesse technologique<br>
             basée sur l'intelligence artificielle et<br>
             l'apprentissage des situations passées sur<br>
             le secteur suivi et d'autre part de laisser le<br>
             temps aux riverains ou personnels de se<br>
             refugier sur un point haut.</p>
        </div>
      </div>
    </div>


</div>
</section>
<div class="container scrollpoint sp-effect2">
  <div class="row d-flex justify-content-center mt-3 bg-fond_cta">

      <div class="cta cta_margin">
        <a href="/devis"<?=$currentPage == 'devis' ? ' class="actif"':''?>>Demande de devis</a>
      </div>

      <div class="cta cta_margin">
        <a href="Tel:0442556784">Nous appeler</a>
      </div>

  </div>
</div>
