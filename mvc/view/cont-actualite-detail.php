<?php
$listActu = $model->getInfoActu();
?>
<section id="actu">
  <div class="container">
    <div class="row">
        <?php

        if(!empty($actu['img']))
        echo '  <h1 class="col-12">'.$actu['titre'].'</h1>';
        // echo '<p class="col-12">'.$actu['date'].'</p>';
        echo '<div class="mb5 col-12 col-lg-6 offset-lg-3"><img src="/'.$actu['img'].'?'.filemtime($actu['img']).'" alt="'.$actu['titre'].'" class="img-fluid image_size scrollpoint sp-effect3" /></div>';

        echo '<div class="conteneur_texte_actu col-12 col-lg-6 offset-lg-3">'.$actu['texte'].'</div>';

        if(!empty($actu['pdf']))
        echo '<div class="col-12 col-lg-6 offset-lg-3"><p class="cta_actu"><a href="/'.$actu['pdf'].'" target="_blank"><i class="fa fa-file-pdf-o"></i> Voir le pdf</a></p></div>';

        ?>
    </div>

    <div class="row mt-3 col-12 col-lg-6 offset-lg-3 justify-content-center" id="pagination-detail">
        <p>
            <?php
              foreach($listActu as $key => $val) {
                  if($actu['id'] == $val['id']) {
                      if(isset($listActu[$key-1])) $keyPrev = $key-1;
                      if(isset($listActu[$key+1])) $keySuiv = $key+1;
                      break;
                  }
              }
            if(isset($keyPrev)) echo '<a href="/'.$model->genLink('actualite', $listActu[$keyPrev]['id'], $listActu[$keyPrev]['titre']).'" class="actualite_nav"><i class="fa fa-caret-left"></i> Actualité précédente</a>';
            echo '<a href="/actualite" class="actualite_nav">Retour au sommaire</a>';
            if(isset($keySuiv)) echo '<a href="/'.$model->genLink('actualite', $listActu[$keySuiv]['id'], $listActu[$keySuiv]['titre']).'" class="actualite_nav">Actualité suivante <i class="fa fa-caret-right"></i></a>';
            ?>
        </p>
    </div>
  </div>
</section>
