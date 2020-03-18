			<div class="col-xs-10 col-xs-offset-2" style="padding-bottom: 20px;">
                <?php
                    $model = new Model;
                    //$lang  = $model->getInput("lang");
                    $lang = 'fr';
                    $titre = $model->getInput("titre");
//                    if ($titre == "")
//                    {
//                        $titre = "liste-actualites";
//                    }

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
//                        default :
//                            $table='Pages';
//                            $model->readPage($table,$titre,$lang);
//                            break;
                    }

                ?>
			</div>

