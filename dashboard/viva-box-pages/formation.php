<?php 
    // var_dump(onGetCours($g));
    $crs = (onRetriveDataCategorie($g,0) !== 0) ? onRetriveDataCategorie($g,0) : 0 ;
    $crss = (onRetriveDataCategorieSub($g,0) !== 0) ? onRetriveDataCategorieSub($g,0) : 0 ;
    $fcl =  (onRetrieveFCLTR($g) !== 0) ? (onRetrieveFCLTR($g)) : 0 ;
?>
<section class="mb-4">
    <div class="container my-5">
        <div class="w-100 d-flex justify-content-center">
        <!-- la vie est belle  -->
            <div class="col-lg-8">
                <div class="card card-outline card-primary">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            <h4 class="mb-2 text-prmy">Schudle formation</h4>
                            <p>Tous les partenaires et les abonnés du reitec seront informés par mail</p>
                        </div>
                        <p></p>
                    </div>
                    <div class="card-body">
                        <form id="form-addCours">
                            <div class="form-group">
                                <label for="level">Catégorie <span class="text-danger">*</span></label>
                                <select name="categ_cnnx" id="categ" class="form-control">
                                    <option value="">Selectionner une categorie</option>
                                    <?php 
                                        if($crs !== 0){
                                            $categ = $crs;
                                            foreach($categ as $cr){
                                    ?>
                                    <option value="<?php echo($cr->id); ?>"><?php echo($cr->categ) ?></option>
                                    <?php }} ?>
                                </select>
                                <b id="categ_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> selectioner la categorie du cours </b>
                            </div>
                            <div class="form-group">
                                <label for="level">Sous Catégorie <span class="text-danger">*</span></label>
                                <select name="subcateg_cnnx" id="subcateg" class="form-control">
                                    <option value="">Selectionner une categorie</option>
                                    <?php 
                                        if($crss !== 0){
                                            $scateg = $crss;
                                            foreach($scateg as $crd){
                                    ?>
                                    <option value="<?php echo($crd->id); ?>"><?php echo($crd->categ) ?></option>
                                    <?php }} ?>
                                </select>
                                <b id="subcateg_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> selectioner la sous categorie du cours </b>
                            </div>
                            <div class="form-group">
                                <label for="nom-cnnx">Titre <span class="text-danger">*</span></label>
                                <input type="text" id="nom-cnnx" name="titre_cnnx" class="form-control" placeholder="entrer votre nom ... ">
                                <b id="titre_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> Titre trop court </b>
                            </div>
                            <div class="col-lg-12 pt-2 mb-3 bg-light rounded border">
                                <label for="delais-cnnx">Delais de formation <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="date-s-cnnx">Date de Debut </label>
                                            <input type="date" id="date-s-cnnx" name="date_s_cnnx" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="date-e-cnnx">Date de la fin</label>
                                            <input type="date" name="date_e_cnnx" id="date-e-cnnx" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <b id="delais_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> Mauvais format de la date detecté</b>
                            </div>
                            <div class="form-group">
                                <label for="pst-cnnx">Prix de la formation en $ | ne pas mettre le sybole $<span class="text-danger">*</span></label>
                                <input type="text" id="pst-cnnx" name="prix_cnnx" class="form-control" placeholder="entrer le prix de la formation">
                                <b id="prix_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> Le montant entrer n'est pas valide ex : 300,43 sans symbole </b>
                            </div>
                            <div class="form-group">
                                <label for="desc-cnnx">Synthèse de la formation<span class="text-danger">*</span></label>
                                <textarea type="text" id="desc-cnnx" name="desc_cnnx" class="form-control" placeholder="entrer description "></textarea>
                                <b id="desc_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> Le montant entrer n'est pas valide ex : 300,43 sans symbole </b>
                            </div>
                            <div class="form-group">
                                <label for="fcl-cnnx">Facilitateur <span class="text-danger">*</span></label>
                                <select name="fcl_cnnx" id="fcl-cnnx" class="form-control">
                                    <option value="">Selectionner une facilitateur</option>
                                    <?php 
                                        if($fcl !== 0){
                                            // $categ = $crs;
                                            foreach($fcl as $cr){
                                    ?>
                                    <option value="<?php echo($cr->id); ?>"><?php echo(ucfirst($cr->nom).'&nbsp;'.ucfirst($cr->postnom)) ?></option>
                                    <?php }} ?>
                                </select>
                                <b id="prix_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> Le montant entrer n'est pas valide ex : 300,43 sans symbole </b>
                            </div>
                            <div class="form-group" dav-attr="append">
                                <label for="kind-cnnx">Type du contenu du cours <span class="text-danger">*</span></label>
                                <select name="kind_cnnx" id="kind-cnnx" class="form-control mb-3">
                                    <option value="">Selectionner</option>
                                    <option value="aspdf">PDF , Document Word</option>
                                    <option value="asvideourl">URL VIDEO</option>
                                    <option value="astext">Text Brute à écrire</option>
                                </select>
                                <b id="kind_cnnx" class="text-danger d-none"><span class="fa fa-warning"></span> selectioner le type de contenu </b>
                                <b id="kind_cnnx_" class="text-danger d-none"><span class="fa fa-warning"></span> entrer un format valide svp ce type de fichier n'est pas pris en charge</b>

                            </div>
                            <div class="form-group text-center">
                                <b class="text-danger my-2">
                                    <em class="d-none-" ouput-text="ouput"></em>
                                </b>
                                <button class="btn bg-primary w-100 mt-4 btn-create" type="submit">
                                    <span>Publier</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const getArticles = function(indx){
        var op = document.createElement('option');
        $(op).attr({'value':'','id':'val-0'}).html('selectionner');
        const slct = $('[name=subcateg_cnnx]');
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'viva-box-scripts/php/reqxhr.php?abc=subcateg&item='+(indx), true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
                if(xhr.responseText !== ''){
                    let p = JSON.parse(xhr.responseText);
                    $(slct).html(null);
                    $(slct).append(op)
                    p.forEach(object => {
                        for (const key in object) {
                            if (Object.hasOwnProperty.call(object, key)) {
                                const element = object[key];
                                // console.log(key);
                                const opts = document.createElement('option');
                                $(opts).attr({'value':key,'id':'val-' + key}).html(element);
                                $(slct).append(opts);
                            }
                        }
                    });
                }
            }
        }
        xhr.send(null);
    }
    let isFile = function(e){
        //Get count of selected files
        var countFiles = $(e)[0].files.length;
        var imgPath = $(e)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = $("#image-holder");
        image_holder.empty();
        if (extn == "doc" || extn == "ppt" || extn == "pdf" || extn == "docx" || extn == "xlsx" || extn == "xls") {
            $('[id=kind_cnnx_]').addClass('d-none');
            return true;
        } else {
            $('[id=kind_cnnx_]').removeClass('d-none');
            return false;
            // alert("Pls select only images");
        }
    }
    let isUrl = function(e){ 
        if(/(https|http|ftp|steam):\/\//.test(e)) return true;
        else return false;
    }
    const canAdd = function(){
        var Y = false;
        let _tit = function(){
            var vl = false;
            if($('[name=titre_cnnx]').val().length >=3){
                $('[id=titre_cnnx]').addClass('d-none');
                vl = true;
                $('[name=titre_cnnx]').removeClass('border-danger');
            }else{
                $('[id=titre_cnnx]').removeClass('d-none');
                $('[name=titre_cnnx]').addClass('border-danger');
                vl = false;
            }
            return vl;
        }
        let _delais = function(){
            var vl = false;
            if(!isNaN($('[name=delais_cnnx]').val()) && $('[name=delais_cnnx]').val().length > 0){
                $('[id=delais_cnnx]').addClass('d-none');
                vl = true;
                $('[name=delais_cnnx]').removeClass('border-danger');
            }else{
                $('[id=delais_cnnx]').removeClass('d-none');
                $('[name=delais_cnnx]').addClass('border-danger');
                vl = false;
            }
            return vl;
        }
        // ------------------------
        let _prx = function(){
            var vl = false;
            if(!isNaN($('[name=prix_cnnx]').val()) && $('[name=prix_cnnx]').val().length > 0){
                $('[id=prix_cnnx]').addClass('d-none');
                vl = true;
                $('[name=prix_cnnx]').removeClass('border-danger');
            }else{
                $('[id=prix_cnnx]').removeClass('d-none');
                $('[name=prix_cnnx]').addClass('border-danger');
                vl = false;
            }
            return vl;
        }
        // ------------------------
        let _categ = function(){
            var vl = false;
            if($('[name=categ_cnnx]').val() !== ''){
                $('[id=categ_cnnx]').addClass('d-none');
                vl = true;
                $('[name=categ_cnnx]').removeClass('border-danger');
            }else{
                $('[id=categ_cnnx]').removeClass('d-none');
                $('[name=categ_cnnx]').addClass('border-danger');
                vl = false;
            }
            return vl;
        }
        // -------------------------
        let _desc = function(){
            var vl = false;
            if($('[name=desc_cnnx]').val() !== ''){
                $('[id=desc_cnnx]').addClass('d-none');
                vl = true;
                $('[name=desc_cnnx]').removeClass('border-danger');
            }else{
                $('[id=desc_cnnx]').removeClass('d-none');
                $('[name=desc_cnnx]').addClass('border-danger');
                vl = false;
            }
            return vl;
        }
        // -------------------------
        let _subcateg = function(){
            var vl = false;
            if($('[name=subcateg_cnnx]').val() !== ''){
                $('[id=subcateg_cnnx]').addClass('d-none');
                vl = true;
                $('[name=subcateg_cnnx]').removeClass('border-danger');
            }else{
                $('[id=subcateg_cnnx]').removeClass('d-none');
                $('[name=subcateg_cnnx]').addClass('border-danger');
                vl = false;
            }
            return vl;
        }
        // -------------------------
        let _kind = function(){
            var vl = false;
            if($('[name=kind_cnnx]').val() !== ''){
                $('[name=kind_cnnx]').removeClass('border-danger');
                $('[id=kind_cnnx]').addClass('d-none');
                var knd = $('[name=kind_cnnx]').val();
                switch (knd) {
                    case 'aspdf':
                        if(isFile($('[id=crskind]'))){
                            $('[id=kind_cnnx]').addClass('d-none');
                            vl = true;
                            $('[id=crskind]').removeClass('border-danger');
                        }else{
                            $('[id=kind_cnnx]').addClass('d-none');
                            vl = false;
                            $('[id=crskind]').removeClass('border-danger');
                        }
                        return vl;
                    case 'astext':
                        return true;
                    case 'asvideourl':
                        if(isUrl($('[id=crskind]').val())){
                            $('[id=kind_cnnx_]').addClass('d-none');
                            vl = true;
                            $('[id=crskind]').removeClass('border-danger');
                        }else{
                            $('[id=kind_cnnx_]').removeClass('d-none');
                            $('[id=kind_cnnx_]').html('Entrer un url correct svp');
                            vl = false;
                            $('[id=crskind]').removeClass('border-danger');
                        }
                        return vl;
                    default:
                        break;
                }
            }else{
                $('[id=kind_cnnx]').removeClass('d-none');
                $('[name=kind_cnnx]').addClass('border-danger');
                vl = false;
            }
            return vl;
        }
        // -------------------------&& _tit() && _delais() && _prx() && _categ() && _subcateg()
        return _kind() && _tit() && _prx() && _categ() && _subcateg();
    }
    $('[name=categ_cnnx]').on('input', function(e){
        const idx = parseInt($(this).val());
        e.preventDefault();
        getArticles(idx);
    })
    $('[name=kind_cnnx]').on('input', function(e){
        const vl = $(this).val();
        const _dv = $('[dav-attr=append]');
        const elem = document.createElement('input');
        $('#crskind').remove();
        $('[id=kind_cnnx_]').addClass('d-none');
        switch (vl) {
            case 'aspdf':
                $(elem).attr({'id':'crskind','name':'coursKind','class':'form-control','type':'file'})
                .on('input',function(e){
                    var countFiles = $(this)[0].files.length;
                    var imgPath = $(this)[0].value;
                    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                    var image_holder = $("#image-holder");
                    image_holder.empty();
                    // extn == "doc" || extn == "ppt" || extn == "pdf" || extn == "docx" || extn == "xlsx" || extn == "xls"
                    if (extn === "pdf") {
                        $('[id=kind_cnnx_]').addClass('d-none');
                        return true;
                    } else {
                        $('[id=kind_cnnx_]').removeClass('d-none');
                    }
                });
                $(_dv).append(elem);
                break;
            case 'astext':
                $(elem).attr({'id':'crskind','readonly':'readonly','name':'coursKind','class':'form-control','type':'text','value':'lors de la soumission vous serez redireger'})
                $(_dv).append(elem);
                break;
            case 'asvideourl':
                $(elem).attr({'id':'crskind','name':'coursKind','class':'form-control','type':'url','placeholder':'http://'})
                .on('input',function(e){
                    isUrl($(this).val())
                });
                $(_dv).append(elem);
                break;
            default:
                break;
        }
    })
    $('#form-addCours').on('submit', function(e){
        e.preventDefault();
        if(canAdd()){
            const sp = document.createElement('span');
            $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
            if($('#crskind').attr('type') !== 'text'){
                const frm = new FormData(document.getElementById('form-addCours'));
                const xhr = new XMLHttpRequest();
                $('.btn-create').attr('disabled','disabled').append(sp)
                xhr.open('POST', `viva-box-scripts/php/reqxhr.php?cba=add`,true);
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        const rs = parseInt(xhr.responseText);
                        switch (rs) {
                            case 200:
                                $('[ouput-text=ouput]').attr('class','d-none')
                                toastr.success('Le cours a été ajouté avec succès');
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
                                $('#span-loader').remove();
                                break;
                            case 503:
                                toastr.error('Ce cours existe déjà ');
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
                                $('#span-loader').remove();
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Ce cours existe déjà</span>');
                                $('[name=email_cnnx]').addClass('border-danger');
                                break;
                            default:
                                $(document).Toasts('create', {
                                    class: 'bg-danger m-1',
                                    body: '<strong>Tentatives d ajout</strong><br> Une erreur serveur vient de se produire',
                                    title: 'Admin System',
                                    subtitle: 'Ajout du cours ',
                                    autohide: true,
                                    delay: 2000,
                                    position: 'bottomRight',
                                    icon: 'fas fa-envelope fa-lg',
                                })
                                console.log(xhr.responseText);
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
                                $('#span-loader').remove();
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'opération</span>');
                                break;
                        }
                    }
                }
                xhr.send(frm);
                // console.log(JSON.stringify($('#form-addCours').serializeArray()))
            }else{
                const data = JSON.stringify($('#form-addCours').serializeArray());
                const d = btoa('david_maene_est_le_meilleur_de_tous_les_geek');
                const vm = btoa(new Date().getTime())
                window.location.replace(`?page=writecours&_access=${d}&_session=${vm}&data=${data}`);
                // console.log(JSON.stringify($('#form-addCours').serializeArray()))
                // console.log($('#crskind').attr('type'))
            }
        }
    })
</script>