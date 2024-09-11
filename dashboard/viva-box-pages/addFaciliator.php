<?php 
    // var_dump(onGetCours($g));
    $crs = (onGetCours($g) !== 0) ? onGetCours($g) : 0 ;
?>
<section class="mb-4">
    <div class="container my-5">
        <div class="w-100 d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card card-outline card-primary">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            <h4 class="mb-2 text-prmy">Add a new facilitator</h4>
                            <p>Add a new facilitator and attribute him some</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-inscription">
                            <div class="form-group">
                                <label for="nom-cnnx">Nom <span class="text-danger">*</span></label>
                                <input type="text" id="nom-cnnx" name="nom_cnnx" class="form-control" placeholder="entrer votre nom ... ">
                            </div>
                            <div class="form-group">
                                <label for="pst-cnnx">Postnom <span class="text-danger">*</span></label>
                                <input type="text" id="pst-cnnx" name="pst_cnnx" class="form-control" placeholder="entrer votre post nom ... ">
                            </div>
                            <div class="form-group">
                                <label for="level">Niveau d'accès</label>
                                <select name="access_cnnx" id="level" class="form-control">
                                    <option value="13000">Enseigrant simple</option>
                                    <option value="19000">Master Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cours">Attrubutions des cours </label>
                                <select name="cours_cnnx" id="cours" class="form-control">
                                    <option value="">Selectionner un cours</option>
                                    <?php 
                                        if($crs !== 0){
                                            $cours = $crs;
                                            foreach($cours as $cr){
                                    ?>
                                    <option value="<?php echo($cr->id); ?>"><?php echo($cr->titre) ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender-cnnx">Genre <span class="text-danger">*</span></label>
                                <select name="gender_cnnx" id="gender-cnnx" class="form-control">
                                    <option value="">Selectionner</option>
                                    <option value="masculin">Masculin</option>
                                    <option value="feminin">Feminin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nn-cnnx">NN (Carte d'électeur) <small class="badge badge-default border">ce champs n'est pas obligatoir</small></label>
                                <input type="number" id="nn-cnnx" min="1" length="16" name="nn_cnnx" class="form-control" placeholder="entrer votre Numero national ... ">
                            </div>
                            <div class="form-group">
                                <label for="email-cnnx">Adresse email <span class="text-danger">*</span></label>
                                <input type="email" id="email-cnnx" name="email_cnnx" class="form-control" placeholder="entrer votre adresse mail ... ">
                            </div>
                            <div class="form-group">
                                <label for="tele-cnnx">Numero de téléphone <span class="text-danger">*</span></label>
                                <input type="text" id="tele-cnnx" name="tele_cnnx" maxlength="13" class="form-control" placeholder="entrer votre numero de téléphone ... ">
                            </div>
                            <div class="form-group">
                                <label for="pwd-cnnx">Donne lui un Mot de passe d'accès<span class="text-danger">*</span></label>
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
                            <div class="form-group text-center">
                                <b class="text-danger my-2">
                                    <em class="d-none-" ouput-text="ouput"></em>
                                </b>
                                <button class="btn bg-primary w-100 mt-4 btn-create" type="submit">
                                    <span>Ajouter</span>
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
    $(document).ready(function(e){
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
            const alertPhone = function(){
                phn = false;
                $('[ouput-text=ouput]')
                    .attr('class','d-block')
                    .html('<span class="fa fa-warning mr-2"></span><span>Le numero de telephone n\'est pas correcte ex: +243 8.. </span>');
                $('[name=tele_cnnx]').addClass('border-danger');
            }
            //   -----------------------
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
            // -------------------------
            const _access = function(){
                var gdr = false;
                if($('[name=access_cnnx]').val() !== ''){
                    $('[name=access_cnnx]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    gdr = true;
                }else{
                    gdr = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Selectionner le niveau d\'accès</span>')
                    $('[name=access_cnnx]').addClass('border-danger');
                }
                return gdr;
            }
            // ------------------------
            const _cours = function(){
                var gdr = false;
                if($('[name=cours_cnnx]').val() !== ''){
                    $('[name=cours_cnnx]').removeClass('border-danger');
                    $('[ouput-text=ouput]').attr('class','d-none'); 
                    gdr = true;
                }else{
                    gdr = false;
                    $('[ouput-text=ouput]')
                        .attr('class','d-block')
                        .html('<span class="fa fa-warning mr-2"></span><span>Selectionner le cours</span>')
                    $('[name=cours_cnnx]').addClass('border-danger');
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
          return Y = _email() && _nom() && _postnom() && _genre() && _access() && _phone() && _pwd() && _cours();
        }
        $('#form-inscription').on('submit', function(e){
            e.preventDefault();
            if(canSubmit()){
                const frm = new FormData(document.getElementById('form-inscription'));
                const xhr = new XMLHttpRequest();
                $('.btn-create').attr('disabled','disabled').append(sp)
                xhr.open('POST', `viva-box-scripts/php/reqxhr.php?cba=add`,true);
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        const rs = parseInt(xhr.responseText);
                        switch (rs) {
                            case 200:
                                $('[ouput-text=ouput]').attr('class','d-none')
                                toastr.success('Le facilitateur a été ajouté avec succès');
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
                                break;
                            case 503:
                                toastr.error('Cet adresse email est déjà utilisée par un autre compte');
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Cet adresse email est déjà utilisée par un autre compte</span>');
                                $('[name=email_cnnx]').addClass('border-danger');
                                break;
                            default:
                                $(document).Toasts('create', {
                                    class: 'bg-danger m-1',
                                    body: '<strong>Tentatives d ajout</strong><br> Une erreur serveur vient de se produire',
                                    title: 'Admin System',
                                    subtitle: 'Ajout du facilitateur ',
                                    autohide: true,
                                    delay: 2000,
                                    position: 'bottomRight',
                                    icon: 'fas fa-envelope fa-lg',
                                })
                                console.log(xhr.responseText);
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'inscription</span>');
                                break;
                        }
                    }
                }
                xhr.send(frm);
            }
        })
    })
</script>