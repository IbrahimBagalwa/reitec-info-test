<?php $src = $contt->extra ?? '<h1>Erreur Aucun contenu trouvé</h1>'; ?> 
<div class="row bg-info" id="myNav" data-spy="affix" data-offset-top="60" data-offset-bottom="100">
    <div class="col-md-3 d-none">
        <ul class="nav flex-column nav-tabs h-100 affix" id="myNav">
            <li class="nav-link active"><a href="#one">Tutorial One</a></li>
            <li class="nav-link"><a href="#two">Tutorial Two</a></li>
            <li class="nav-link"><a href="#three">Tutorial Three</a></li>
        </ul>
    </div>
    <div class="col-md-12">
        <?php echo($src) ?>
    </div>
</div>