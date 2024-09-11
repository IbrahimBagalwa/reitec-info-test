<?php if(isset($_SESSION['reitec-std-session'])){ ?>
<script>window.location.replace('?page=home')</script>
<?php }
$cb = 0;
?>
<div class="container my-5">
    <div class="w-100 d-flex justify-content-center">
        <div class="col-lg-6 col-12 shadow pt-5">
            <?php 
            if (isset($_GET['_recap']) && $_GET['_recap'] === 'true' && isset($_GET['_callback'])) {
                $cb = $_GET['_callback'];
            ?>
            <div class="alert alert-danger" id="ident">
                <h5>Identification requise</h5>
                <p>Vous devez d'abord vous connecter pour pouvoir continuer</p>
                <p class="testing-recap"></p>
            </div>
            <?php
            }
            ?>
            <div class="card-title">
                <h4 class="mb-2 text-prmy">Connexion</h4>
                <p>Connectez vous pour pouvoir interagir et etudier vos cours</p>
            </div>
            <form action="" method="POST" id="form-connexion">
                <div class="form-group">
                    <label for="nom-cnnx">Nom d'utilisateur</label>
                    <input type="email" id="nom-cnnx" name="nom_cnnx_" class="form-control" placeholder="entrer votre adresse mail ... " required>
                </div>
                <div class="form-group">
                    <label for="pwd-cnnx">Mot de passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" d-state="hidden" name="pwd_cnnx_" id="pwd-cnnx" placeholder="Mot de passe">
                        <div class="input-group-append hoverOn show-pwd">
                            <div class="input-group-text" id="pslock">
                                <span class="fa fa-eye-slash"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <b class="text-danger my-2 d-none" ouput-text=ouput>
                        <span class="fa fa-warning mr-2"></span>
                        <span>Adresse mail ou mot de passe incorrect</span>
                    </b>
                    <button class="btn bg-prmy w-100 mt-4 btn-create" type="submit">
                        <span>Connexion</span>
                    </button>
                </div>
            </form>
            <div class="col-12 mb-4">
                <a href="?page=#recoverpassword" class="d-block"> <span class="bx bx-chevron-right mr-2"></span>J'ai oublier mon mot de passe</a>
                <a href="?page=signup" class="d-block"><span class="bx bx-chevron-right mr-2"></span>Je besoin de créer un compte</a>
            </div>
        </div>
    </div>
</div>
<script>
    var prepare = '';
    if(document.getElementById('ident')){
        let cb = '<?php echo$cb ?>';cb  = atob(cb);cb = JSON.parse(cb);
        prepare = `?page=${cb['page']}&_mkr=${cb['_mkr']}&_spc=${cb['_spc']}`;
        console.log(prepare);
        $('.testing-recap').html(cb);
    }
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
    // --------------------
    $('#form-connexion').on('submit', function(e){
        e.preventDefault();
        if(_canLogin()){
            const frm = new FormData(document.getElementById('form-connexion'));
            const xhr = new XMLHttpRequest();
            $('.btn-create').attr('disabled','disabled').append(sp)
            xhr.open('POST', 'reitec-scripts/php/_xhr.request.php',true);
            xhr.onreadystatechange = function(){
                if(xhr.readyState === 4 && xhr.status === 200){
                    const rs = parseInt(xhr.responseText);
                    switch (rs) {
                        case 200:
                            $('[ouput-text=ouput]').attr('class','d-none')
                            setTimeout(() => {
                                if(prepare !== '') window.location.replace(prepare);
                                else window.location.replace('?page=');
                            }, 500);
                            break;
                        case 403:
                            $(sp).remove(); $('#span-loader').remove();
                            $('.btn-create').removeAttr('disabled');
                            
                            $('[ouput-text=ouput]')
                                .attr('class','text-danger d-block')
                                .html('<span class="fa fa-warning mr-2"></span><span>Mot de pass ou nom d\'utilisateur incorrecte</span>');
                            // $('[name=pwd_cnnx]').addClass('border-danger');
                            break;
                        default:
                            $(sp).remove(); $('#span-loader').remove();
                            $('.btn-create').removeAttr('disabled');
                            $('[ouput-text=ouput]')
                                .attr('class','text-danger d-block')
                                .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'operation</span>');
                                console.log(xhr.responseText);
                            break;
                    }
                }
            }
            xhr.send(frm);
        }
    })
    const _canLogin = function(){
        var Y = false;
        var em = function(){
            var e = false;
            if((/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/).test($('[name=nom_cnnx_]').val())){
                e = true;
                $('[name=nom_cnnx_]').removeClass('border-danger');
            }else{
                $('[name=nom_cnnx_]').addClass('border-danger');
                e = false;
            }
             return e;
        }
        var pw = function(){
            var e = false;
            if($('[name=pwd_cnnx_]').val().length > 5){
                e = true;
                $('[name=pwd_cnnx_]').removeClass('border-danger');
            }else{
                $('[name=pwd_cnnx_]').addClass('border-danger');
                e = false;
            }
             return e;
        }
        return Y = pw() && em();
    }
    // --------------------
</script>