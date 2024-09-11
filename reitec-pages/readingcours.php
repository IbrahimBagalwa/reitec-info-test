<div class="container">
    <div class="w-100 d-flex justify-content-center">
        <?php 
        // echo($cb);
            $cb = (json_encode($_GET));
            if (isset($_SESSION['reitec-std-session']) && isset($_SESSION['ident-me'])) {
                $me = (array)$_SESSION['ident-me'];
                // var_dump(base64_decode('X2Rhdi5tZTpyZWl0ZWMtNS05'));
                // var_dump(base64_decode('X2Rhdi5tZTpyZWl0ZWMtNy05'));
                $ths = json_decode($cb,true);
                $thsIdnt = $ths['_spc'];
                $meIdnt = $me['id'];
                $case = (int) onAddingToMyLSTCRS($conf,$meIdnt,$thsIdnt);
                switch ($case) {
                    case 500:
                ?>
                <div class="alert alert-danger col-lg-7 text-center">
                    <h4><span class=""></span>500 Erreur</h4>
                    <p>Une erreur vient de se produire au niveau du serveur</p>
                </div>
                <?php
                        break;
                    case 200:
                        $is = isActivatedCRS($conf,$meIdnt,$thsIdnt);
                        $is = (int) $is;
                        if($is === 200){
                ?>
                <!-- reading cours -->
                <?php include('reitec-pages/reading.inc.php'); ?>
                <!--  end reading cours -->
                <?php
                        }else{
                ?>
                <div class="col-lg-7 p-2 my-5 shadow px-4 pt-4">
                    <div class="w-100 ">
                        <h4>Activation</h4>
                        <p>
                            <h6>
                                Cher <strong><?php echo(ucfirst($me['nom']).'&nbsp;'.ucfirst($me['prenom'])) ?></strong>
                            </h6>
                            Votre demande a été reçue avec succès: <br>
                            <span class="fa fa-chevron-right text-prmy mt-4"></span> Une note<strong> de début vous sera envoyé à votre adresse mail incessement détaillant les frais et les modalités de paiement</strong><br>
                            <span class="fa fa-chevron-right text-prmy mt-4"></span> Vous recevrez<strong> un code d'activation de la formation après paiement des frais</strong>
                            
                            Nous vous remercions pour votre confiance <br> <b>REITEC-Info Team</b>
                        </p>
                        <p>
                            <!-- <h5>
                                Comment obtenir le code d'activation
                            </h5>
                            Vous devez verser le montant require pour étudier ce cours soit : <br>
                            <span class="fa fa-chevron-right text-prmy"></span> Num. Compte : <strong>UJU8383HJ87JKN</strong> BANK : <b>TMB S.a.r.l</b><br>
                            <span class="fa fa-chevron-right text-prmy"></span> par e-money : <strong>(+234) 995 443 664 | (+234) 975 200 116</strong> -->
                        </p>
                    </div>
                    <div class="col-lg-12 rounded mt-3 border py-3 section-bg">
                        <b>Vous possedez déjà le code ?</b>
                        <form id="activator-cours">
                            <div class="input-group d-none">
                                <input type="text" name="ident_me" value="<?php echo($meIdnt) ?>" readonly>
                                <input type="text" name="ident_crs" value="<?php echo($thsIdnt) ?>" readonly>
                            </div>
                            <div class="input-group mt-2">
                                <input type="text" maxlength="28" class="form-control font-weight-bold" name="codeactivator" id="codeactivator" placeholder="Collez le code d'activation ici ...">
                                <span class="input-group-append w-25">
                                    <button class="btn bg-prmy w-100 btn-create">
                                        <span class="fa fa-unlock mr-2"></span>
                                        <span>Activer</span>
                                    </button>
                                </span>
                            </div>
                            <div class="input-group my-2">
                                <b class="output text-danger d-none">
                                    <span class="fa fa-warning mr-2"></span>
                                    <span>La clé entrée n'est pas valide</span>
                                </b>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function(){
                        const sp = document.createElement('span');
                        $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
                        $('#activator-cours').on('submit', function(e){
                            e.preventDefault();
                            const vlu = $('[name=codeactivator]')
                            if($(vlu).val().length > 6){
                                $(vlu).removeClass('border-danger');
                                const xhr = new XMLHttpRequest();
                                const frm = new FormData(document.getElementById('activator-cours'))
                                xhr.open('POST', 'reitec-scripts/php/_xhr.request.php',true);
                                xhr.onreadystatechange = function(){
                                    if(xhr.readyState === 4 && xhr.status === 200){
                                        const rs = parseInt(xhr.responseText);
                                        switch (rs) {
                                            case 500:
                                                $('.output').removeClass('d-none');
                                                $('.output').html('<span class="fa fa-warning mr-2">Error 500</span><span>Une erreur serveur vient de se produire</span>');
                                                break;
                                            case 200:
                                                $('.output').removeClass('d-none');
                                                $('.output').addClass('text-success');
                                                $('.output').html('<span class="fa fa-check mr-2"></span><span>Le cours a été activé avec succès</span>');
                                                setTimeout(() => {
                                                    window.location.reload();
                                                }, 700);
                                                break;
                                            case 403:
                                                $('.output').removeClass('d-none');
                                                // $('.output').addClass('text-success');
                                                $('.output').html('<span class="fa fa-warning mr-2">Code 403</span><span>Le code d\'activation n\'est pas valide</span>');
                                                break;
                                            default:
                                                $('.output').removeClass('d-none');
                                                $('.output').html('<span class="fa fa-warning mr-2">Error Inconnue</span><span>Une erreur Inconnue serveur vient de se produire</span>');
                                                break;
                                        }
                                    }
                                }
                                xhr.send(frm);
                            }else{
                                $(vlu).addClass('border-danger');
                            }
                        })
                    })
                </script>
                <?php 
                        }
                        break;
                    case 503:
                    $is = isActivatedCRS($conf,$meIdnt,$thsIdnt);
                    $is = (int) $is;
                    if($is === 200){
                ?>
                <!-- reading cours  -->
                <?php include('reitec-pages/reading.inc.php'); ?>
                <!-- end reading cours -->
                <?php }else{ ?>
                <div class="col-lg-7 p-2 my-5 shadow px-4 pt-4">
                    <div class="w-100 ">
                        <h4>Activation | <span class="text-danger">Ce cours n'est pas toujours activé</span></h4>
                        <p>
                            <h6>
                                Cher <strong><?php echo(ucfirst($me['nom']).'&nbsp;'.ucfirst($me['prenom'])) ?></strong>
                            </h6>
                            Votre demande a été reçue avec succès: <br>
                            <span class="fa fa-chevron-right text-prmy mt-4"></span> Une note<strong> de début vous sera envoyée incessement à votre adresse mail, détaillant les frais et les modalités de paiement</strong><br>
                            <span class="fa fa-chevron-right text-prmy mt-4"></span> Vous recevrez<strong> un code d'activation de la formation après paiement des frais, Copiez et collez le code dans le champs reservé</strong><br><br>
                            
                            Nous vous remercions pour votre confiance <br> <b>REITEC-Info Team</b>
                        </p>
                        <p>
                            <!-- <h5>
                                Comment obtenir le code d'activation
                            </h5>
                            Vous devez verser le montant require pour étudier ce cours soit : <br>
                            <span class="fa fa-chevron-right text-prmy"></span> Num. Compte : <strong>UJU8383HJ87JKN</strong> BANK : <b>TMB S.A.R.L</b><br>
                            <span class="fa fa-chevron-right text-prmy"></span> par e-money : <strong>(+234) 995 443 664 | (+234) 975 200 116</strong> -->
                        </p>
                    </div>
                    <div class="col-lg-12 rounded mt-3 border py-3 section-bg">
                        <b>Vous possedez déjà le code ?</b>
                        <form id="activator-cours">
                            <div class="input-group d-none">
                                <input type="text" name="ident_me" value="<?php echo($meIdnt) ?>" readonly>
                                <input type="text" name="ident_crs" value="<?php echo($thsIdnt) ?>" readonly>
                            </div>
                            <div class="input-group mt-2">
                                <input type="text" maxlength="28" class="form-control font-weight-bold" name="codeactivator" id="codeactivator" placeholder="Collez le code d'activation ici ...">
                                <span class="input-group-append w-25">
                                    <button class="btn bg-prmy w-100 btn-create" type="submit">
                                        <span class="fa fa-unlock mr-2"></span>
                                        <span>Activer</span>
                                    </button>
                                </span>
                            </div>
                            <div class="input-group my-2">
                                <b class="output text-danger d-none">
                                    <span class="fa fa-warning mr-2"></span>
                                    <span>La clé entrée n'est pas valide</span>
                                </b>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function(){
                        const sp = document.createElement('span');
                        $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
                        $('#activator-cours').on('submit', function(e){
                            e.preventDefault();
                            const vlu = $('[name=codeactivator]')
                            if($(vlu).val().length > 6){
                                $(vlu).removeClass('border-danger');
                                const xhr = new XMLHttpRequest();
                                const frm = new FormData(document.getElementById('activator-cours'))
                                xhr.open('POST', 'reitec-scripts/php/_xhr.request.php',true);
                                xhr.onreadystatechange = function(){
                                    if(xhr.readyState === 4 && xhr.status === 200){
                                        const rs = parseInt(xhr.responseText);
                                        switch (rs) {
                                            case 500:
                                                $('.output').removeClass('d-none');
                                                $('.output').html('<span class="fa fa-warning mr-2">Error 500</span><span>Une erreur serveur vient de se produire</span>');
                                                break;
                                            case 200:
                                                $('.output').removeClass('d-none');
                                                $('.output').addClass('text-success');
                                                $('.output').html('<span class="fa fa-check mr-2"></span><span>Le cours a été activé avec succès</span>');
                                                setTimeout(() => {
                                                    window.location.reload();
                                                }, 700);
                                                break;
                                            case 403:
                                                $('.output').removeClass('d-none');
                                                // $('.output').addClass('text-success');
                                                $('.output').html('<span class="fa fa-warning mr-2">Code 403</span><span>Le code d\'activation n\'est pas valide</span>');
                                                break;
                                            default:
                                                $('.output').removeClass('d-none');
                                                $('.output').html('<span class="fa fa-warning mr-2">Error Inconnue</span><span>Une erreur Inconnue serveur vient de se produire</span>');
                                                break;
                                        }
                                    }
                                }
                                xhr.send(frm);
                            }else{
                                $(vlu).addClass('border-danger');
                            }
                        })
                    })
                </script>
                <?php
                        }
                        break;
                    default:
                ?>
                <div class="alert alert-danger col-lg-7 pt-4 text-center">
                    <h4><span class=""></span>500 Erreur | Inconnue</h4>
                    <p>Une erreur inconnue vient de se produire au niveau du serveur</p>
                </div>
                <?php
                        break;
            }
        ?>
    </div>
</div>
<?php }else{ ?>
<script>
    let cb = '<?php echo$cb ?>';console.log(JSON.parse(cb)); cb = btoa(cb);
    window.location.replace(`?page=signin&_recap=true&_callback=${cb}`);
</script>
<?php } ?>