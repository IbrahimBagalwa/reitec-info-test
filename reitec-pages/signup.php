<?php
    $id = isset($_GET['_cb']) ? (int) $_GET['_cb'] : 0;
    $ttl = isset($_GET['_cbname']) ? base64_decode($_GET['_cbname']) : null;
?>
<div class="container my-5">
    <div class="w-100 d-flex justify-content-center">
        <div class="col-lg-6 col-12 shadow pt-4">
            <div class="card-title">
                <h4 class="mb-2 text-prmy">Formulaire de démande d'une formation</h4>
                <p>Formulaire de reservation de place au sein de la formation <strong></strong></p>
            </div>
            <?php 
                if(isset($_GET['_cbb'])){
            ?>
            <div class="alert alert-warning">
                <h6>
                    Veillez selectionner une formation de votre choix dans la ribruque 
                    <a href="?page=formations"><strong>Formation</strong></a> Puis remplissez ce formulaire
                </h6>
            </div>
            <?php
                }
            ?>
            <form id="form-inscription">
                <div class="col-lg-12 border rounded section-bg py-3">
                    <h6 class="mb-2 font-weight-bold">Information sur la formation</h6>
                    <div class="form-group">
                        <label for="nom-cnnx">Titre de la formation <span class="text-danger">*</span></label>
                        
                        <?php 
                            if($id !== 0 && $ttl !== null){5
                        ?>
                            <input type="text" name="ttle" readonly value="<?php echo(ucfirst($ttl)); ?>" class="form-control font-weight-bold">
                            <input type="number" name="idformation" id="" class="form-control d-none-" value="<?php echo($id); ?>" readonly hidden>
                        <?php
                            }else{
                        ?>
                            <input type="text" id="title-case" name="title-formation" value="" class="form-control font-weight-bold" placeholder="Entrer le titre de la formation ">
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold">Personne requirante</h6>
                    <div class="form-group">
                        <label for="nom-cnnx">Nom <span class="text-danger">*</span></label>
                        <input type="text" id="nom-cnnx" name="nom_cnnx" class="form-control" placeholder="entrer votre nom ... ">
                    </div>
                    <div class="form-group">
                        <label for="pst-cnnx">Postnom <span class="text-danger">*</span></label>
                        <input type="text" id="pst-cnnx" name="pst_cnnx" class="form-control" placeholder="entrer votre post nom ... ">
                    </div>
                    <!-- <div class="form-group d-none" hidden>
                        <label for="pre-cnnx">Prénom <small class="badge badge-default border">ce champs n'est pas obligatoir</small></label>
                        <input type="text" id="pre-cnnx" name="pre_cnnx" class="form-control" placeholder="entrer votre prenom ... ">
                    </div> -->
                    <div class="form-group">
                        <label for="add-cnnx">Adresse <small class="badge badge-default border">ce champs n'est pas obligatoir</small></label>
                        <input type="text" id="add-cnnx" name="add_cnnx" class="form-control" placeholder="Q. ... C. ... Av. ... Ville ...">
                    </div>
                    <!-- <div class="form-group d-none">
                        <label for="nn-cnnx">NN (Carte d'électeur) <small class="badge badge-default border">ce champs n'est pas obligatoir</small></label>
                        <input type="number" id="nn-cnnx" min="1" length="16" name="nn_cnnx" class="form-control" placeholder="entrer votre Numero national ... ">
                    </div> -->
                    <div class="form-group">
                        <label for="gender-cnnx">Genre <span class="text-danger">*</span></label>
                        <select name="gender_cnnx" id="gender-cnnx" class="form-control">
                            <option value="">Selectionner</option>
                            <option value="masculin">Masculin</option>
                            <option value="feminin">Feminin</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold">Contacts</h6>
                    <div class="form-group ">
                        <label for="email-cnnx">Adresse email <span class="text-danger">*</span></label>
                        <input type="email" id="email-cnnx" name="email_cnnx" class="form-control" placeholder="entrer votre adresse mail ... ">
                    </div>
                    <div class="form-group">
                        <label for="tele-cnnx">Numero de téléphone <span class="text-danger">*</span></label>
                        <input type="text" id="tele-cnnx" name="tele_cnnx" maxlength="13" class="form-control" placeholder="entrer votre numero de téléphone ... ">
                    </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold">De quelle manière voulez vous suivre cette formation ?</h6>
                    <div class="row">
                        <div class="form-group col-lg-6 col-6 text-center form-group-sm">
                            <label for="online-cnnx">En ligne</label>
                            <input type="radio" name="type_form" id="online-cnnx" class="form-control" value="online" style="height: 25px">
                        </div>
                        <div class="form-group col-lg-6 col-6 text-center form-group-sm">
                            <label for="offline-cnnx">Dans le centre</label>
                            <input type="radio" name="type_form" id="offline-cnnx" class="form-control" value="offline" style="height: 25px">
                        </div>
                        <div class="col-lg-12 text-center text-danger">
                            <b id="online_cnnx" class="d-none"><span class="fa fa-warning mr-1"></span><span>Selectionner un cas</span></b>
                        </div>
                    </div>
                    <div class="form-group mt-2 border-top pt-2 case-online">
                        <label for="center-cnnx">Choisissez le lieu de formation<span class="text-danger">*</span></label>
                        <select name="center_cnnx" id="center-cnnx" class="form-control">
                            <option value="">Selectionner le centre de formation</option>
                            <option value="reitec">Centre reitec</option>
                            <option value="meorg">Dans mon organisation</option>
                            <option value="mepart">Chez un partenaire</option>
                        </select>
                        <b class="place_form text-danger d-none">
                            <span class="fa fa-warning mr-1"></span>
                            <span>Selectionner le lieu de formation</span>
                        </b>
                    </div>
                    <div class="form-group d-none case-reitec-ctr">
                        <label for="place-reitec-cnnx">Choisie le center de formation<span class="text-danger">*</span></label>
                        <select name="place_reitec_case" id="place-reitec-cnnx" class="form-control">
                            <option value="">Selectioner le lieu</option>
                            <option value="Goma">Goma</option>
                            <option value="Bukavu">Bukavu</option>
                            <option value="Bunia">Bunia</option>
                            <option value="Kinshasa">Kinshasa</option>
                            <option value="Beni">Beni</option>
                            <option value="Kalemie">Kalemie</option>
                        </select>
                        <b class="d-none case-place-c text-danger">
                            <span class="fa fa-warning mr-1"></span>
                            <span>Selectionner le centre  </span>
                        </b>
                    </div>
                    <div class="form-group d-none case-meorg-mepart">
                        <label for="place-o-cnnx">Entrez le lieu<span class="text-danger">*</span></label>
                        <input type="text" name="place_o_cnnx" id="place-o-cnnx" class="form-control" placeholder="Entrez le lieu">
                        <b class="d-none case-place-o text-danger">
                            <span class="fa fa-warning mr-1"></span>
                            <span>Entrer l'adresse </span>
                        </b>
                    </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold">Sous quel status vous vous enregistrez</h6>
                    <div class="form-group">
                        <label for="kind-cnnx">Vous êtes une Organisation | Un Individu<span class="text-danger">*</span></label>
                        <select name="kind-pos" id="kind-cnnx" class="form-control">
                            <option value="individuel">Un individu ou personne requirante</option>
                            <option value="organisation">Une Organisation ou association</option>
                        </select>
                    </div>
                    <div class="form-group d-none btn-download-">
                        <h6 class="mb-2 font-weight-bold">Télécharger le formulaire ici !</h6>
                        <a href="reitec-files/attached-files/RTEC_Formulaire_de_Demande_de_Formation.docx" class="btn btn-default border btn-sm btn-primary w-100">
                            <span>Telecharger le formulaire de demande de formation</span>
                        </a>
                        <span>
                            Veillez devoir envoyer ce formulaire à l'adresse : <br>
                            <b class="text-primary">
                                <a href="mailto:info@reitec-info.org">info@reitec-info.org</a>
                            </b> Et nous vous reontacterons dans le plus bref délais
                        </span>
                    </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold">Ce mot de passe sera utilisé pour acceder à votre espace d'apprentissage en ligne</h6>
                    <div class="form-group">
                        <label for="pwd-cnnx">Mot de passe <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control" d-state="hidden" name="pwd_cnnx" id="pwd-cnnx" placeholder="Mot de passe">
                            <div class="input-group-append hoverOn show-pwd">
                                <div class="input-group-text" id="pslock">
                                    <span class="fa fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom-cnnx-rtp">Repete le mot de passe <span class="text-danger">*</span></label>
                        <input type="password" id="nom-cnnx-rtp" name="rep_pwd" class="form-control" placeholder="Repete le mot de passe ... ">
                    </div>
                </div>
                <div class="form-group text-center">
                    <b class="text-danger my-2">
                        <em class="d-none-" ouput-text="ouput"></em>
                    </b>
                    <button class="btn bg-prmy w-100 mt-4 btn-create" type="submit">
                        <span>Soumetre le formulaire</span>
                    </button>
                </div>
            </form>
            <div class="form-group d-none p-3 section-bg border rounded btn-download">
                <h6 class="mb-2 font-weight-bold">Télécharger le formulaire ici !</h6>
                <p>Nous avons pris en compte votre démande de formation mais pour le cas d'<b>Organisation vous devez télécharger ce formulaire et le rendre à l'adresse indiquée.</b></p>
                <a href="reitec-files/attached-files/RTEC_Formulaire_de_Demande_de_Formation.docx" class="btn btn-default border btn-sm btn-primary w-100">
                    <span>Telecharger le formulaire de demande de formation </span>
                </a>
                <span>
                    Veillez devoir envoyer ce formulaire à l'adresse : <br>
                    <b class="text-primary">
                        <a href="mailto:info@reitec-info.org">info@reitec-info.org</a>
                    </b> Et nous vous recontacterons dans le plus bref délais
                </span>
            </div>
            <div class="col-12 mb-4">
                <!-- <a href="?page=recoverpassword" class="d-block"> <span class="bx bx-chevron-right mr-2"></span>J'ai oublier mon mot de passe</a> -->
                <a href="?page=signin" class="d-block"><span class="bx bx-chevron-right mr-2"></span>J'ai déjà un compte | <b>Connexion</b></a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e){
        $('[name=type_form]').on('input', function(e){
            switch($(this).val()){
                case 'offline':
                    $('.case-online').removeClass('d-none');
                    break;
                case 'online':
                    $('.case-meorg-mepart').addClass('d-none');
                    $('.case-reitec-ctr').addClass('d-none');
                    $('.case-online').addClass('d-none');
                    break;
                default:
                    console.log('unknown key ' + $(this).val());
                    break;
            }
        })
        $('[name=center_cnnx]').on('input', function(e){
            if($(this).val() === 'meorg' || $(this).val() === 'mepart'){
                $('.case-reitec-ctr').addClass('d-none');
                $('.case-meorg-mepart').removeClass('d-none');
            }
            if($(this).val() === 'reitec'){
                $('.case-reitec-ctr').removeClass('d-none');
                $('.case-meorg-mepart').addClass('d-none');
            }
        })
        // $('[name=kind-pos]').on('input', function(e){
        //     if($(this).val() === 'organisation'){
        //         $('.btn-download').removeClass('d-none');
        //     }else{
        //         $('.btn-download').addClass('d-none');
        //     }
        // })
        const sp = document.createElement('span');
        $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
        $('.show-pwd').on('click', function(e){
            if($('#pwd-cnnx').attr('d-state') === 'hidden'){
                $('#pwd-cnnx').attr({'type':'text','d-state':'shown'}); 
                $('#pslock').html('<span class="fa fa-eye"></span>');
            }else{
                $('#pwd-cnnx').attr({'type':'password','d-state':'hidden'}); 
                $('#pslock').html('<span class="fa fa-eye-slash"></span>');
            }
        })
        // ----------------------------
        let canSubmit = function(){
            var Y = false;
            const _LieuxForm = function(){
                let e = false;
                const d =  document.getElementsByName('type_form');
                // let d = $('[name=type_form]').val();
                if(d[0].checked || d[1].checked){
                    $('#online_cnnx').addClass('d-none');
                    // switch(d){
                        if(d[0].checked){
                            e = true;
                        }
                        if(d[1].checked){
                            const b = $('[name=center_cnnx]').val();
                            if(b !== ''){
                                $('.place_form').addClass('d-none');
                                if(b === 'meorg' || b === 'mepart'){
                                   if($('[name=place_o_cnnx]').val() !== ''){
                                        $('.case-place-o').addClass('d-none');
                                        e= true;
                                   }else{ 
                                       $('.case-place-o').removeClass('d-none');
                                       e = false; 
                                    }
                                }
                                if(b === 'reitec'){
                                   if($('[name=place_reitec_case]').val() !== ''){
                                      e = true;
                                      $('.case-place-c').addClass('d-none');
                                   }else{
                                     $('.case-place-c').removeClass('d-none');
                                     e = false;
                                   }
                                }
                            }else{
                                e = false;
                                $('.place_form').removeClass('d-none');
                            }
                        }
                    // }
                }else{
                    e = false;
                    $('#online_cnnx').removeClass('d-none');
                }
                return e;
            }
            const alertPhone = function(){
                phn = false;
                $('[ouput-text=ouput]')
                    .attr('class','d-block')
                    .html('<span class="fa fa-warning mr-2"></span><span>Le numero de telephone n\'est pas correcte ex: +243 8.. </span>');
                $('[name=tele_cnnx]').addClass('border-danger');
            }
            //   -----------------------
            const _titleForm = function(){
                if(document.getElementById('title-case')){
                    if($('[name=title-formation]').val().length > 3){
                        $('[name=title-formation]').removeClass('border-danger');
                        e = true;
                    }else{
                        e = false;
                        $('[name=title-formation]').addClass('border-danger');
                    }
                }else  e = true;
                return e;
            }
            const _nom = function(){
                var n = false;
                if(/^[a-zA-Z]{2,18}$/.test($('[name=nom_cnnx]').val())){
                    $('[name=nom_cnnx]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    n = true;
                }else{
                    n = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Le nom ne doit pas contenir les caracteres spéciaux et doit avoir la taille d\'aumoins 2 lettres</span>')
                    $('[name=nom_cnnx]').addClass('border-danger');
                }
                return n;
            }
            //   ----------------------
            const _postnom = function(){
                var ps = false;
                if(/^[a-zA-Z]{2,18}$/.test($('[name=pst_cnnx]').val())){
                    $('[name=pst_cnnx]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    ps = true;
                }else{
                    ps = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Le postnom ne doit pas contenir les caracteres spéciaux et doit avoir la taille d\'aumoins 2 lettres</span>')
                    $('[name=pst_cnnx]').addClass('border-danger');
                }
                return ps;
            }
            //   -----------------------
            const _genre = function(){
                var gdr = false;
                if($('[name=gender_cnnx]').val() !== ''){
                    $('[name=gender_cnnx]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    gdr = true;
                }else{
                    gdr = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Selectionner le genre</span>')
                    $('[name=gender_cnnx]').addClass('border-danger');
                }
                return gdr;
            }
            //  -------------------------
            const _email = function(){
                var em = false;
                if((/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/).test($('[name=email_cnnx]').val())){
                    $('[name=email_cnnx]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    em = true;
                }else{
                    em = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>L\'adresse email entrée ne semble pas correcte</span>')
                    $('[name=email_cnnx]').addClass('border-danger');
                }
                return em;
            }
            //  ------------------------
            const _phone = function(){
                var phn = false;
                if($('[name=tele_cnnx]').val().length >= 10){
                    const nmb = $('[name=tele_cnnx]').val();
                    const plus = nmb.substring(0,1);
                    const code = function (){
                        const L = parseInt((nmb.length - 1));
                        switch (L) {
                            case 10:
                            return nmb.substring(1,2);
                            case 11:
                            return nmb.substring(1,3);
                            case 12:
                            return nmb.substring(1,4);
                            default:
                                return parseInt(nmb.length - 1);
                        }
                    }
                    if(plus === '+'){
                        if(/^[1-9]/.test(code())){
                            if(/^[0-9]/.test(nmb.substring(code().length))){
                                $('[name=tele_cnnx]').removeClass('border-danger');
                                $('[ouput-text=ouput]').attr('class','d-none');
                                phn = true;
                            }else alertPhone();
                        }else alertPhone();
                    }else alertPhone();
                }else alertPhone();
                
                return phn;
            }
            //  ------------------------
            const _pwd = function(){
                var pwd = false;
                if($('[name=pwd_cnnx]').val().length > 5){
                    if($('[name=pwd_cnnx]').val() === $('[name=rep_pwd]').val()){
                        pwd = true;
                        $('[name=pwd_cnnx]').removeClass('border-danger');
                        $('[name=rep_pwd]').removeClass('border-danger');
                        $('[ouput-text=ouput]').attr('class','d-none');
                    }else{
                        $('[name=pwd_cnnx]').addClass('border-danger');
                        $('[name=rep_pwd]').addClass('border-danger');
                        $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Les mots de passe ne sont pas identiques</span>')
                        pwd = false;
                    }
                }else{
                    $('[name=pwd_cnnx]').addClass('border-danger');
                    pwd = false;
                }
                return pwd;
            }
        // ------------------------- 
          return Y = _email() && _nom() && _postnom() && _genre() && _phone() && _pwd() && _titleForm() && _LieuxForm();
        }
        $('#form-inscription').on('submit', function(e){
            e.preventDefault();
            if(canSubmit()){
                let _case =  document.getElementsByName('type_form');
                let kind = _case[0].checked ? 'online' : 'offline';
                const frm = new FormData(document.getElementById('form-inscription'));
                const xhr = new XMLHttpRequest();
                // console.log($(this).serialize());
                $('.btn-create').attr('disabled','disabled').append(sp)
                xhr.open('POST', `reitec-scripts/php/_xhr.request.php?key=frmt&kind=${kind}`,true);
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        const rs = parseInt(xhr.responseText);
                        switch (rs) {
                            case 200:
                                console.log($('[name=kind-pos]').val())
                                const idCours = $('[name=idformation]').val();
                                $('[ouput-text=ouput]').attr('class','d-none');
                                if($('[name=kind-pos]').val() === 'organisation'){
                                    $('#span-loader').remove();
                                    $('.btn-download').removeClass('d-none');
                                    $('#form-inscription').remove()
                                }
                                else {
                                    $('.btn-download').addClass('d-none');
                                    setTimeout(() => {
                                        window.location.replace(`?page=readingcours&_mkr=0e7c58059088cc0734f6357e857c634f88776a35&_spc=${idCours}`);
                                    }, 500);
                                }
                                break;
                            case 305:
                                $('.btn-create').removeAttr('disabled');
                                $('#span-loader').remove();
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Vous ne pouvez pas vous inscrire 2 fois à une même formation</span>');
                                break;
                            case 503:
                                $('.btn-create').removeAttr('disabled');
                                $('#span-loader').remove();
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Cet adresse email est déjà utilisée par un autre compte</span>');
                                $('[name=email_cnnx]').addClass('border-danger');
                                break;
                            default:
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
                                $('#span-loader').remove();
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'inscription</span>');
                                    console.log(xhr.response);
                                break;
                        }
                    }
                }
                xhr.send(frm);
            }
        })
    })
</script>