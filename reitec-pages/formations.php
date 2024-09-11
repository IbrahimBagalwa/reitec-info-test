<style>
    a.active--- {
    border-bottom: 2px solid #577692;
    /* background-color: #577692; */
    }
</style>
<?php 
    $pageno = $_GET['tabIndx'] ?? 1;
    $no_elem_per_page = 4;
    $offset = ($pageno - 1) * $no_elem_per_page;
    $cat = 'all';
    $row = count_row($cat,$conf); //echo($row);
    $data = getFRMPGNT((int)$offset,(int)$no_elem_per_page,$cat,$conf);
    $total_page = ceil($row / $no_elem_per_page);
    $nextpage = ($total_page <= $pageno) ? $total_page : ($pageno + 1);
    $prevpage = ($pageno > 1) ? ($pageno - 1) : 1;
    $cour_s = $data;//getCouurs($conf);
?>
<section>
    <div class="container my-2">
        <div class="section-title">
            <h2 data-aos="fade-up">Programme de formation</h2>
            <p data-aos="fade-up">
                Devenez qui vous voulez être avec Reitec Info. Choisissez votre carrière.
                Suivez une formation constituée de projets professionnalisants et de séances 
                individuelles avec un mentor dédié chaque semaine. Obtenez un diplôme reconnu par 
                l'état. Enrichissez votre CV avec les programmes en alternance proposés par Reitec Info et gagnez un salaire tout en suivant votre formation
            .</p>
        </div>
        <div class="section-body p-2">
            <p><b>Nos programmes : </b></p>
            <div class="col-lg-12 px-0">
                <!-- listing programme here dav -->
                <!-- -------------------------------------- -->
                <?php 
                    if($data !== 0 && count($data) > 0){
                        // var_dump($data);
                        foreach($data as $d){
                        $name = ($d->facilitateur[0] !== null) ? ucfirst($d->facilitateur[0]).'&nbsp;'.ucfirst($d->facilitateur[1]) : 'reitec-info Team';

                ?>
                        <!-- list element here david -->
                        <div class="col-lg-12 col-12 section-bg p-2 rounded border mt-3">
                            <div class="section-title text-left p-2">
                                <h6 class="text-prmy mb-0 pt-3 mb-2">
                                    <span class="bx bx-chevron-right mr-2"></span><?php echo(ucfirst($d->categ)); ?>
                                    <span class="bx bx-chevron-right mx-2"></span><?php echo(ucfirst($d->subCateg)); ?>
                                </h6>
                                <h6 >
                                    <span class="bx bx-chevron-right mr-2"></span>
                                    Du <strong class="border- p-2- rounded-"><?php echo(ucfirst($d->date_s)); ?></strong> Au <strong class="border- p-2- rounded-"><?php echo(ucfirst($d->date_e)); ?></strong>
                                </h6>
                                <h4 class="pb-3"><span class="bx bx-chevron-right mr-2"></span><strong><?php echo(ucfirst($d->titre)); ?></strong></h4>
                                <p>
                                    <b>Synthèse : </b>
                                    <?php echo(ucfirst(htmlspecialchars_decode($d->description))); ?>
                                </p>
                                <p class="my-2 pb-3">
                                    <b>Délais de formation : </b> 
                                    Du <strong class="border- p-2- rounded-"><?php echo(ucfirst($d->date_s)); ?></strong> Au <strong class="border- p-2- rounded-"><?php echo(ucfirst($d->date_e)); ?></strong>
                                </p>
                                <p class="mb-2 pb-3">
                                    <b>Montant à payer : <strong class="text-danger" style="font-size: 18px"><?php echo(ucfirst($d->prix)); ?>$</strong></b>
                                </p>
                                <p class="mb-2 pb-3">
                                    <b>Facilitateur : </b> <?php echo(ucfirst($name)); ?>
                                </p>
                                <p class="w-100 bg-info- py-2 text-center border-top">
                                <!-- href="?page=signup&_sv=<?php echo(sha1('reitec-null')) ?>&_cbname=<?php echo(base64_encode($d->titre)); ?>&_cb=<?php echo($d->id) ?>" -->
                                    <a href="?page=detailcours&_sv=<?php echo(sha1('reitec-null')) ?>&_cbname=<?php echo(base64_encode($d->titre)); ?>&_cb=<?php echo($d->id) ?>&_id=<?php echo($d->id) ?>" class="btn bg-prmy text-white">
                                        Demander cette formation
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- ------end element  ------->
                <?php } }else{ ?>
                    <div class="col-lg-12 col-12 section-bg p-2 rounded border d-flex justify-content-center">
                        <em>
                            <span class="fa fa-warning mr-2"></span>
                            <b>Aucune formation actuellement</b>
                        </em>
                    </div>
                <?php } ?>
                <!-- --------------------------------------- -->
                <!-- end listing programme -->
                <div class="w-100">
                    <nav aria-label="Page navigation example" class="w-100 mt-4">
                        <ul class="pagination pagination-sm justify-content-center d-flex p-0 m-0">
                            <li class="page-item d-none">
                                <a href="">GG</a>
                            </li>
                            <?php if($prevpage > 1){ ?>
                            <!-- --------------------------------------- -->
                            <li class="page-item p-0 m-0" id="prev">
                                <a href="?page=formations&tabIndx=<?php echo($prevpage)?>" class="page-link" aria-label="Next" id="btn-prev">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Prev</span>
                                </a>
                            </li>
                            <!-- ------------------------------------------ -->
                            <?php }else{ ?>
                            <!-- ------------------------------------------ -->
                            <li class="page-item disabled pa-ge bg-danger p-0 m-0" id="prev">
                                <a href="?page=formations&tabIndx=<?php echo($prevpage)?>" class="page-link" aria-label="Next" id="btn-prev">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Prev</span>
                                </a>
                            </li>
                            <!-- -------------------------------------------- -->
                            <?php } ?>
                            <?php for($i = 0; $i < $total_page; $i++){ #if($total_page < 5){ ?>
                                <li class="page-item pa-ge p-0 m-0" id="page_<?php echo($i+1); ?>">
                                    <a href="?page=formations&tabIndx=<?php echo($i+1)?>" class="page-link pa-ge" id="<?php echo($i+1); ?>">
                                        <?php echo($i+1); ?>
                                    </a>
                                </li>   
                            <?php } #} ?>
                            <?php if($nextpage === $total_page) { ?>
                            <!-- ----------------------------------------------- -->
                            <li class="page-item disabled p-0 m-0" id="next">
                                <a  href="?page=formations&tabIndx=<?php echo($nextpage)?>" class="page-link" aria-label="Next" id="btn-next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <!-- ------------------------------------------------ -->
                            <?php }else{ ?>
                            <!-- ------------------------------------------------- -->
                            <li class="page-item p-0 m-0" id="next">
                                <a  href="?page=formations&tabIndx=<?php echo($nextpage)?>" class="page-link" aria-label="Next" id="btn-next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <!-- ------------------------------------------------ -->
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // $('[data-link=li]').on('click', function(e){
    //     const vb = $(this).attr('reitec-link-cours');
    //     const rt = btoa('reitec-info-goma-rdc-cours');
    //     window.location.href = (`?page=detailcours&_mkr=<?php #echo($mkr) ?>=&_sk=${rt}&_id=${vb}`);
    // })
    let active = "<?php echo($pageno) ?>";
    let desactive = 0;
    const totalPage = "<?php echo($total_page) ?>";
    const nextState = document.getElementById('next').classList;
    const prevState = document.getElementById('prev').classList;
    // const container = document.getElementById('product_listing');
    const pages = document.getElementsByTagName('a');
    activatePagination();
    function activatePagination(){
    //alert('<?php echo($cat) ?>')
    //desactivatePagination()
    if(active < totalPage){nextState.remove('disabled') }
    if(active > 1){prevState.remove('disabled') }
    const li = document.getElementById('page_'+active);
    //desactive = active;
    li.classList.add('active');
    }
</script>
