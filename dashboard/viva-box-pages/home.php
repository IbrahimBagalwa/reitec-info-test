<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Nb Formations</span>
            <span class="info-box-number">
                <?php echo(onRetrieveCours($g)); ?>
                <!-- <small>%</small> -->
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Nb Students</span>
            <span class="info-box-number">
                <?php echo(onRetrieveSTD($g)) ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-address-book"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Nb Facilitator</span>
            <span class="info-box-number">
                <?php echo(onRetrieveFCL($g)); ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Learners</span>
            <span class="info-box-number">
                <?php echo(onRetrieveLRN($g)) ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5>Corrents formations</h5>
                    <p>Listing of formation</p>
                </div>
                <div class="card-body">
                    <?php
                        $frm = (getAllFormation($g,25));
                    ?>
                    <table class="table table-stripped table-hover text-center">
                        <thead>
                            <tr>
                                <th>Nb</th>
                                <th>Title</th>
                                <th>Nb Participants</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if($frm !== 0){
                                    foreach($frm as $frt){
                            ?>
                            <tr>
                                <td>
                                    <span class="fa fa-hashtag"></span>
                                </td>
                                <td>
                                    <b><?php echo($frt->titre) ?></b>
                                </td>
                                <td>
                                   <?php echo(onRetrieveLRNBYFormationId($g,(int)$frt->id)) ?>
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
                            </tr>
                            <?php
                                    }
                                }else{
                            ?>
                            <tr>
                                <td colspan="6">
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
                                <th>Nb Participants</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        <div class="card d-none">
            <div class="card-header">
            <h3 class="card-title">US-Visitors Report</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <div class="d-md-flex">
                <div class="p-1 flex-fill" style="overflow: hidden">
                <!-- Map will be created here -->
                <div id="world-map-markers" style="height: 325px; overflow: hidden">
                    <div class="map"></div>
                </div>
                </div>
                <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                <div class="description-block mb-4">
                    <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                    <h5 class="description-header">8390</h5>
                    <span class="description-text">Visits</span>
                </div>
                <!-- /.description-block -->
                <div class="description-block mb-4">
                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                    <h5 class="description-header">30%</h5>
                    <span class="description-text">Referrals</span>
                </div>
                <!-- /.description-block -->
                <div class="description-block">
                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                    <h5 class="description-header">70%</h5>
                    <span class="description-text">Organic</span>
                </div>
                <!-- /.description-block -->
                </div><!-- /.card-pane-right -->
            </div><!-- /.d-md-flex -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row d-none">
            <div class="col-md-6 d-none">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-warning d-none">
                <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">3</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Working with AdminLTE on a great new app! Wanna join?
                    </div>
                    <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        I would love to.
                    </div>
                    <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                    <li>
                        <a href="#">
                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                        <a href="#">
                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                            </span>
                            <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                        <a href="#">
                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                            </span>
                            <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                        <a href="#">
                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                            </span>
                            <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                        <a href="#">
                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                            </span>
                            <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                        <a href="#">
                        <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                            </span>
                            <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                    </ul>
                    <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <form action="#" method="post">
                    <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-warning">Send</button>
                    </span>
                    </div>
                </form>
                </div>
                <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Latest Members</h3>

                <div class="card-tools">
                    <span class="badge badge-danger">8 New Members</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <ul class="users-list clearfix">
                    <li>
                    <img src="dist/img/user1-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander Pierce</a>
                    <span class="users-list-date">Today</span>
                    </li>
                    <li>
                    <img src="dist/img/user8-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Norman</a>
                    <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                    <img src="dist/img/user7-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Jane</a>
                    <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                    <img src="dist/img/user6-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">John</a>
                    <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                    <img src="dist/img/user2-160x160.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander</a>
                    <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                    <img src="dist/img/user5-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Sarah</a>
                    <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                    <img src="dist/img/user4-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nora</a>
                    <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                    <img src="dist/img/user3-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nadia</a>
                    <span class="users-list-date">15 Jan</span>
                    </li>
                </ul>
                <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                <a href="javascript::">View All Users</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
        <!-- /.card -->

        <!-- PRODUCT LIST -->
        <div class="card d-none">
            <div class="card-header">
            <h3 class="card-title">Recently Added Products</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                <div class="product-img">
                    <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                    <span class="badge badge-warning float-right">$1800</span></a>
                    <span class="product-description">
                    Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
                </div>
                </li>
                <!-- /.item -->
                <li class="item">
                <div class="product-img">
                    <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Bicycle
                    <span class="badge badge-info float-right">$700</span></a>
                    <span class="product-description">
                    26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    </span>
                </div>
                </li>
                <!-- /.item -->
                <li class="item">
                <div class="product-img">
                    <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">
                    Xbox One <span class="badge badge-danger float-right">
                    $350
                    </span>
                    </a>
                    <span class="product-description">
                    Xbox One Console Bundle with Halo Master Chief Collection.
                    </span>
                </div>
                </li>
                <!-- /.item -->
                <li class="item">
                <div class="product-img">
                    <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                    <span class="badge badge-success float-right">$399</span></a>
                    <span class="product-description">
                    PlayStation 4 500GB Console (PS4)
                    </span>
                </div>
                </li>
                <!-- /.item -->
            </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!--/. container-fluid -->