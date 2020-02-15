    <?php $infoPage = $model->getInfoPage('contact'); ?>
    <section class="container">
        <div class="row">
            <h1>Contact</h1>
            <?=$model->makeAriane(['Contact' => $nomPage[0]], true, 'ariane-light')?>
            <?php
            if(!empty($infoPage['image1'])) echo '<img src="'.$infoPage['image1'].'?'.filemtime($infoPage['image1']).'" alt="Demande de contact Urban Spirit" class="page-picture scrollpoint sp-effect3" />';
            if(!empty($infoPage['texte'])) echo '<div class="page-text scrollpoint sp-effect5">'.$infoPage['texte'].'</div>';
            ?>
        </div>
    </section>