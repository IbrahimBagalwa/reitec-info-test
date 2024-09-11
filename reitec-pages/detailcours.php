<style>
    a.active {
    border-bottom: 2px solid #577692;
    /* background-color: #577692; */
    }
</style>
<?php 
    $coursid = (isset($_GET['_id'])) ? $_GET['_id'] : null;
    if($coursid === null){
?>
    <script>
        window.location.replace('?page=home');
    </script>
<?php
    }
    // var_dump(getCoursById($coursid,$conf));
    $contt = getCoursById($coursid,$conf)[0];
?>
<div class="container my-5 services">
    <?php
        if($contt === 0){
    ?>
        <div class="col-lg-12 p-2 my-5">
            <div class="alert alert-default border rounded">
                <h4 class='mb-0 text-danger'><span class="fa fa-warning mr-2"></span>Aucun cours disponible pour le moment</h4>
                <p>Les informations du cours que vous cherchez ne sont pas disponnibles pour le moment veillez reessayez plutard</p>
            </div>
        </div>
    <?php
        }else{
            // $contt = array_merge($contt['distCours'],$contt['notDistCours'])[0];
            $name = ($contt->facilitateur[0] !== null) ? ucfirst($contt->facilitateur[0]).'&nbsp;'.ucfirst($contt->facilitateur[1]) : 'Reitec-info Team';
    ?>
        <!-- statement  -->
        <div class="w-100 d-flex justify-content-center">
            <div class="col-lg-12 col-md-12 hoverOn">
                <div class="icon-box">
                    <div class="icon"><i class="icofont-computer"></i></div>
                    <h5 class="title">
                        <a href="?page=contact">
                            <em class="text-muted">
                                <?php echo(ucfirst($contt->categ)) ?>
                                <span class="bx bx-chevron-right icon-show mx-1"></span>
                                <?php echo(ucfirst($contt->subCateg)) ?>
                            </em><br> 
                            <?php echo($contt->titre) ?>
                        </a>
                    </h5>
                    <p class="description border rounded py-2">
                        <?php echo(ucfirst($contt->description)); ?>
                    </p>
                    <p>
                      Durée de formation : Du <b><?php echo($contt->date_s) ?></b> Au <b><?php echo($contt->date_e) ?> </b>
                    </p>
                    <p>
                        Montant à payer :        
                        <strong class="text-danger">
                            <strong>
                                $<?php echo($contt->prix) ?>
                            </strong> 
                        </strong>
                    </p>
                    <p>
                        Facilitateur : <b><?php echo($name) ?></b>
                    </p>
                    <div class="dropdown-divider"></div>
                    <div class="btn-wrap">
                        <a class="btn btn-sm text-white w-75" style="background: #1d455f;" href="?page=signup&_sv=<?php echo(sha1('reitec-null')) ?>&_cbname=<?php echo(base64_encode($contt->titre)); ?>&_cb=<?php echo($contt->id) ?>">
                            <span>Demader cette formation</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
    <?php
        }
    ?>
</div>
