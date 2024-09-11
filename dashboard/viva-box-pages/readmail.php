<!-- Main content -->
<?php $id_ = $_GET['mail']; $message = (onGeteSmsById($g,$id_)[0]); #var_dump($message); ?>
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        <a href="?page=inbox" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Folders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            </div>
            <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                <a href="?page=inbox" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                    <span class="badge bg-primary float-right">
                        <?php echo(onRetrieveMSGS($g)); ?>
                    </span>
                </a>
                </li>
                <li class="nav-item">
                <a href="?page=sentsms" class="nav-link">
                    <i class="far fa-envelope"></i> Sent
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                </a>
                </li>
                <li class="nav-item">
                <a href="?page=junksms" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">
                        <?php echo(onRetrieveMSGSRead($g)); ?>
                    </span>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                </a>
                </li>
            </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Labels</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                </li>
            </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    <div class="col-md-9">
        <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Read Mail</h3>

            <div class="card-tools">
            <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
            <h5><?php echo($message->sujet); ?></h5>
            <h6>From: <?php echo($message->email); ?>
                <span class="mailbox-read-time float-right"><small>Date : <?php echo($message->date); ?></small></span></h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                <i class="far fa-trash-alt"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                <i class="fas fa-reply"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                <i class="fas fa-share"></i></button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                <i class="fas fa-print"></i></button>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
            <p>Hello Reitec,</p>

            <p><?php echo($message->message); ?></p>
            <p>Thanks,<br><?php echo($message->nom); ?></p>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white d-none">
            <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
            <li>
                <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                <div class="mailbox-attachment-info">
                <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>1,245 KB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                    </span>
                </div>
            </li>
            <li>
                <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                <div class="mailbox-attachment-info">
                <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>1,245 KB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                    </span>
                </div>
            </li>
            <li>
                <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                <div class="mailbox-attachment-info">
                <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>2.67 MB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                    </span>
                </div>
            </li>
            <li>
                <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                <div class="mailbox-attachment-info">
                <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>1.9 MB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                    </span>
                </div>
            </li>
            </ul>
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <div class="col-lg-12 d-flex justify-content-center">
                <span class="text">
                    <b ouput-text='ouput'></b>
                </span>
            </div>
            <div class="float-right">
            <a href="?page=composer&_id=<?php echo($message->id); ?>" class="btn btn-default"><i class="fas fa-reply"></i> Reply</a>
            <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
            </div>
            <button type="button" class="btn btn-default btn-create" itm-idx="<?php echo($message->id) ?>"><i class="far fa-trash-alt"></i> Delete</button>
            <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
        </div>
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(document).ready(function(){
        $('.btn-create').on('click', function(e){
            const sp = document.createElement('span');
            $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
            // console.log($(this).attr('itm-idx'))
            const item = ($(this).attr('itm-idx'));
            // const frm = new FormData(document.getElementById('form-connexion'));
            const xhr = new XMLHttpRequest();
            $('.btn-create').attr('disabled','disabled').append(sp)
            xhr.open('GET', `viva-box-scripts/php/reqxhr.php?abc=dele&item=${item}`,true);
            xhr.onreadystatechange = function(){
                if(xhr.readyState === 4 && xhr.status === 200){
                    const rs = parseInt(xhr.responseText);
                    switch (rs) {
                        case 200:
                            $(sp).remove();
                            $('[ouput-text=ouput]')
                                .attr('class','text-succes d-block')
                                .html('<span class="fa fa-warning mr-2"></span><span>Message supprimer avec succès</span>');
                             setTimeout(() => {
                                $('[ouput-text=ouput]')
                                .attr('class','text-danger d-none');
                                window.location.href=('?page=inbox');
                             }, 500);                           
                            break;
                        case 403:
                            $('.btn-create').removeAttr('disabled');
                            $(sp).remove();
                            $('[ouput-text=ouput]')
                                .attr('class','text-danger d-block')
                                .html('<span class="fa fa-warning mr-2"></span><span>Mot de pass ou nom d\'utilisateur incorrecte</span>');
                            // $('[name=pwd_cnnx]').addClass('border-danger');
                            break;
                        case 405:
                            $('.btn-create').removeAttr('disabled');
                            $(sp).remove();
                            $('[ouput-text=ouput]')
                                .attr('class','text-danger d-block')
                                .html('<span class="fa fa-warning mr-2"></span><span>Impossible de poursuivre l\'operation</span>');
                                console.log(xhr.responseText);
                            break;
                        default:
                            console.log(xhr.responseText);
                            break;   
                    }
                }
            }
            xhr.send(null);
        })
    })
</script>