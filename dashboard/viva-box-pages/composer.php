    <!-- Main content -->
    <?php 
      $replyer = false;
      if(isset($_GET['_id'])){
          $replyer = true;
          $id_ = $_GET['_id']; $message = (onGeteSmsById($g,$id_)[0]);
        }else{
          $replyer = false;
        } #var_dump($message); ?>
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
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <?php if($replyer){ ?>
                    <label for="name">To : </label>
                    <input id="name" class="form-control font-weight-bold" value="<?php echo($message->email) ?>" readonly>
                    <input type="text" id="name_" value="<?php echo($message->nom) ?>" class="form-control d-none">
                  <?php }else{ ?>
                    <input class="form-control font-weight-bold" name="name" placeholder="To : ">
                  <?php } ?>
                </div>
                <div class="form-group">
                    <?php if($replyer){ ?>
                      <label for="subject">subject : </label>
                      <input id="subject" class="form-control font-weight-bold" value="<?php echo($message->sujet) ?>" readonly placeholder="Subject:">
                    <?php }else{ ?>
                      <input class="form-control" name="sublect" placeholder="Subject :">
                    <?php } ?>
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                    </textarea>
                </div>
                <div class="form-group ">
                  <!-- <div class="btn btn-default btn-file"> -->
                      <span ouput-text=ouput></span>
                  <!-- </div> -->
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                  <button type="submit" itm-idx="<?php echo((isset($_GET['_id'])) ? $id_ : 0) ?>" class="btn btn-primary btn-create"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script >
      $('[type=reset]').on('click', function(e){
        window.location.reload();
      })
      $(document).ready(function(){
      $('.btn-create').on('click', function(e){
          const sp = document.createElement('span');
          $(sp).attr({'id':'span-loader','class':'spinner-grow spinner-grow-sm'})
          // console.log($(this).attr('itm-idx'))
          const item = ($(this).attr('itm-idx'));
          const frm = {
            'idTo': item,
            'name': $('#name_').val(),
            'email': $('#name').val(),
            'subject': $('#subject').val(),
            'message': $('[name=message]').val()
          }
          // console.log(frm);
          // return false;
          const xhr = new XMLHttpRequest();
          $('.btn-create').attr('disabled','disabled').append(sp)
          xhr.open('GET', `viva-box-scripts/php/reqxhr.php?abc=reply&content=${JSON.stringify(frm)}`,true);
          xhr.onreadystatechange = function(){
              if(xhr.readyState === 4 && xhr.status === 200){
                  const rs = parseInt(xhr.responseText);
                  switch (rs) {
                      case 200:
                          $('.btn-create').removeAttr('disabled');
                          $(sp).remove();
                          $('[ouput-text=ouput]')
                              .attr('class','text-succes d-block')
                              .html('<span class="fa fa-warning mr-2"></span><span>Message envoyer avec succès</span>');
                            setTimeout(() => {
                              $('[ouput-text=ouput]')
                              .attr('class','text-danger d-none');
                              // window.location.href=('?page=inbox');
                            }, 1000);                           
                          break;
                      case 403:
                          $('.btn-create').removeAttr('disabled');
                          $(sp).remove();
                          $('[ouput-text=ouput]')
                              .attr('class','text-danger d-block')
                              .html('<span class="fa fa-warning mr-2"></span><span>Mot de pass ou nom d\'utilisateur incorrecte</span>');
                          // $('[name=pwd_cnnx]').addClass('border-danger');
                          break;
                      case 500:
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