    <?php $infoPage = $model->getInfoPage('mentions-legales'); ?>
    <section class="container">
        <div class="row">
            <h1>Mentions légales</h1>

            <?php
            if(!empty($infoPage['image1'])) echo '<img src="'.$infoPage['image1'].'?'.filemtime($infoPage['image1']).'" alt="Demande de contact Hydratis" class="page-picture scrollpoint sp-effect3" />';
            if(!empty($infoPage['texte'])) echo '<div class="page-text scrollpoint sp-effect5">'.$infoPage['texte'].'</div>';
            ?>
        </div>
    </section>