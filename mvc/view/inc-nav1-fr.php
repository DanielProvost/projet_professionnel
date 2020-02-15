                <div id="pre-nav" class="navbarToToggle navbar-collapse collapse">
                    <div class="container-lg justify-content-end">
                        <ul>
                            <li><a href="/"<?=$currentPage == 'hydratis' ? ' class="actif"':''?>>Hydratis</a></li><!--
                            --><li><a href="/actualite"<?=$currentPage == 'actualite' ? ' class="actif"':''?>>Actualités</a></li><!--
                            --><li><a href="/devis"<?=$currentPage == 'devis' ? ' class="actif"':''?>>Demander un devis</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav">
                    <div class="container">
                        <a class="navbar-brand" href="/"><img src="/media/img/logo.png" class="img-fluid" alt="Hydratis logo" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarToToggle" aria-controls="navbarToToggle" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                        <div class="navbarToToggle navbar-collapse collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link <?=$currentPage == 'hydraulique-urbaine' ? 'actif':''?>" href="/hydraulique-urbaine">Hydraulique urbaine</a></li>
                                <li class="nav-item"><a class="nav-link <?=$currentPage == 'hydraulique-fluviale' ? 'actif':''?>" href="/hydraulique-fluviale">Hydraulique fluviale</a></li>
                                <li class="nav-item"><a class="nav-link <?=$currentPage == 'assainissement' ? 'actif':''?>" href="/assainissement">Assainissement</a></li>
                                <li class="nav-item"><a class="nav-link <?=$currentPage == 'eau-potable' ? 'actif':''?>" href="/eau-potable">Eau potable</a></li>
                                <li class="nav-item"><a class="nav-link <?=$currentPage == 'hydrogeologie' ? 'actif':''?>" href="/hydrogeologie">Hydrogéologie</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Prévisions<br>des crues</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown6">
                                        <a class="dropdown-item <?=$currentPage == 'service' ? 'actif':''?>" href="/services">Services</a>
                                        <a class="dropdown-item <?=$currentPage == 'logiciel' ? 'actif':''?>" href="/logiciels">Logiciels</a>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link <?=$currentPage == 'inpection-video-puits' ? 'actif':''?>" href="/inspection-video-puits">Inspection vidéo de&nbsp;puits</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
