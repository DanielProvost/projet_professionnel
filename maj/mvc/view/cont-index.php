			<div class="col-xs-10 col-xs-offset-2">
                <?php
                    $model = new Model;
                    $titre = $model->getInput("titre");
                    switch($titre)
                    {
                        case 'liste-actualites':
                            $table='actualite';
                            $model->readTableListe($table,$titre);
                            break;
                        case 'liste-devis':
                            $table='devis';
                            $model->readTableListe($table,$titre);
                            break;
                        case 'liste-pages':
                            $table='Pages';
                            $model->readTableListe($table,$titre);
                            break;
                    }
                ?>
			</div>

