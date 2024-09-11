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
                <h5>Currents formations</h5>
                <p>Listing of formation</p>
            </div>
            <div class="card-body">
                <?php
                    $frm = (getAllFormation($g,25));
                ?>
                <table class="table table-stripped table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Nb</th>
                            <th>Title</th>
                            <th>Prix de la formations</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            
                            // return false;

                            if($frm !== 0){
                                foreach($frm as $frt){
                                    $listpart = onGetParticipantById($g,(int)$frt->id);
                                    $facilitator = (!empty($frt->facilitateur[0])) ? ucfirst($frt->facilitateur[0]).'&nbsp;'.$frt->facilitateur[1] : 'Reitec - Team' ;      
                        ?>
                        <tr>
                            <td>
                                <span class="fa fa-hashtag"></span>
                            </td>
                            <td>
                                <b><?php echo($frt->titre) ?></b>
                            </td>
                            <td>
                                <?php echo($frt->prix) ?>$
                            </td>
                            <td>
                                <b><?php echo($frt->date_s) ?></b>
                            </td>
                            <td>
                                <b><?php echo($frt->date_e) ?></b>
                            </td>
                            <td>
                                <b><b><?php echo(_getStatus($frt->date_s,$frt->date_e)) ?></b></b>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="?page=edit-formation&token=<?php echo(md5('dav.me')) ?>&access=<?php echo(sha1(onRetrieveAccessLevel())) ?>&_amb=<?php echo(sha1(ucwords('davidmaene.1.2020'))) ?>&_elem=<?php echo($frt->id); ?>" class="btn btn-primary btn-sm" >
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-lg-<?php echo($frt->id); ?>">
                                        <span class="fa fa-file"></span>
                                        <span> ...</span>
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-del" id="<?php echo($frt->id); ?>" >
                                        <span class="fa fa-trash btn-create"></span>
                                    </button>
                                </div>
                            </td>
                            
                        </tr>
                        <tr class="py-0 my-0">
                            <td colspan="7" class="py-0 my-0 border-0">
                                <div class="modal fade" id="modal-lg-<?php echo($frt->id); ?>">
                                    <div class="modal-dialog modal-xl py-0">
                                        <div class="modal-content">
                                            <div class="col-lg-12 d-none">
                                                <p>Categorie</p>
                                                <p>SubCateg</p>
                                            </div>
                                            <div class="modal-header">
                                                <h4 class="modal-title">Formation : <strong><?php echo(ucfirst($frt->titre)) ?></strong></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                <h4>Generale Infos </h4>
                                                <p>
                                                    Date du jours : <?php echo(date('D-M-Y, H:i:s')) ?>
                                                </p>
                                                <div class="w-100">
                                                    <table class="table table-hover table-sm border-0">
                                                        <tr>
                                                            <th> Categorie : </th>
                                                            <td><?php echo(ucfirst($frt->categ)) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sous - Categorie : </th>
                                                            <td><?php echo(ucfirst($frt->subCateg)) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Durée : </th>
                                                            <td><?php echo(ucfirst($frt->date_s)) ?> <b>Au</b> <?php echo(ucfirst($frt->date_e)) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Prix de la formation : </th>
                                                            <th class="text-danger h4"><?php echo(ucfirst($frt->prix)) ?>$</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Facilitateur : </th>
                                                            <th><?php echo($facilitator); ?></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <h4>List of paricipants</h4>
                                                <div class="w-100">
                                                    <table class="table table-sm table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nom</th>
                                                                <th>Post Nom</th>
                                                                <th>Status</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Emplacement</th>
                                                                <th>State</th>
                                                                <th>Token</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody >
                                                            <?php 
                                                                if($listpart !== 0){
                                                                    foreach ($listpart as $key => $leaner) {
                                                                    
                                                            ?>
                                                            <tr>
                                                                <th><span class="font-weight-bold"><?php echo($key+1); ?></span></th>
                                                                <th><?php echo(ucfirst($leaner->nom)) ?></th>
                                                                <th><?php echo(ucfirst($leaner->prenom)) ?></th>
                                                                <th><?php echo(ucfirst($leaner->type)) ?></th>
                                                                <th><?php echo(($leaner->email)) ?></th>
                                                                <th><?php echo(ucfirst($leaner->telephone)) ?></th>
                                                                <th><?php echo(ucfirst($leaner->emplacement)) ?></th>
                                                                <th><?php echo(($leaner->status) === 1 ? '<span class="text-success">activé</span>' : '<span class="text-danger">non activé</span>') ?></th>
                                                                <th>
                                                                    <?php 
                                                                        if($leaner->status === 1){
                                                                    ?>
                                                                        <button class="btn-sm btn btn-default">
                                                                            <span class="fas fa-unlock mr-1"></span>
                                                                            <!-- <span>Envoyer la clé</span> -->
                                                                        </button>
                                                                    <?php
                                                                        }else{
                                                                            $em = $leaner->email;
                                                                            $ky = $leaner->key;  
                                                                            $spec = $frt->id;
                                                                            $title = $frt->titre;
                                                                            $fullname = ucfirst($leaner->nom).'&nbsp;'.ucfirst($leaner->prenom);      
                                                                        ?>
                                                                        <button class="btn-sm btn btn-primary btn-send-key" onclick="onSendingKey('<?php echo$em ?>','<?php echo$fullname ?>','<?php echo$spec ?>','<?php echo$title ?>','<?php echo$ky ?>',this)">
                                                                            <span class="fas fa-lock mr-1"></span>
                                                                            <span>Envoyer la clé</span>
                                                                        </button>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </th>
                                                            </tr>
                                                            <?php 
                                                                    }
                                                                } else{
                                                            ?>
                                                                <tr>
                                                                    <td colspan="9">
                                                                        <b class="text-center">
                                                                            <span>No item at moment !</span>
                                                                        </b>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nom</th>
                                                                <th>Post Nom</th>
                                                                <th>Status</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Emplacement</th>
                                                                <th>State</th>
                                                                <th>Token</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary d-none">Ok</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </td>
                        </tr>
                        <?php
                                }
                            }else{
                        ?>
                        <tr>
                            <td colspan="7">
                                <b class="text-center">
                                    <span>No item at moment !</span>
                                </b>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Nb</th>
                            <th>Title</th>
                            <th>Prix de la formations</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</section>
<script>
    const sp = document.createElement('span');
    $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
    function onSendingKey(em, fullname, spec, title, key, e){
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `viva-box-scripts/php/reqxhr.php?abc=sendkey&key=${key}&em=${em}&_fullname=${fullname}&_spec=${spec}&_title=${title}`,true);
        $(e).append(sp);
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
                const rs = xhr.responseText;
                var r = parseInt(rs);
                switch (r) {
                    case 200:
                        toastr.success(`Clé : ${key} Envoy&eacut;e avec succ&eagrave;s au ${em}`);
                        $('#span-loader').remove();
                        break;
                    case 500:
                        $('#span-loader').remove();
                        $(document).Toasts('create', {
                            class: 'bg-danger m-1',
                            body: '<strong>Tentatives d\'envoie de la clé </strong><br> Une erreur serveur vient de se produire',
                            title: 'Admin System',
                            subtitle: 'Envoie de cl&eacute;',
                            autohide: true,
                            delay: 2000,
                            position: 'bottomRight',
                            icon: 'fas fa-envelope fa-lg',
                        })
                        break;
                    default:
                        $('#span-loader').remove();
                        $(document).Toasts('create', {
                            class: 'bg-danger m-1',
                            body: '<strong>Erreur</strong><br> Une erreur serveur vient de se produire',
                            title: 'Admin System',
                            subtitle: 'Envoie de cl&eacute;',
                            autohide: true,
                            delay: 2000,
                            position: 'bottomRight',
                            icon: 'fas fa-envelope fa-lg',
                            })
                        console.log(rs);
                        break;
                }
            }
        }
        xhr.send(null);
    }
    $(document).ready(function(){   
        function onDelete(ele,id){
            const sp = document.createElement('span');
            $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
            // console.log($(this).attr('itm-idx'))
            let item = id ??($(this).attr('itm-idx')); item = parseInt(item);
            // const frm = new FormData(document.getElementById('form-connexion'));
            const xhr = new XMLHttpRequest();
            $(ele).attr('disabled','disabled').append(sp)
            xhr.open('GET', `viva-box-scripts/php/reqxhr.php?abc=dele&item=${item}&tbl=tbl_formation`,true);
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
                            toastr.error('Impossible de supprimer l\'élément');
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