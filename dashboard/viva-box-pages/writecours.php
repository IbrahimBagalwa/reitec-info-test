<pre>
    <?php 
    // var_export($_GET);
    $obj = $_GET['data'];
    $vals = [];
    $infos = json_decode($_GET['data'],true);
    foreach ($infos as $vl) {
        $vals[$vl['name']] = $vl['value'];
    }
    var_dump($vals);
    ?>
</pre>
  <!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <div class="content-wrapper-">
    <!-- Content Header (Page header) -->
    <section class="content-header d-none">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose a Cours</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="?page=addCours" class="btn btn-primary btn-block mb-3">Back to add a new Cours</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Others Infos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="#hn" class="nav-link">
                        Titre
                      <p>
                        <b>
                            <span class="fas fa-chevron-right mr-2"></span>
                            <?php echo((!empty($vals) && count($vals) > 0) ? $vals['titre_cnnx'] : 'undefined'); ?>
                        </b>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item d-none">
                    <a href="#hn" class="nav-link">
                      Delais de formation
                      <p>
                        <b>
                            <span class="fas fa-chevron-right mr-2"></span>
                            <?php #echo((!empty($vals) && count($vals) > 0) ? $vals['delais_cnnx'] : 'undefined'); ?></b>H
                        </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#hn" class="nav-link">
                      Prix de la formation
                      <p>
                        <b>
                            <span class="fas fa-chevron-right mr-2"></span>
                            <?php echo((!empty($vals) && count($vals) > 0) ? $vals['prix_cnnx'] : 'undefined'); ?>$
                        </b>
                        </p>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
              <form id="form-addCours">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Compose Content of new Cours</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group d-none">
                                <input type="text" id="nom-cnnx" name="titre_cnnx" value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['titre_cnnx'] : 'undefined'); ?>">
                                <input type="text" name="date_s_cnnx" value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['date_s_cnnx'] : 'undefined'); ?>">
                                <input type="text" name="date_e_cnnx" value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['date_e_cnnx'] : 'undefined'); ?>">
                                <input type="text" name="prix_cnnx" value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['prix_cnnx'] : 'undefined'); ?>">
                                <input type="text" name="fcl_cnnx" value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['fcl_cnnx'] : 'undefined'); ?>">
                                <select name="categ_cnnx" id="categ" class="form-control">
                                    <option value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['categ_cnnx'] : 'undefined'); ?>"></option>
                                </select>
                                <select name="subcateg_cnnx" id="subcateg" class="form-control">
                                    <option value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['subcateg_cnnx'] : 'undefined'); ?>"></option>
                                </select>
                                <input type="text" name="desc_cnnx" value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['desc_cnnx'] : 'undefined'); ?>">
                                <select name="kind_cnnx" id="kind-cnnx" class="form-control mb-3">
                                    <option value="<?php echo((!empty($vals) && count($vals) > 0) ? $vals['kind_cnnx'] : 'undefined'); ?>"></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" name="coursKind" class="form-control" style="height: 300px" placeholder="Entrer le text ici">

                                </textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary w-100 btn-create">
                                <i class="fas fa-arrow-down"></i> 
                                <span>Enregistrer le cours</span>
                            </button>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </form>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
<script>
    $(document).ready(function(e){
        const sp = document.createElement('span');
        $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
        // console.log($('#compose-textarea').html());
        // const formD = new FormData();
        // const obj = '<?php echo$obj ?>';
        // const datas = JSON.parse(obj);
        // datas.forEach(object => {
        //     formD.append(object['name'],object['value']);
        //     // console.log(object)
        //     // for (const key in object) {
        //     //     if (Object.hasOwnProperty.call(object, key)) {
        //     //         console.log(key + ' --- ' + object[key])
        //     //     }
        //     // }
        // });
        // btn submit
        $('.btn-create').on('click', function(e){
            if($('#compose-textarea').val().length > 23){
                console.log($('#form-addCours').serializeArray());
                $('#compose-textarea').removeClass('border-danger');
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
                                break;
                            case 503:
                                toastr.error('Ce cours existe déjà ');
                                $('.btn-create').removeAttr('disabled');
                                $(sp).remove();
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
                                $('[ouput-text=ouput]')
                                    .attr('class','d-block')
                                    .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'opération</span>');
                                break;
                        }
                    }
                }
                xhr.send(frm);
            }else {
                $('#compose-textarea').addClass('border-danger');
                console.log($('#compose-textarea').val())
            }
        })
        // end submit
    })
</script>