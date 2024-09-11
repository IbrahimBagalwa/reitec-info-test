<?php 
    // var_dump(onRetriveCours($g,1));
    $fcls = (onRetrieveFCLTR($g));
?>

<section>
    <div class="container">
        <h3 class="text-primary"><span class="fas fa-chevron-right mr-2"></span>Facilitator</h3>
        <div class="col-lg-12 my-2 border p-1 rounded">
            <a href="?page=addFaciliator" class="btn btn-primary btn-sm" id="add-facilitator">
                Add new Facilitator
            </a>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5>Listing of facilitator</h5>
                <div class="float-left">
                    <span>Total : <b class="px-2 border rounded-pill"><?php echo(count($fcls)) ?></b></span>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped- table-md table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th><b class="fa fa-hashtag"></b></th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Cours Affectés</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if($fcls !== 0){ 
                        foreach ($fcls as $fcl) {
                        $nbC = ($fcl->cours !== 0) ? count($fcl->cours) : 'Aucun cours';
                    ?>
                        <tr>
                            <td>
                                <span class="fa fa-hashtag"></span>
                            </td>
                            <td>
                                <span><?php echo(ucfirst($fcl->nom)); ?></span>
                            </td>
                            <td>
                                <span><?php echo(ucfirst($fcl->postnom)); ?></span>
                            </td>
                            <td>
                                <span><?php echo($fcl->tele);  ?></span>
                            </td>
                            <td>
                                <span><?php echo($fcl->email);  ?></span>
                            </td>
                            <td>
                                <span class="font-weight-bold">Nb : <?php echo($nbC); ?></span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
<a href="?page=editFacilitator&token=<?php echo(md5('dav.me')) ?>&access=<?php echo(sha1(onRetrieveAccessLevel())) ?>&_amb=<?php echo(sha1(ucwords('davidmaene.1.2020'))) ?>&_elem=<?php echo($fcl->id); ?>" class="btn btn-primary btn-sm" >
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
                                    <span>Aucun facilitateur pour le moment</span>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><b class="fa fa-hashtag"></b></th>
                            <th>Nom</th>
                            <th>Postnom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Cours Affectés</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
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
            xhr.open('GET', `viva-box-scripts/php/reqxhr.php?abc=dele&item=${item}&tbl=tbl_facilitateur`,true);
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