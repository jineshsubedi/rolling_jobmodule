<?php $__env->startSection('heading'); ?>
Job Level
            <small>List of Job Level</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Level</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
          <a href="<?php echo e(route('branchadmin.gmail.sent')); ?>" class="btn btn-primary"><i class="fa fa-list"></i>Send Mail</a>
          <a href="<?php echo e(route('branchadmin.gmail.create')); ?>" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Compose</a>
          <a href="<?php echo e(route('branchadmin.gmail.trash')); ?>" class="btn btn-danger right"><i class="fa fa-trash"></i>Trash</a>
      </div>
     
      <div class="box">
            <div class="box-body">
                <div class="panel-heading">
                    <div class="top-links btn-group">
                <div class="tab">
                    <a class="tablinks btn btn-default" onclick="openCity(event, 'Inbox')" id="defaultOpen">Inbox</a>
                    <a class="tablinks btn btn-default" onclick="openCity(event, 'Social')">Social</a>
                    <a class="tablinks btn btn-default" onclick="openCity(event, 'Promotions')">Promotions</a>
                </div>
                    </div>
                </div>

                <div id="Inbox" class="tabcontent">
                    <h3>Inbox</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                        foreach ($data['inbox'] as $row) { ?>
                        <tr>
                            <?php ($message = $row->load()); ?>

                            <?php ($from = $message->getFrom()); ?>
                            <?php if($message->getLabels()[0] == "UNREAD"): ?>
                                <td><?php echo $i++ ;?> (unread) <?php echo e($data['inbox']->pageToken); ?></td>
                                <th><?php echo $from['name'];?> (<?php echo e($from['email']); ?>)</th>
                                <th><?php echo e($message->getSubject()); ?></th>
                            <?php else: ?>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $from['name'];?> (<?php echo e($from['email']); ?>)</td>
                                <td><?php echo e($message->getSubject()); ?></td>
                            <?php endif; ?>

                            <td>
                                <form action="<?php echo e(route('branchadmin.gmail.destroy', $message->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('branchadmin.gmail.show',$message->getId())); ?>" class="btn btn-primary left"><i class="fa fa-eye"></i></a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-fw fa-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php  }
                        ?>
                        <tfooter>
                        <th colspan="2"><a href="<?php echo e(route('branchadmin.gmail.index')); ?>" class="btn btn-primary">  &laquo;   Back to First  </a></th>
                        <th colspan="2"><a href="<?php echo e(route('branchadmin.gmail.page', $data['inbox']->pageToken)); ?>" class="btn btn-primary">Next   &raquo;  </a></th>
                        </tfooter>
                    </table>

                </div>

                <div id="Social" class="tabcontent">
                    <h3>Social</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                        foreach ($data['social'] as $row) { ?>
                        <tr>
                            <?php ($message = $row->load()); ?>

                            <?php ($from = $message->getFrom()); ?>
                            <?php if($message->getLabels()[1] == "UNREAD"): ?>
                                <td><?php echo $i++ ;?> (unread)</td>
                                <th><?php echo $from['name'];?> (<?php echo e($from['email']); ?>)</th>
                                <th><?php echo e($message->getSubject()); ?></th>
                            <?php else: ?>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $from['name'];?> (<?php echo e($from['email']); ?>)</td>
                                <td><?php echo e($message->getSubject()); ?></td>
                            <?php endif; ?>

                            <td>
                                <form action="<?php echo e(route('branchadmin.gmail.destroy', $message->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('branchadmin.gmail.show',$message->getId())); ?>" class="btn btn-primary left"><i class="fa fa-eye"></i></a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-fw fa-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php  }
                        ?>
                    </table>

                </div>

                <div id="Promotions" class="tabcontent">
                    <h3>Promotions</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                        foreach ($data['promotions'] as $row) { ?>
                        <tr>
                            <?php ($message = $row->load()); ?>

                            <?php ($from = $message->getFrom()); ?>
                            <?php if($message->getLabels()[1] == "UNREAD"): ?>
                                <td><?php echo $i++ ;?> (unread)</td>
                                <th><?php echo $from['name'];?> (<?php echo e($from['email']); ?>)</th>
                                <th><?php echo e($message->getSubject()); ?></th>
                            <?php else: ?>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $from['name'];?> (<?php echo e($from['email']); ?>)</td>
                                <td><?php echo e($message->getSubject()); ?></td>
                            <?php endif; ?>

                            <td>
                                <form action="<?php echo e(route('branchadmin.gmail.destroy', $message->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('branchadmin.gmail.show',$message->getId())); ?>" class="btn btn-primary left"><i class="fa fa-eye"></i></a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-fw fa-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php  }
                        ?>
                    </table>

                </div>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>
  <div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
      </div>
    </div>
  </div>
      <script>
          function openCity(evt, cityName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
          }

          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();
      </script>
  <script type="text/javascript">
    function confirm_delete(ids){
    if(confirm('Do You Want To Delete This joblevel?')){
      var url = "<?php echo e(url('/branchadmin/gmail/"+ids+"/delete')); ?>";
      location = url;
      }
    }
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>