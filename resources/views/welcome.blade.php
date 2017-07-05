@extends('layouts.app')


@section('refresh')
<meta http-equiv="refresh" content="30">
@endsection

@section('title')
    Dashboard
@endsection


@section('pagespecificpluginstyles')
<!-- <script src="/js/index.js"></script>
 -->
@endsection


@section('pageheader')
    Dashboard
@endsection



@section('breadcrumb')
    <small>
        <i class="ace-icon fa fa-angle-double-right"></i>
            overview &amp; stats
    </small>
@endsection



@section('content')
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>

        <i class="ace-icon fa fa-check green"></i>

        Welcome to
        <strong class="green">
            Energize. We have {{$total_users}} users on our platform
        </strong>
        
    </div>

    
    <!-- #section:custom/extra.hr -->
    <div class="hr hr32 hr-dotted"></div>

    <!-- /section:custom/extra.hr -->
    <div class="row">
        <div class="col-sm-6">

            <div class="widget-box transparent" id="recent-box">
                <div class="widget-header">
                    <h4 class="widget-title lighter smaller">
                        
                       
                    </h4>

                    <div class="widget-toolbar no-border">
                        <ul class="nav nav-tabs" id="recent-tab">
                            <li class="active">
                                <a data-toggle="tab" href="#task-tab">
                                    <div class="inline dropdown-hover">

                                       STATS
                                        <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                  

                                       <!--  <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">

                                            <li class="list_item">
                                                <div id="high_link" class="ace-icon fa fa-caret-right btn btn-yucolor">
                                                    &nbsp; High
                                                </div>
                                            </li>

                                            <li class="list_item">
                                                <div id="medium_link" class="ace-icon fa fa-caret-right btn btn-yucolor">
                                                    &nbsp; Medium
                                                </div>
                                            </li>

                                            <li class="list_item">
                                                <div id="low_link" class="ace-icon fa fa-caret-right btn btn-yucolor">
                                                    &nbsp; Low
                                                </div>
                                            </li>
                                        </ul> -->
                                    </div>
                                </a>
                            </li>
                            

                          
                            <li>
                                <a data-toggle="tab" href="#comment-tab">
                                    <div class="inline dropdown-hover">

                                        Recent Users
                                        <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                  
                                    </div>
                                </a>
                            </li>
                         
                        </ul>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-4">
                        <div class="tab-content padding-8">
                            <div id="task-tab" class="tab-pane active">
                                
                                <!-- #section:pages/dashboard.tasks -->
                                <div class="comments">
                                    <div class="itemdiv commentdiv">

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <thead class="thin-border-bottom">
                                                        <tr>
                                                            <th>
                                                                Energy (in KWh)
                                                            </th>

                                                            <th>
                                                                Price (in EnCoin)
                                                            </th>

                                                            <th>
                                                                Date Posted
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tbody>
                                                    @foreach($recent_supply as $supply)

                                                     <tr>
                                                        <td>
                                                            {{$supply->energy_capacity}}
                                                        </td>
                                                         <td>
                                                          {{$supply->price}}
                                                        </td>
                                                         <td>
                                                            {{$supply->created_at}}
                                                        </td>
                                                         
                                                        </tr>
                                                        @endforeach                                                      
                                                   
                                                    </tbody>

                                                   
                                                   
                                                    </tbody>

                                                </table>
                                            </div><!-- /.widget-main -->
                                        </div><!-- /.widget-body -->
      
                                        
                                    </div>                                                                                             
                                </div>

                                <!-- /section:pages/dashboard.tasks -->
                            </div>

 
                            <!-- assigned to my team -->
                            <div id="comment-tab" class="tab-pane">
                                <!-- #section:pages/dashboard.team -->
                                <div class="comments">
                                    <div class="itemdiv commentdiv">

                                       <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <table class="table table-bordered table-striped table-hover">
                                                    <thead class="thin-border-bottom">
                                                        <tr>
                                                            
                                                            <th>
                                                                Name
                                                            </th>

                                                            <th>
                                                                Code
                                                            </th>
                                                            <th>
                                                                Reputation
                                                            </th>

                                                            <th>
                                                                Joined
                                                            </th>
                                                        
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($recent_users as $recent_user)

                                                     <tr>
                                                        <td>
                                                           ######
                                                        </td>
                                                         <td>
                                                           #ENERGIZE{{$recent_user->energize_code}}
                                                        </td>
                                                        <td>
                                                           {{$recent_user->reputation}}
                                                        </td>
                                                         <td>
                                                            {{$recent_user->created_at}}
                                                        </td>
                                                         
                                                        </tr>
                                                        @endforeach

                                                       
                                                   
                                                    </tbody>

                                                </table>
                                            </div><!-- /.widget-main -->
                                        </div><!-- /.widget-body -->
      
                                       
                                     </div>
                                        
                                </div>   
                                    
                                <!-- /section:pages/dashboard.team -->
                            </div>
                                                                                 
                        </div>
                    </div>
            </div><!-- /.widget-box -->
                                    


                
            </div><!-- /.widget-box -->
        </div><!-- /.col -->

        



        <div class="col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title yucolor lighter smaller">
                        <i class="ace-icon fa fa-tasks yucolor"></i>
                        Recent transactions
                    </h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <!-- #section:pages/dashboard.recent requests -->
                        <div class="dialogs">
                         @foreach($recent_users as $recent_user)                            
                            <p>### just received *** from ### </p>
                            @endforeach

                
                        </div>
                        <!-- /section:pages/dashboard.conversations -->



                    </div><!-- /.widget-main -->
                </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection




