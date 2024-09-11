<?php 
    // ----------------------------------------------------
    include_once('./reitec-model/model.cours.php');
    include_once('./reitec-model/model.facilitateur.php');
    include_once('./reitec-model/model.student.php');
    include_once('./reitec-scripts/php/_config.php');
    include_once('./reitec-model/model.categ.php');
    include_once('./reitec-model/model.formation.php');
    include_once('./reitec-model/thread.php');

    // -----------------------------------------------------
    $pages = scandir('reitec-pages/');
    $page = 'home';
    $conc = '.php';
    $incPage = '';
    if(isset($_GET['page'])){
        $incPage = $_GET['page']; 
        if(in_array($incPage.$conc,$pages, true)){
            $incPage = $incPage.$conc;
        }else $incPage = $page.$conc;
    }else $incPage = $page.$conc;
    // _compterUser($incPage ,$conf);
?>