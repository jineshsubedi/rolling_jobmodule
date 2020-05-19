@extends('branchadmin_master')
@section('heading')
Job Locations
            <small>List of Job Locations</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Locations</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <a href="{{ route('branchadmin.job_location.create') }}" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Add New joblocation</a>
      </div>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                         <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php $i=1; 
                        foreach ($data as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                        
                         <td><?php echo $row->name;?></td>
                          
                        <td>
                          <form action="{{route('branchadmin.job_location.destroy', $row->id)}}" method="post">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
                              <a href="{{ url('/branchadmin/job_location/'.$row->id.'/edit/') }}" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-fw fa-remove"></i></button>
                          </form>
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      

                    </table>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $data->render();?>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
 function confirm_delete(ids){
    if(confirm('Do You Want To Delete This joblocation?')){
      var url= "{{ url('/admin/joblocation/delete/') }}"+ids;
      location = url;
      
      }
    }
 </script>
@stop()