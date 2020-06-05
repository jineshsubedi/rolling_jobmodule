@extends('branchadmin_master')
@section('heading')
Job Level
            <small>List of Calendar</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Calendar</li>
@stop
@section('content')
{{--    {{dd($datas['result'][0]['description'])}}--}}
{{--        {{dd($datas['result'][8])}}--}}
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
          <a href="{{ route('branchadmin.dropbox.create') }}" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Add New Document to File</a>
          <a href="{{ route('branchadmin.drive.trash') }}" class="btn btn-danger right"><i class="fa fa-trash"></i>Trash</a>
      </div>
     
      <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                          <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;
                        foreach ($data as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                              <td>
                                  @if ($row['.tag'] == 'folder')
                                      <a href='{{ url('filemanager'.$row['path_lower']) }}'><i class="fa fa-folder"></i> {{ $row['name'] }}</a><br>
                                  @else
                                      {{ $row['name'] }}
                                  @endif
                              </td>
                        <td>
                          <form action="{{route('branchadmin.drive.destroy', $row['id'])}}" method="post">
                              {!! csrf_field() !!}
                              {!! method_field('DELETE') !!}
{{--                              <a href="{{ url('/branchadmin/calendar/'.$row->id.'/edit/') }}" class="btn btn-primary left"><i class="fa fa-edit"></i></a>--}}
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
      <div class="dataTables_paginate paging_simple_numbers">
{{--          <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FKathmandu&amp;src=ZGVlcGFhY2VlQGdtYWlsLmNvbQ&amp;src=ZW4tZ2IubnAjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%237986CB&amp;color=%230B8043&amp;showTitle=1&amp;showNav=1&amp;showPrint=0&amp;showCalendars=1&amp;showTz=1&amp;hl=en&amp;title=Rolling%20Calendar" style="border:solid 1px #777" width="100%" height="600" frameborder="0" scrolling="no"></iframe>--}}
<!--          --><?php //echo $data->render();?>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function confirm_delete(ids){
    if(confirm('Do You Want To Delete This joblevel?')){
      var url = "{{url('/branchadmin/job_level/"+ids+"/delete')}}";
      location = url;
      }
    }
 </script>
@stop()