@section('pagespecificpluginscripts')


@endsection


@section('inlinescriptsrelatedtothispage')

   <script type="text/javascript">
            jQuery(function($) {
                $('.easy-pie-chart.percentage').each(function(){
                    var $box = $(this).closest('.infobox');
                    var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
                    var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
                    var size = parseInt($(this).data('size')) || 50;
                    $(this).easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: parseInt(size/10),
                        animate: ace.vars['old_ie'] ? false : 1000,
                        size: size
                    });
                })
            
                $('.sparkline').each(function(){
                    var $box = $(this).closest('.infobox');
                    var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
                    $(this).sparkline('html',
                                     {
                                        tagValuesAttribute:'data-values',
                                        type: 'bar',
                                        barColor: barColor ,
                                        chartRangeMin:$(this).data('min') || 0
                                     });
                });
            
            
              //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
              //but sometimes it brings up errors with normal resize event handlers
              $.resize.throttleWindow = false;
              //get the percentage value of requests assigned to different departments
                var service = ((document.getElementById("countservice").value)/(document.getElementById("countall").value))*100;
                var infrastructure = ((document.getElementById("countinfrastructure").value)/(document.getElementById("countall").value))*100;
                var network = ((document.getElementById("countnetwork").value)/(document.getElementById("countall").value))*100;
                var data = ((document.getElementById("countdata").value)/(document.getElementById("countall").value))*100;
                var software = ((document.getElementById("countsoftware").value)/(document.getElementById("countall").value))*100;
                var hardware = ((document.getElementById("counthardware").value)/(document.getElementById("countall").value))*100;
                var change = ((document.getElementById("countchange").value)/(document.getElementById("countall").value))*100;

                
                //insert the values to the piechart placeholder to be displayed on the page
                var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
                var data = [
                { label: "Infrastructure",  data: infrastructure, color: "#E90B8D"},
                { label: "Hardware",  data: hardware, color: "#2091CF"},
                { label: "Software",  data: software, color: "#8C63D0"},
                { label: "Network",  data: network, color: "#82AF6F"},
                { label: "Service",  data: service, color: "#2C6AA0"},
                { label: "Change",  data: change, color: "#FFB901"},
                { label: "Data",  data: data, color: "#DA5430"}
              ]

              function drawPieChart(placeholder, data, position) {
                  $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt:0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne", 
                        labelBoxBorderColor: null,
                        margin:[-30,15]
                    }
                    ,
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                 })
             }
             drawPieChart(placeholder, data);
            
             /**
             we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
             so that's not needed actually.
             */
             placeholder.data('chart', data);
             placeholder.data('draw', drawPieChart);
            
            
              //pie chart tooltip example
              var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
              var previousPoint = null;
            
              placeholder.on('plothover', function (event, pos, item) {
                if(item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent']+'%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }
                
             });
            
              

              //filter requests assigned to me based on priority
              $(document).ready(function(){         
                  
                    $(".my_medium").hide(); 
                    $(".my_low").hide(); 
                    $(".my_high").show(); 
                   

                
                    $("#my_assigned_high").click(function(){     
                        $(".my_high").toggle(); 
                        $(".my_medium").hide(); 
                        $(".my_low").hide();                                 
                    });

                    $("#my_assigned_medium").click(function(){   
                        $(".my_medium").toggle(); 
                        $(".my_high").hide(); 
                        $(".my_low").hide();                                         
                    });

                    $("#my_assigned_low").click(function(){     
                        $(".my_low").toggle();
                        $(".my_high").hide(); 
                        $(".my_medium").hide();                                          
                    });
                });



                //filter all requests based on priority
               $(document).ready(function(){         
                  
                    $(".medium").hide(); 
                    $(".low").hide(); 
                    $(".high").show(); 
                   

                
                    $("#high_link").click(function(){     
                        $(".high").toggle(); 
                        $(".medium").hide(); 
                        $(".low").hide();                                 
                    });

                    $("#medium_link").click(function(){   
                        $(".medium").toggle(); 
                        $(".high").hide(); 
                        $(".low").hide();                                         
                    });

                    $("#low_link").click(function(){     
                        $(".low").toggle();
                        $(".high").hide(); 
                        $(".medium").hide();                                          
                    });
                });

            
            })
        </script>
@endsection




