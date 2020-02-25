    <?php $infoPage = $model->getInfoPage('devis'); ?>
    <section class="container scrollpoint sp-effect3">
        <h1 style="padding-top:30px";>Demande de devis</h1>

        <form action="" method="post" class="form ajax" id="form-devis">
            <input type="hidden" name="controller" value="ajoutDevis">
            <div class="feedback"></div>
            <div class="row">
                <div class="col-md-4">
                    <label for="nom">Nom *</label>
                    <input type="text" name="nom" id="nom" class="form-control" required />
                </div>
                <div class="col-md-4">
                    <label for="nom">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" required />
                </div>
                <div class="col-md-4">
                    <label for="nom">Société</label>
                    <input type="text" name="societe" id="societe" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="email">Email *</label>
                    <input type="text" name="email" id="email" class="form-control" required />
                </div>
                <div class="col-md-4">
                    <label for="tel">Téléphone *</label>
                    <input type="text" name="tel" id="tel" class="form-control" required />
                </div>
            </div>
            <div class="row d-block">
                <div class="col-12">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <button>Envoyer</button>
        </form>
    </section>
