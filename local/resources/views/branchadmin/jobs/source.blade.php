@extends('admin_master')
@section('heading')
View Application Source of {{$datas['job']->title}}
            <small>Detail of View Application Source of {{$datas['job']->title}}</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/jobs') }}">Jobs</a></li>
            <li class="active">View Application source </li>
@stop
@section('content')

 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">View Application source</div>
                <div class="panel-heading">
      <div class="top-links btn-group">
        

        
        
        
        </div>
    </div>
                <div class="panel-body">
                   
 <div class="default-options-search">
     <div class="row">
  <div class="form-group col-md-12">
              <label class="col-md-2">Date</label>
              <div class="col-md-2">
                <input id="filter_date" type="text" class="form-control" value="{{$datas['filter_date']}}">
              </div>
              <div class="col-md-2">
                <a class="btn btn-success" id="search"><i class="fa fa-search"></i>Search</a>
              </div>
            </div>
            </div>

 </div>
                    

                   
                    @if(count($datas['source']) > 0)

                     <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Application Source</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <?php $i = 1; ?>
                                 @foreach($datas['source'] as $view)
                              <li class="col-md-4" style="float:left; list-style:none; padding:10px;">{{$view['title']}} 
                              
                               
                                  <span id="{{$i}}" class="pull-right badge bg-blue " style="cursor:pointer" >{{$view['total']}}</span>
                           
                            <div id="c_{{$i}}" style="display:none;">
                              @foreach($view['employe'] as $emp)
                            <a href="{{$emp['url']}}" class="btn btn-default btn-xs" target="_blank" title="{{$emp['name']}}">{{$emp['name']}}</a>
                              @endforeach
                            
                           </div>
                            
                            
                              
                              </li>
                              <?php $i++; ?>
                               @endforeach
                              
                             
                            </ul>
                          </div>                        
                        </div>
                        <!-- box-body -->
                      </div>
                    @endif
                    
                   
                     
                      
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
$(function() {
 
  
  $('#filter_date').datepicker();
 
});

$('#search').click(function()
{
  var url = '{{url("/admin/jobs/source/".$datas["job"]->id)}}';
  var filter_date = $('#filter_date').val();

  if (filter_date != '') {
    url += '?filter_date='+filter_date;
    
  }
  window.location = url;
});


$(document).delegate('.badge', 'click', function(e) {
      e.preventDefault();
      
        $('.popover').popover('hide', function() {
            $('.popover').remove();
          });

          var element = this;
          var id = $(this).attr('id');
          var cont = $('#c_'+id).html();
          $(element).popover({
          html: true,
          placement: 'left',
          trigger: 'manual',
          content: function() {
          return cont;
        }
      });

      $(element).popover('show');
  });


</script>


@endsection