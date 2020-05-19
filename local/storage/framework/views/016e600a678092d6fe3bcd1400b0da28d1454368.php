<?php $__env->startSection('heading'); ?>
Client Detail
<small>List of Client Detail</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Client Detail</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
        <div class="col-md-12">
      <a href="<?php echo e(url('/branchadmin/clientdetail/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-fw fa-plus"></i> New Client Detail</a>
  </div>
    </div>
    
    <div class="box">
      <div class="box-body">
        <div class="panel-heading">
          <div class="top-links btn-group col-md-5">
            <a href="<?php echo e(url('/branchadmin/clientdetail?filter_status=1')); ?>" class="btn <?php echo e($datas['filter_status'] == 1 ? 'btn-primary' : 'btn-default'); ?>">Active Client</a>
            <a href="<?php echo e(url('/branchadmin/clientdetail?filter_status=4')); ?>" class="btn <?php echo e($datas['filter_status'] == 4 ? 'btn-primary' : 'btn-default'); ?>">Passed</a>
            <a href="<?php echo e(url('/branchadmin/clientdetail?filter_status=2')); ?>" class="btn <?php echo e($datas['filter_status'] == 2 ? 'btn-primary' : 'btn-default'); ?>">On Process</a>
            <a href="<?php echo e(url('/branchadmin/clientdetail?filter_status=3')); ?>" class="btn <?php echo e($datas['filter_status'] == 3 ? 'btn-primary' : 'btn-default'); ?>">Closed</a>
            
            <a href="<?php echo e(url('/branchadmin/clientdetail')); ?>" class="btn <?php echo e($datas['filter_status'] == '' ? 'btn-primary' : 'btn-default'); ?>">All</a>
          </div>
          <div class="col-md-7">
            <div class="col-md-3">Search Contact Person</div>
            <div class="col-md-3"><input type="text" id="contact_name" class="form-control" placeholder="Person Name" ></div>
            <div class="col-md-3"><input type="text" id="contact_phone" class="form-control" placeholder="Person Phone"  ></div>
            <div class="col-md-3"><input type="text" id="contact_email" class="form-control" placeholder="Person Email"></div>
            
          </div>
        </div>
        <div class="panel-heading">
          <div class="row">
            
            
          </div>
        </div>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 1%;">S.N.</th>
              <th>Client Name</th>
              <th>Staff Name</th>
              <th>Nature of Business</th>
              <th>Type</th>
              <th>Potentiality</th>
              <th>Project Leader/Associate</th>
              <th>Focal Person</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td><input type="text" id="filter_name" class="form-control" placeholder="Rolling Plans" value="<?php echo e($datas['filter_name']); ?>"></td>
              <td>
              <input type="text" id="filter_staff" class="form-control" placeholder="staffs" value="<?php echo e($datas['filter_staff']); ?>">
              </td>
              <td><input type="text" id="filter_nature" class="form-control" placeholder="Banking" value="<?php echo e($datas['filter_nature']); ?>"></td>
              <td><input type="text" id="filter_type" class="form-control" placeholder="Project Management" value="<?php echo e($datas['filter_type']); ?>"></td>
              <td></td>
              
              <td></td>
              <td><input type="text" id="filter_person" class="form-control" placeholder="John Doe" value="<?php echo e($datas['filter_person']); ?>"></td>
              <td><input type="text" id="filter_phone" class="form-control" placeholder="9841xxxxxx" value="<?php echo e(addslashes($datas['filter_phone'])); ?>"></td>
              <td><input type="text" id="filter_email" class="form-control" placeholder="email@domain.com" value="<?php echo e($datas['filter_email']); ?>"></td>
              <td><a href="<?php echo e(url('/branchadmin/clientdetail')); ?>" class="btn btn-primary">All</a></td>
            </tr>
            
            <?php ($i = 1); ?>
            <?php foreach($datas['clients'] as $client): ?>
            <?php ($total_r = \App\OrgRating::countRating($client->id)); ?>
            <tr>
              <td><?php echo e($i++); ?></td>
              <td><?php echo e($client->client_name); ?><?php if($total_r > 0): ?><a href="<?php echo e(url('/branchadmin/clientdetail/view-rating/'.$client->id)); ?>" target="_blank" class="label bg-red">(<?php echo e($total_r); ?>)</a><?php endif; ?></td>
              <td><?php echo e(\App\Adjustment_staff::getName($client->staff_id)); ?></td>
              <td><?php echo e($client->business_nature); ?></td>
              <td><?php echo e($client->service_type); ?></td>
              <td><?php echo e($client->potentiality); ?></td>
              <td><?php echo e($client->project_leader); ?></td>
              <td><?php echo e($client->focal_person); ?></td>
              <td><?php echo e($client->phone); ?></td>
              <td><?php echo e($client->email); ?></td>
              <td>
                <div class="dropdown mobile-options">
                  <button class="btn btn-lg btn-black dropdown-toggle " type="button" data-toggle="dropdown">
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php echo e(url('/branchadmin/clientdetail/client_contact?client_id='.$client->id)); ?>" target="_blank" class="btn btn-default "><i class="fa fa-fw fa-phone-square"></i> Contacts</a></li>
                    <li><a href="<?php echo e(url('/branchadmin/clientdetail/client_history/'.$client->id)); ?>" target="_blank" class="btn btn-default"><i class="fa fa-fw fa-history"></i> History</a></li>
                    <li><a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($client->id); ?>')" class="btn btn-danger "><i class="fa fa-fw fa-trash"></i> Delete</a></li>
                    
                    <li><a href="<?php echo e(url('/branchadmin/clientdetail/edit/'.$client->id)); ?>" class="btn btn-default "><i class="fa fa-edit"></i> Edit</a></li>
                    <?php if($total_r > 0): ?>
                    <li><a href="<?php echo e(url('/branchadmin/clientdetail/view-rating/'.$client->id)); ?>" class="btn btn-default "><i class="fa fa-eye"></i> View Rating</a></li>
                    <?php endif; ?>
                    
                    <li><a href="<?php echo e(url('/branchadmin/clientdetail/send_comment/'.$client->id)); ?>" title="Client Review Email to Client" class="btn btn-default "><i class="fa fa-envelope"></i> Review Email</a></li>
                   
                    
                    
                  </ul>
                </div>
                
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
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
          <?php echo $datas['clients']->render();?>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Fiscal Year?')){
    var url= "<?php echo e(url('/branchadmin/clientdetail/delete/')); ?>"+ids;
    location = url;
    
    }
    }
    </script>
    <!-- <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script> -->
    <script type="text/javascript">
    $('#filter_name').autocomplete({
      source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_name/")); ?>',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        var filter_nature = $('#filter_nature').val();
        var filter_email = $('#filter_email').val();
        var filter_phone = $('#filter_phone').val();
        var filter_staff = $('#filter_staff').val();
        
        var filter_person = $('#filter_person').val();
        var filter_type = $('#filter_type').val();
        var url = '<?php echo e(url("branchadmin/clientdetail/")); ?>?';
        url += 'filter_name='+ui.item.id;
        if (filter_nature != '') {
        url += '&filter_nature='+filter_nature;
        }
        if (filter_email != '') {
        url += '&filter_email='+filter_email;
        }
        if (filter_staff != '') {
        url += '&filter_staff='+filter_staff;
        }
        if (filter_phone != '') {
        url += '&filter_phone='+filter_phone;
        }
        if (filter_person != '') {
        url += '&filter_person='+filter_person;
        }
        if (filter_type != '') {
        url += '&filter_type='+filter_type;
        }
        location = url;
      }
    });
    $('#filter_staff').autocomplete({
      source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_staff/")); ?>',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        var filter_nature = $('#filter_nature').val();
        var filter_email = $('#filter_email').val();
        var filter_phone = $('#filter_phone').val();
        var filter_name = $('#filter_name').val();
        var filter_person = $('#filter_person').val();
        var filter_type = $('#filter_type').val();
        var url = '<?php echo e(url("branchadmin/clientdetail/")); ?>?';
        url += 'filter_staff='+ui.item.value;
        if (filter_nature != '') {
        url += '&filter_nature='+filter_nature;
        }
        if (filter_name != '') {
        url += '&filter_name='+filter_name;
        }
        if (filter_email != '') {
        url += '&filter_email='+filter_email;
        }
        if (filter_phone != '') {
        url += '&filter_phone='+filter_phone;
        }
        if (filter_person != '') {
        url += '&filter_person='+filter_person;
        }
        if (filter_type != '') {
        url += '&filter_type='+filter_type;
        }
        location = url;
      }
    });
    $('#filter_nature').autocomplete({
      source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_nature/")); ?>',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        var filter_name = $('#filter_name').val();
        var filter_email = $('#filter_email').val();
        var filter_phone = $('#filter_phone').val();
        var filter_staff = $('#filter_staff').val();
        var filter_person = $('#filter_person').val();
        var filter_type = $('#filter_type').val();
        var url = '<?php echo e(url("branchadmin/clientdetail/")); ?>?';
        url += 'filter_nature='+ui.item.id;
        if (filter_name != '') {
        url += '&filter_name='+filter_name;
        }
        if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
            }
        if (filter_email != '') {
        url += '&filter_email='+filter_email;
        }
        if (filter_phone != '') {
        url += '&filter_phone='+filter_phone;
        }
        if (filter_person != '') {
        url += '&filter_person='+filter_person;
        }
        if (filter_type != '') {
        url += '&filter_type='+filter_type;
        }
        location = url;
      
      
      }
    });
    $('#filter_email').autocomplete({
      source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_email/")); ?>',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        var filter_name = $('#filter_name').val();
        var filter_nature = $('#filter_nature').val();
        var filter_phone = $('#filter_phone').val();
        var filter_staff = $('#filter_staff').val();
        var filter_person = $('#filter_person').val();
        var filter_type = $('#filter_type').val();
        var url = '<?php echo e(url("branchadmin/clientdetail/")); ?>?';
        url += 'filter_email='+ui.item.id;
        if (filter_name != '') {
        url += '&filter_name='+filter_name;
        }
        if (filter_staff != '') {
        url += '&filter_staff='+filter_staff;
        }
        if (filter_nature != '') {
        url += '&filter_nature='+filter_nature;
        }
        if (filter_phone != '') {
        url += '&filter_phone='+filter_phone;
        }
        if (filter_person != '') {
        url += '&filter_person='+filter_person;
        }
        if (filter_type != '') {
        url += '&filter_type='+filter_type;
        }
        location = url;
        
      
      }
    });
    $('#filter_phone').autocomplete({
      source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_phone/")); ?>',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        var filter_name = $('#filter_name').val();
        var filter_email = $('#filter_email').val();
        var filter_nature = $('#filter_nature').val();
        
        var filter_person = $('#filter_person').val();
        var filter_type = $('#filter_type').val();
        var url = '<?php echo e(url("branchadmin/clientdetail/")); ?>?';
        url += 'filter_phone='+ui.item.id;
        if (filter_name != '') {
        url += '&filter_name='+filter_name;
        }
        if (filter_staff != '') {
        url += '&filter_staff='+filter_staff;
        }
        if (filter_email != '') {
        url += '&filter_email='+filter_email;
        }
        if (filter_nature != '') {
        url += '&filter_nature='+filter_nature;
        }
        if (filter_person != '') {
        url += '&filter_person='+filter_person;
        }
        if (filter_type != '') {
        url += '&filter_type='+filter_type;
        }
        location = url;
      
      
      }
    });
    $('#filter_person').autocomplete({
      source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_person/")); ?>',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        var filter_name = $('#filter_name').val();
        var filter_email = $('#filter_email').val();
        var filter_phone = $('#filter_phone').val();
        var filter_staff = $('#filter_staff').val();
        var filter_nature = $('#filter_nature').val();
        var filter_type = $('#filter_type').val();
        var url = '<?php echo e(url("branchadmin/clientdetail/")); ?>?';
        url += 'filter_person='+ui.item.id;
        if (filter_name != '') {
        url += '&filter_name='+filter_name;
        }
        if (filter_staff != '') {
        url += '&filter_staff='+filter_staff;
        }
        if (filter_email != '') {
        url += '&filter_email='+filter_email;
        }
        if (filter_phone != '') {
        url += '&filter_phone='+filter_phone;
        }
        if (filter_nature != '') {
        url += '&filter_nature='+filter_nature;
        }
        if (filter_type != '') {
        url += '&filter_type='+filter_type;
        }
        location = url;
      
      
      }
    });
    $('#filter_type').autocomplete({
      source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_type/")); ?>',
      minlength:1,
      autoFocus:true,
      select:function(e,ui){
        var filter_name = $('#filter_name').val();
        var filter_email = $('#filter_email').val();
        var filter_phone = $('#filter_phone').val();
        
        var filter_person = $('#filter_person').val();
        var filter_nature = $('#filter_nature').val();
        var url = '<?php echo e(url("branchadmin/clientdetail/")); ?>?';
        url += 'filter_type='+ui.item.id;
        if (filter_name != '') {
        url += '&filter_name='+filter_name;
        }
        if (filter_staff != '') {
        url += '&filter_staff='+filter_staff;
        }
        if (filter_email != '') {
        url += '&filter_email='+filter_email;
        }
        if (filter_phone != '') {
        url += '&filter_phone='+filter_phone;
        }
        if (filter_person != '') {
        url += '&filter_person='+filter_person;
        }
        if (filter_nature != '') {
        url += '&filter_nature='+filter_nature;
        }
        location = url;
      
      
      }
    });

    $('#contact_name').autocomplete({
    source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_person_name/")); ?>',
    minlength:1,
    autoFocus:true,
    select:function(e,ui){
    
    var contact_email = $('#contact_email').val();
    var contact_phone = $('#contact_phone').val();
    
    
    var url = '<?php echo e(url("branchadmin/clientdetail/client_contact")); ?>?';
    url += 'filter_name='+ui.item.id;
    
    if (contact_email != '') {
    url += '&filter_email='+contact_email;
    }
    if (contact_phone != '') {
    url += '&filter_phone='+contact_phone;
    }
    
    window.open(url,'_blank', 'menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes');
    
    
    }
    });
    $('#contact_email').autocomplete({
    source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_person_email/")); ?>',
    minlength:1,
    autoFocus:true,
    select:function(e,ui){
    
    var contact_name = $('#contact_name').val();
    var contact_phone = $('#contact_phone').val();
    
    
    var url = '<?php echo e(url("branchadmin/clientdetail/client_contact")); ?>?';
    url += 'filter_email='+ui.item.id;
    
    if (contact_name != '') {
    url += '&filter_name='+contact_name;
    }
    if (contact_phone != '') {
    url += '&filter_phone='+contact_phone;
    }
    
    window.open(url,'_blank', 'menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes');
    
    
    }
    });
    $('#contact_phone').autocomplete({
    source: '<?php echo e(url("branchadmin/clientdetail/autocomplete_person_phone/")); ?>',
    minlength:1,
    autoFocus:true,
    select:function(e,ui){
    
    var contact_name = $('#contact_name').val();
    var contact_email = $('#contact_email').val();
    
    
    var url = '<?php echo e(url("branchadmin/clientdetail/client_contact")); ?>?';
    url += 'filter_phone='+ui.item.id;
    
    if (contact_name != '') {
    url += '&filter_name='+contact_name;
    }
    if (contact_email != '') {
    url += '&filter_email='+contact_email;
    }
    
    window.open(url,'_blank', 'menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes');
    //location = url;
    
    
    }
    });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>