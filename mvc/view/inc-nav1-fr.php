<?php $currentPage= $nomPage[0];?>

                <div id="nav" class="back_nav fixed-top d-lg-block">

                  <div id="pre-nav" class="navbarToToggle navbar-collapse collapse bg_pre-nav">
                      <div class="container-lg justify-content-end">
                          <ul>
                              <li><a href="/"><i class="fa fa-home" style="font-size:110%;"></i></i></a>
                              <li><a href="/"<?=$currentPage === 'hydratis' ? ' class="actif"':''?>>Hydratis</a></li>
                              <li><a href="/actualite"<?=$currentPage === 'actualite' ? ' class="actif"':''?>>Actualités</a></li>
                              <li><a href="/devis"<?=$currentPage === 'devis' ? ' class="actif"':''?>>Demander un devis</a></li>
                          </ul>
                      </div>
                  </div>

                    <div class="container">
                        <a class="navbar-brand" href="/"><img src="/media/img/logo.png" class="img-fluid" alt="Hydratis logo" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarToToggle" aria-controls="navbarToToggle" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                        <div class="navbarToToggle navbar-collapse collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto border_nav">
                                <li id="onglet_inspection" class="nav-item <?=$currentPage === 'inspection-video-puits' ? 'actif':''?>"><a class="nav-link" href="/inspection-video-puits">Inspection caméra de puits et canalisations</a></li>
                                <li class="nav-item <?=$currentPage === 'hydraulique-urbaine' ? 'actif':''?>"><a class="nav-link" href="/hydraulique-urbaine">Hydraulique urbaine</a></li>
                                <li class="nav-item <?=$currentPage === 'hydraulique-fluviale' ? 'actif':''?>"><a class="nav-link" href="/hydraulique-fluviale">Hydraulique fluviale</a></li>
                                <li class="nav-item <?=$currentPage === 'assainissement' ? 'actif':''?>"><a class="nav-link" href="/assainissement">Assainissement</a></li>
                                <li class="nav-item <?=$currentPage === 'eau-potable' ? 'actif':''?>"><a class="nav-link" href="/eau-potable">Eau potable</a></li>
                                <li class="nav-item <?=$currentPage === 'hydrogeologie' ? 'actif':''?>"><a class="nav-link" href="/hydrogeologie">Hydrogéologie</a></li>
                                <li class="nav-item dropdown <?=$currentPage === 'services' ? 'actif':''?>"><a class="nav-link" href="/services">Prévision des crues</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
