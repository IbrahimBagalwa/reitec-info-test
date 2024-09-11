<?php 
    $fcls_ = (onRetriveCRSALL($g));
    $attributed = $fcls_['distCours'];
    $nattributed = $fcls_['notDistCours'];
?>
<!-- <pre>
    <?php 
        // var_dump($fcls_);
        // var_dump($fcls_['distCours']);
        // echo('-------------------------- <br>');
        // var_dump($fcls_['notDistCours']);
    ?>
</pre> -->
<section>
    <div class="container">
        <h3 class="text-primary"><span class="fas fa-chevron-right mr-2"></span>Formations</h3>
        <div class="col-lg-12 my-2 border p-1 rounded">
            <a href="?page=formation" class="btn btn-primary btn-sm" id="add-facilitator">
                Add new Formation
            </a>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5>Listing of Cours</h5>
                <!-- <div class="float-left">
                    <span>Total : <b class="px-2 border rounded-pill"><?php echo(count($fcls)) ?></b></span>
                </div> -->
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <h4>Distributed Cours</h4>
                    <span class="mb-3">Total : <b class="px-2 border rounded-pill"><?php echo((!empty($attributed)) ? count($attributed) : 0) ?></b></span>
                    <table class="table table-striped- table-sm table-bordered- table-hover text-center mt-3">
                        <thead>
                            <tr>
                                <th><b class="fa fa-hashtag"></b></th>
                                <th>Label</th>
                                <th>Délai</th>
                                <th>Montant à payer</th>
                                <th>Attribué</th>
                                <th>
                                    <table class="table border-0 bg-light p-0 m-0">
                                        <tr>
                                            <td colspan="2"> <span>Facilitateur</span>  </td>
                                        </tr>
                                        <tr>
                                            <td> <span>Nom</span> </td>
                                            <!-- <td> <span>Postnom </span> </td> -->
                                            <td> <span>Email</span> </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if(!empty($attributed) && count($attributed)>0){ 
                            foreach ($attributed as $fcl) {
                            // $nbC = ($fcl->cours !== 0) ? count($fcl->cours) : 'Aucun cours';
                        ?>
                            <tr>
                                <td>
                                    <span class="fa fa-hashtag"></span>
                                </td>
                                <td>
                                    <span><?php echo(ucfirst($fcl->titre)); ?></span>
                                </td>
                                <td>
                                    <span><?php echo(ucfirst($fcl->delai)); ?><b>H</b></span>
                                </td>
                                <td>
                                    <span><?php echo($fcl->prix);  ?><b>$</b></span>
                                </td>
                                <td>
                                    <span class="fa fa-check text-success"></span>
                                </td>
                                <td>
                                    <table class="table border-0 bg-light text-center p-0 m-0">
                                        <tr>
                                            <td><span class="font-weight-bold"><?php echo(ucfirst($fcl->facilitateur[0]).'&nbsp;'.ucfirst($fcl->facilitateur[1])); ?></span></td>
                                            <!-- <td><span><?php echo(ucfirst($fcl->facilitateur[1])); ?></span></td> -->
                                            <td><span class="font-weight-bold"><?php echo($fcl->facilitateur[2]); ?></span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                        <a href="?page=editcours&token=<?php echo(md5('dav.me')) ?>&access=<?php echo(sha1(onRetrieveAccessLevel())) ?>&_amb=<?php echo(sha1(ucwords('davidmaene.1.2020'))) ?>&_elem=<?php echo($fcl->id); ?>" class="btn btn-primary btn-sm" >
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <button class="btn btn-danger btn-sm btn-del" id="<?php echo($fcl->id); ?>" >
                                            <span class="fa fa-trash btn-create"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php }}else{ ?>   
                            <tr>
                                <td colspan='7' class='colspan-7 w-100'>
                                    <div class="col-lg-12 bg-default border py-4 text-center">
                                        <span class="fas fa-exclamation"></span>
                                        <span>Aucun Cours disponible pour le moment</span>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot class="d-none" hidden>
                            <tr>
                                <th><b class="fa fa-hashtag"></b></th>
                                <th>Label</th>
                                <th>Délai</th>
                                <th>Montant à payer</th>
                                <th>Attribué</th>
                                <th>
                                    <table>
                                        <tr>
                                            <td colspan="3"> <span>Facilitateur</span>  </td>
                                        </tr>
                                        <tr>
                                            <td> <span>Nom</span> </td>
                                            <td> <span>Postnom </span> </td>
                                            <td> <span>Email</span> </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
                <div class="col-lg-12 mt-5">
                    <h4>Not Distributed</h4>
                    <span class="mb-3">Total : <b class="px-2 border rounded-pill"><?php echo((!empty($nattributed) ? count($nattributed) : 0)) ; ?></b></span>
                    <table class="table table-striped- table-sm table-bordered- table-hover text-center mt-3">
                        <thead>
                            <tr>
                                <th><b class="fa fa-hashtag"></b></th>
                                <th>Label</th>
                                <th>Délai</th>
                                <th>Montant à payer</th>
                                <th>Attribué</th>
                                <th>
                                    <table class="table border-0 bg-light p-0 m-0">
                                        <tr>
                                            <td colspan="2"> <span>Facilitateur</span>  </td>
                                        </tr>
                                        <tr>
                                            <td> <span>Nom</span> </td>
                                            <!-- <td> <span>Postnom </span> </td> -->
                                            <td> <span>Email</span> </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if(!empty($nattributed) && count($nattributed)>0){ 
                            foreach ($nattributed as $fcl) {
                            // $nbC = ($fcl->cours !== 0) ? count($fcl->cours) : 'Aucun cours';
                        ?>
                            <tr>
                                <td>
                                    <span class="fa fa-hashtag"></span>
                                </td>
                                <td>
                                    <span><?php echo(ucfirst($fcl->titre)); ?></span>
                                </td>
                                <td>
                                    <span><?php echo(ucfirst($fcl->delai)); ?><b>H</b></span>
                                </td>
                                <td>
                                    <span><?php echo($fcl->prix);  ?><b>$</b></span>
                                </td>
                                <td>
                                    <span class="fa fa-asterisk text-danger"></span>
                                </td>
                                <td>
                                    <table class="table border-0 bg-light text-center p-0 m-0">
                                        <tr>
                                            <td><span class="font-weight-bold fa fa-circle-o-notch"><?php #echo(ucfirst($fcl->facilitateur[0]).'&nbsp;'.ucfirst($fcl->facilitateur[1])); ?></span></td>
                                            <!-- <td><span><?php echo(ucfirst($fcl->facilitateur[1])); ?></span></td> -->
                                            <td><span class="font-weight-bold fa fa-circle-o-notch"><?php #echo($fcl->facilitateur[2]); ?></span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                        <a href="?page=editcours&token=<?php echo(md5('dav.me')) ?>&access=<?php echo(sha1(onRetrieveAccessLevel())) ?>&_amb=<?php echo(sha1(ucwords('davidmaene.1.2020'))) ?>&_elem=<?php echo($fcl->id); ?>" class="btn btn-primary btn-sm" >
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <button class="btn btn-danger btn-sm btn-del" id="<?php echo($fcl->id); ?>" >
                                            <span class="fa fa-trash btn-create"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php }}else{ ?>   
                            <tr>
                                <td colspan='7' class='colspan-7 w-100'>
                                    <div class="col-lg-12 bg-default border py-4 text-center">
                                        <span class="fas fa-exclamation"></span>
                                        <span>Aucun Cours pour le moment</span>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot class="d-none" hidden>
                            <tr>
                                <th><b class="fa fa-hashtag"></b></th>
                                <th>Label</th>
                                <th>Délai</th>
                                <th>Montant à payer</th>
                                <th>Attribué</th>
                                <th>
                                    <table>
                                        <tr>
                                            <td colspan="3"> <span>Facilitateur</span>  </td>
                                        </tr>
                                        <tr>
                                            <td> <span>Nom</span> </td>
                                            <td> <span>Postnom </span> </td>
                                            <td> <span>Email</span> </td>
                                        </tr>
                                    </table>
                                </th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){   
        function onDelete(ele,id){
            const sp = document.createElement('span');
            $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
            // console.log($(this).attr('itm-idx'))
            let item = id ??($(this).attr('itm-idx')); item = parseInt(item);
            // const frm = new FormData(document.getElementById('form-connexion'));
            const xhr = new XMLHttpRequest();
            $(ele).attr('disabled','disabled').append(sp)
            xhr.open('GET', `viva-box-scripts/php/reqxhr.php?abc=dele&item=${item}&tbl=tbl_cours`,true);
            xhr.onreadystatechange = function(){
                if(xhr.readyState === 4 && xhr.status === 200){
                    console.log()
                    const rs = parseInt(xhr.responseText);
                    switch (rs) {
                        case 200:
                            $(sp).remove();
                            toastr.success('Suppression réussie');
                            // $('[ouput-text=ouput]')
                            //     .attr('class','text-succes d-block')
                            //     .html('<span class="fa fa-warning mr-2"></span><span>Message supprimer avec succès</span>');
                             setTimeout(() => {
                                window.location.reload();
                             }, 1000);                           
                            break;
                        case 403:
                            $(ele).removeAttr('disabled');
                            $(sp).remove();
                            toastr.error('Redirection in few minutes');
                            // $('[ouput-text=ouput]')
                            //     .attr('class','text-danger d-block')
                            //     .html('<span class="fa fa-warning mr-2"></span><span>Mot de pass ou nom d\'utilisateur incorrecte</span>');
                            // $('[name=pwd_cnnx]').addClass('border-danger');
                            break;
                        case 405:
                            $(ele).removeAttr('disabled');
                            $(sp).remove();
                            toastr.success('Impossible de supprimer l\'élément');
                            // $('[ouput-text=ouput]')
                            //     .attr('class','text-danger d-block')
                            //     .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'operation</span>');
                                console.log(xhr.responseText);
                            break;
                        default:
                        $(document).Toasts('create', {
                            class: 'bg-danger m-1',
                            body: '<strong>Tentatives de Suppression</strong><br> Une erreur serveur vient de se produire',
                            title: 'Admin System',
                            subtitle: 'Suppression',
                            autohide: true,
                            delay: 2000,
                            position: 'bottomRight',
                            icon: 'fas fa-envelope fa-lg',
                            })
                            console.log(xhr.responseText);
                            break;   
                    }
                }
            }
            xhr.send(null);
        }
        var rbBtn = document.querySelectorAll('.btn-del');
        rbBtn.forEach(element => {
            element.onclick = function(e){
                if(confirm('Voulez vous vraiement supprimer ce facilitatteur ?')){
                    onDelete(element,$(element).attr('id'));
                }
            }
        });
    })
</script>