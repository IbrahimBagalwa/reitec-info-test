<!-- ======= F.A.Q Section ======= -->
<style>
    a.active-- {
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
    $data = getCoursPGNT((int)$offset,(int)$no_elem_per_page,$cat,$conf);
    $total_page = ceil($row / $no_elem_per_page);
    $nextpage = ($total_page <= $pageno) ? $total_page : ($pageno + 1);
    $prevpage = ($pageno > 1) ? ($pageno - 1) : 1;
    $cour_s = $data;//getCouurs($conf);
?>
<section id="faq" class="faq section-bg">
    <div class="container">

        <div class="section-title">
            <div class="container">
                <h2 data-aos="fade-up">NOS COURS</h2>
                <p data-aos="fade-up">
                    Devenez qui vous voulez être avec Reitec Info. Choisissez votre carrière.
                    Suivez une formation constituée de projets professionnalisants et de séances 
                    individuelles avec un mentor dédié chaque semaine. Obtenez un diplôme reconnu par 
                    l'état. Enrichissez votre CV avec les programmes en alternance proposés par Reitec Info et gagnez un salaire tout en suivant votre formation
                .</p>
            </div>
        </div>

    <div class="faq-list px-2">
        <pre>
            <?php #var_dump(array_merge($cour_s['distCours'],$cour_s['notDistCours'])); ?>
        </pre>
            <ul class="w-100">
                <?php 
                    if(is_array($cour_s) && count($cour_s) > 0){
                        $cours = (array_merge($cour_s['distCours'],$cour_s['notDistCours'])); //shuffle($cours);
                        $mkr = ucwords(md5('reitec-info')); 
                        // var_dump($cours);
                        // $coursS = getCouurs($conf);
                        foreach ($cours as $crs) {
                        $key = $crs->id;
                        $desc = (strlen($crs->description) < 100) ? $crs->description : substr($crs->description,0,100).' ...';
                        $flc = [];
                        $name = ($crs->facilitateur[0] !== null) ? ucfirst($crs->facilitateur[0]).'&nbsp;'.ucfirst($crs->facilitateur[1]) : 'reitec-info Team';
                        if(!empty($crs->facilitateur)){
                            $flc['name'] = $crs->facilitateur[0].'&nbsp;'.$crs->facilitateur[1];
                            $flc['avatar'] = $crs->facilitateur[2];
                        }
                ?>
                    <li data-aosd="fade-up-" class="shadow hoverOn" data-link="li" reitec-link-cours="<?php echo($crs->id); ?>">
                        <div class="row py-0">
                            <div class="col-sm-2 d-sm-block d-none">
                                <div class="w-100 n-height shadow">
                                    <img src="reitec-images/img/logo.png<?php #echo($crs->facilitateur[2]); ?>" alt="reitec img" class="w-100">
                                </div>
                            </div>
                            <div class="col-sm-10 col-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a class="collapse pl-0" href="#-faq-list-<?php echo($key) ?>">
                                            <p><span class="bx bx-chevron-right"></span><small><?php echo($crs->categ); ?></small></p>
                                            <h1 class="fa fa-book mr-2"></h1> 
                                            <b class="mr-4"><?php echo($crs->titre); ?></b>
                                        </a>
                                    </div>
                                    <div id="faq-list-<?php echo($key) ?>" class="col-lg-12" data-parent=".faq-list-">
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <?php echo($desc); ?>
                                            </div>
                                            <div class="col-lg-12 col-12 mt-2">
                                                 <div class="row">
                                                    <div class="col-lg-8">
                                                        <span class="badge badge-default border rounded-pill px-4">
                                                            Dispensé par : <b><?php echo($name); ?></b>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <span class="btn btn-sm bg-prmy w-100 py-1 mt-2 text-white">Plus de détail</span>
                                                    </div>
                                                 </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                        }
                    ?>
                    <div class="w-100">
                        <nav aria-label="Page navigation example" class="w-100 mt-4">
                            <ul class="pagination pagination-sm justify-content-center d-flex p-0 m-0">
                                <li class="page-item d-none">
                                    <a href="">GG</a>
                                </li>
                                <?php if($prevpage > 1){ ?>
                                <!-- --------------------------------------- -->
                                <li class="page-item p-0 m-0" id="prev">
                                    <a href="?page=cours&tabIndx=<?php echo($prevpage)?>" class="page-link" aria-label="Next" id="btn-prev">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Prev</span>
                                    </a>
                                </li>
                                <!-- ------------------------------------------ -->
                                <?php }else{ ?>
                                <!-- ------------------------------------------ -->
                                <li class="page-item disabled pa-ge bg-danger p-0 m-0" id="prev">
                                    <a href="?page=cours&tabIndx=<?php echo($prevpage)?>" class="page-link" aria-label="Next" id="btn-prev">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Prev</span>
                                    </a>
                                </li>
                                <!-- -------------------------------------------- -->
                                <?php } ?>
                                <?php for($i = 0; $i < $total_page; $i++){ #if($total_page < 5){ ?>
                                    <li class="page-item pa-ge p-0 m-0" id="page_<?php echo($i+1); ?>">
                                        <a href="?page=cours&tabIndx=<?php echo($i+1)?>" class="page-link pa-ge" id="<?php echo($i+1); ?>">
                                            <?php echo($i+1); ?>
                                        </a>
                                    </li>   
                                <?php } #} ?>
                                <?php if($nextpage === $total_page) { ?>
                                <!-- ----------------------------------------------- -->
                                <li class="page-item disabled p-0 m-0" id="next">
                                    <a  href="?page=cours&tabIndx=<?php echo($nextpage)?>" class="page-link" aria-label="Next" id="btn-next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                <!-- ------------------------------------------------ -->
                                <?php }else{ ?>
                                <!-- ------------------------------------------------- -->
                                <li class="page-item p-0 m-0" id="next">
                                    <a  href="?page=cours&tabIndx=<?php echo($nextpage)?>" class="page-link" aria-label="Next" id="btn-next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                <!-- ------------------------------------------------ -->
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <?php
                    }else{
                ?>
                    <li>
                        <span class="text-secondary">
                            <b><i class="fa fa-circle-o mr-2"></i> Aucun cours disponible pour le moment</b>
                        </span>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </div>

    </div>
</section>
<!-- End F.A.Q Section -->
<script>
    $('[data-link=li]').on('click', function(e){
        const vb = $(this).attr('reitec-link-cours');
        const rt = btoa('reitec-info-goma-rdc-cours');
        window.location.href = (`?page=detailcours&_mkr=<?php echo($mkr) ?>=&_sk=${rt}&_id=${vb}`);
    })
    let active = '<?php echo($pageno) ?>';
    let desactive = 0;
    const totalPage = '<?php echo($total_page) ?>';
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