<?php 
    $mycrs = getCoursById((int)$thsIdnt,$conf)[0]; 
    $cls = "WHERE idEtudiant = $meIdnt AND idCours = $thsIdnt AND datastatus = 1";
    // $mycrs = array_merge($mycrs['notDistCours'],$mycrs['distCours'])[0];
    $facilitator = ((!empty($mycrs->facilitateur[0])) ? ucfirst($mycrs->facilitateur[0]).'&nbsp;'.ucfirst($mycrs->facilitateur[1]) : 'Reitec Info Team');
    $rmtime = (gettingVLSCLS($conf,'tbl_etudier',$cls,'remaningTime'));
    // echo($thsIdnt);
    // echo('<br>');
    // echo($meIdnt);
?>
<section class="my-3">
    <div class="container">
        <div class="row" style="width: 1000px">
            <div class="jumbotron py-2 pt-5" style="width:100%;">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="mb-0">Cours : <strong><?php echo(ucfirst($mycrs->titre)) ?></strong></h4>
                        <p class="text-prmy"><?php echo(ucfirst($mycrs->categ)) ?> <span class="bx bx-chevron-right mx-1"></span><?php echo(ucfirst($mycrs->subCateg)) ?></p>
                        <p>Par : <b><?php echo($facilitator) ?></b></p>
                    </div>
                    <div class="col-lg-2">
                        <h6>Temps restant</h6>
                        <p>
                            <span class="fa fa-clock-o"></span>
                            <strong>
                                <?php echo($rmtime); ?>&nbsp;Jours
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 px-0 pt-0 mt-0">
                <?php 
                    // var_dump($mycrs);
                    $contt = getContentCRS($mycrs->content,$conf);
                    $type = $contt->categ;
                    // var_dump($contt);
                    switch ($type) {
                        case 'astext':
                            @include('_astext.inc.php');
                            break;
                        case 'aspdf':
                            @include('_asbinary.inc.php');
                            break;
                        case 'asvideourl':
                            @include('_asurl.php');
                            break;
                        default:

                            break;
                    } 
                ?>
            </div>
        </div>
    </div>
</section>