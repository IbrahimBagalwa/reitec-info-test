<!-- <?php if(isset($_SESSION['reitec-std-session'])){}?> -->
<div class="container my-5">
    <div class="w-100 d-flex justify-content-center">
        <div class="col-lg-6 col-12 shadow pt-5">
            <div class="card-title mb-2">
                <h4 class="mb-0 text-prmy">Réinitialisation du mot de passe</h4>
                <p>Veillez entrer votre nouveau mot de passe, pour réinitialiser l'ancien mot de passe.</p>
            </div>
            <form action="" method="POST" id="form-connexion">
                <div class="form-group">
                    <label for="pwd-cnnx">Nouveau mot de passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" d-state="hidden" name="pwd_cnnx_r" id="pwd-cnnx" placeholder="Mot de passe">
                        <div class="input-group-append hoverOn show-pwd">
                            <div class="input-group-text" id="pslock">
                                <span class="fa fa-eye-slash"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd-cnnx">Repeter le mot de passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="pwd_cnnx-r" id="pwd-cnnx" placeholder="Repete le mot de passe">
                        <div class="input-group-append hoverOn">
                            <div class="input-group-text" >
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <b class="text-danger my-2"><span class="fa fa-warning mr-2"></span><span>Adresse mail ou mot de passe incorrect</span></b>
                    <button class="btn bg-prmy w-100 mt-4" type="submit">
                        <span>Connexion</span>
                    </button>
                </div>
            </form>
            <div class="col-12 mb-4">
                <!-- <a href="?page=recoverpassword" class="d-block"> <span class="bx bx-chevron-right mr-2"></span>J'ai oublier mon mot de passe</a> -->
                <!-- <a href="?page=signup" class="d-block"><span class="bx bx-chevron-right mr-2"></span>Je besoin de créer un nouveau compte</a> -->
            </div>
        </div>
    </div>
</div>
<script>
    $('.show-pwd').on('click', function(e){

        if($('#pwd-cnnx').attr('d-state') === 'hidden'){
            $('#pwd-cnnx').attr({'type':'text','d-state':'shown'}); 
            $('#pslock').html('<span class="fa fa-eye"></span>');
        }else{
            $('#pwd-cnnx').attr({'type':'password','d-state':'hidden'}); 
            $('#pslock').html('<span class="fa fa-eye-slash"></span>');
        }
    })
</script>