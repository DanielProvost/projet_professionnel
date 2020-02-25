<?php
$actualites = $model->getInfoActu();
?>
<div class="bg-actualite">
    <img src="/media/img/bg-pink-1.png" class="bg-fluviale-left">
    <img src="media/img/bg-pink-2.png" class="bg-fluviale-right">
</div>
<section class="container">
    <div class="row">
        <h1 id="titre_actu">Actualités</h1>
        <?php
        if(!empty($actualites['img'])) echo '<img src="'.$actualites['image1'].'?'.filemtime($actualites['img']).'" alt="Actualité d\'Urban Spirit" class="page-picture scrollpoint sp-effect3" />';
        if(!empty($actualites['texte'])) echo '<div class="page-text scrollpoint sp-effect5">'.$actualites['texte'].'</div>';

        if(count($actualites)>0) {
        ?>
    </div>
    <div class="row col-12 offset-lg-2">
        <ul id="list-actualite" class="feedback scrollpoint sp-effect3">
            <?php
            foreach($actualites as $actu) {
              if($actu['statut'] === '1'){
                echo '<li>'.PHP_EOL;
                echo '  <div class="bloc-encart">'.PHP_EOL;
                echo '         <div><p>'.$actu['date'].'</p>';
                echo '         <img src="'.$actu['img'].'" class="image_size_actualite"/></div>';
                echo '          <div><h2>'.$actu['titre'].'</h2>'.PHP_EOL;
                echo '          <p>'.$actu['resume'].'</p>'.PHP_EOL;
                echo '      <a href="'.$model->genLink('actualite', $actu['id'], $actu['titre']).'" class="">'.PHP_EOL;
                echo '          <p class="cta_actu"><span>En savoir plus</span></p></div>'.PHP_EOL;
                echo '      </a>'.PHP_EOL;
                echo '  </div>'.PHP_EOL;
                echo '</li>'.PHP_EOL;
              }
            }
            ?>
        </ul>
    </div>
    <?php }else{ echo '<p class="page-text text-center">Il n\'y a aucune actualité.</p>'; } ?>
</section>
