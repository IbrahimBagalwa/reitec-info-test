<?php 
// var_dump($_SESSION);
if ($_SESSION['reitec-std-session']) {
    $me = (array)$_SESSION['ident-me'];
    $meIdnt = $me['id'];
?>
<div class="container my-5">
    <div class="card border-0 p-0 m-0">
        <div class="card-body">
            <h4 class="mb-2"></h4>
            <div class="row">
                <div class="col-12 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">
                           <span class="fa fa-home mr-1"></span>
                            Acceuil
                        </a>
                        <a class="nav-link d-none" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">
                            <span class="fa fa-user-circle mr-1"></span>
                            Profile
                        </a>
                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">
                            <span class="fa fa-book mr-1"></span>
                            Mes formations
                        </a>
                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">
                            <span class="fa fa-cogs mr-1"></span>
                            Parametres
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <!-- ---------------------------------------------- -->
                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <div class="container">
                            <!-- ---------------------------- -->
                                <div class="row">
                                    <div class="col-lg-12 px-3 border rounded">
                                        <div class="card-title pt-2">
                                            <h5>Formation ajoutées recement</h5>
                                        </div>
                                        <div class="card-body my-0 py-1 px-1">
                                            <?php 
                                                $rctad = getCours($conf,4); /*$rctad = array_merge($rctad['distCours'],$rctad['notDistCours']);*/ 
                                                // var_dump($rctad);
                                                if($rctad !== 0){
                                                    shuffle($rctad);
                                                    foreach($rctad as $knd){
                                                        $titre_ = (strlen($knd->titre) < 25) ? $knd->titre : substr($knd->titre,0,22).'...';

                                            ?>
                                            <!-- list of recent cours -->
                                            <div class="col-lg-12 bg-light border rounded py-1 my-1 hoverOn pl-4">
                                                <a href="?page=readingcours&_mkr=<?php echo(sha1('dav.me.dar')) ?>&_spc=<?php echo($knd->id) ?>">
                                                    <span class="fa fa-book mr-2"></span>
                                                    <span>Formation : <b><?php echo($titre_); ?></b></span>
                                                </a>
                                            </div>
                                            <!-- end of recent cours -->
                                            <?php } }else{ ?>
                                                <div class="col-lg-12 rounded border text-center py-1 my-1 hoverOn">
                                                    <span class="fa fa-lock mr-2"></span>
                                                    <b>Aucun Nouveau cours pour le moment</b>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12  border rounded mt-2">
                                        <div class="card-title pt-2">
                                            <h5>Evenement à venir</h5>
                                        </div>
                                        <div class="card-body my-0 py-1 px-1">
                                            <!-- list of recent cours -->
                                            <div class="col-lg-12 rounded border text-center py-1 my-1 hoverOn">
                                                <span class="fa fa-lock mr-2"></span>
                                                <b>Aucun evenement pour le moment</b>
                                            </div>
                                            <!-- end of recent cours -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                            <!-- --------------------------- -->
                            </div>
                        </div>
                        <!-- ---------------------------------------------- -->
                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                        </div>
                        <!-- ---------------------------------------------- -->
                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                            <div class="container">
                                <!--  -->
                                <div class="row">
                                    <div class="col-lg-12 px-3 border rounded">
                                        <div class="card-title pt-4">
                                            <h5>Formations recentes</h5>
                                        </div>
                                        <div class="card-body my-0 py-1 px-1">
                                            <!-- list of recent cours -->
                                            <div class="row">
                                            <?php
                                                // var_dump(getCoursACTME($conf,4,$meIdnt)[0]['cours'][0]);
                                                // return false;
                                                $msc = getCoursACTME($conf,4,$meIdnt);
                                                if($msc !== 0){
                                                    // echo(count($msc));
                                                    // var_dump($msc);
                                                    // return false;
                                                    foreach($msc as $knd){
                                                        if($knd['cours'][0] !== null){
                                                        // var_dump($knd['cours']);
                                                        // echo('---------------------<br>');
                                                        $titre_ = (strlen($knd['cours'][0]->titre) < 14) ? $knd['cours'][0]->titre : substr($knd['cours'][0]->titre,0,13).'...';

                                            ?>
                                                <div class="col-lg-3 px-1">
                                                    <div class="col-lg-12 bg-light border rounded my-1 hoverOn p-3 text-black">
                                                        <a class="text-dark" href="?page=readingcours&_mkr=<?php echo(sha1('dav.me.dar')) ?>&_spc=<?php echo($knd['cours'][0]->id) ?>">
                                                            <span class="fa fa-book mr-2"></span>
                                                            <span>Cours : <br><b><?php echo(ucfirst($titre_)); ?></b></span>
                                                            <p class="mt-2 mb-0">Temps Restant : <b><?php echo($knd['rmTime']); ?>&nbsp;<strong>Jours</strong></b></p>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } } }else{ ?>
                                                <div class="col-lg-12 bg-light text-center py-1 my-1 hoverOn pl-4">
                                                    <!-- <span class="fa fa-warning mr-2"></span> -->
                                                    <b>Vos formations s'afficheront ici !</b>
                                                </div>
                                            <?php } ?>
                                            </div>
                                            <!-- end of recent cours -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12 px-3 border mt-2 rounded">
                                        <div class="card-title pt-4">
                                            <h5>Formations Non activées</h5>
                                        </div>
                                        <div class="card-body my-0 py-1 px-1">
                                            <!-- list of recent cours -->
                                            <div class="row">
                                            <?php
                                                $msc = getCoursACTMENOTActivate($conf,4,$meIdnt);
                                                if($msc !== 0){
                                                    foreach($msc as $knd){
                                                        if($knd['cours'][0] !== null){
                                                        $titre_ = (strlen($knd['cours'][0]->titre) < 14) ? $knd['cours'][0]->titre : substr($knd['cours'][0]->titre,0,13).'...';

                                            ?>
                                                <div class="col-lg-3 px-1">
                                                    <div class="col-lg-12 bg-light border rounded my-1 hoverOn p-3 text-black">
                                                        <a class="text-dark" href="?page=readingcours&_mkr=<?php echo(sha1('dav.me.dar')) ?>&_spc=<?php echo($knd['cours'][0]->id) ?>">
                                                            <span class="fa fa-book mr-2"></span>
                                                            <span>Cours : <br><b><?php echo(ucfirst($titre_)); ?></b></span>
                                                            <p class="text-danger"><b>Non activée</b></p>
                                                            <p class="mt-2 mb-0">Début : <b><?php echo($knd['cours'][0]->date_s); ?></b></p>
                                                            <p class="mt-2 mb-0">Fin : <b><?php echo($knd['cours'][0]->date_e); ?></b></p>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } } }else{ ?>
                                                <div class="col-lg-12 bg-light text-center py-1 my-1 hoverOn pl-4">
                                                    <!-- <span class="fa fa-warning mr-2"></span> -->
                                                    <b>Vos formations s'afficheront ici !</b>
                                                </div>
                                            <?php } ?>
                                            </div>
                                            <!-- end of recent cours -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12  border rounded mt-2">
                                        <div class="card-title pt-2">
                                            <h5>Toutes les formations</h5>
                                        </div>
                                        <div class="card-body my-0 py-1 px-1">
                                            <?php 
                                            $msc_ = (getCoursACTME($conf,20,$meIdnt)); 
                                            if($msc_ !== 0){
                                                shuffle($msc_);
                                                foreach($msc_ as $knd){
                                                    if($knd['cours'][0] !== null){
                                                        $titre_ = (strlen($knd['cours'][0]->titre) < 16) ? $knd['cours'][0]->titre : substr($knd['cours'][0]->titre,0,14).'...';

                                            ?>
                                            <!-- list of recent cours -->
                                            <div class="col-lg-12 bg-light text-dark border py-1 my-1 hoverOn px-4">
                                                <a href="?page=readingcours&_mkr=<?php echo(sha1('dav.me.dar')) ?>&_spc=<?php echo($knd['cours'][0]->id) ?>">
                                                    <span class="fa fa-book mr-2"></span>
                                                    <span>Formation : </span>
                                                    <b><?php echo($titre_); ?></b>
                                                    <b class="float-right"><span class="fa fa-clock-o mr-2"></span><?php echo($knd['rmTime']); ?>&nbsp;<strong>Jours</strong></b></b>
                                                </a>
                                            </div>
                                            <!-- end of recent cours -->
                                            <?php } } }else{ ?>
                                                <div class="col-lg-12 bg-light text-center py-1 my-1 hoverOn pl-4">
                                                    <!-- <span class="fa fa-warning mr-2"></span> -->
                                                    <b>Vos formations s'afficheront ici !</b>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                        <!-- ---------------------------------------------- -->
                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 border rounded text-center pb-0">
                                        <b>Aucun item pour le moment !</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---------------------------------------------- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}else{
?>
<script>
    window.location.replace('?page=signin');
</script>
<?php
}
?>