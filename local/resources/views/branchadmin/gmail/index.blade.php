@extends('branchadmin_master')
@section('heading')
Job Level
            <small>List of Job Level</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Level</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <a href="{{ route('branchadmin.gmail.create') }}" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Compose</a>
      </div>
     
      <div class="box">
            <div class="box-body">
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
                        foreach ($data as $row) { ?>
                          <tr>
                              @php($from = $row->getFrom())
                              @if($row->getLabels()[0] == "UNREAD")
                                  <td><?php echo $i++ ;?> (unread)</td>
                                  <th><?php echo $from['name'];?> ({{$from['email']}})</th>
                                  <th>{{$row->getSubject()}}</th>
                              @else
                                  <td><?php echo $i++ ;?></td>
                                  <td><?php echo $from['name'];?> ({{$from['email']}})</td>
                                  <td>{{$row->getSubject()}}</td>
                              @endif

                        <td>
                          <form action="{{route('branchadmin.gmail.destroy', $row->id)}}" method="post">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
                              <a href="{{route('branchadmin.gmail.show',$row->getId())}}" class="btn btn-primary left"><i class="fa fa-eye"></i></a>
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
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    function confirm_delete(ids){
    if(confirm('Do You Want To Delete This joblevel?')){
      var url = "{{url('/branchadmin/gmail/"+ids+"/delete')}}";
      location = url;
      }
    }
 </script>
@stop()