@extends('layouts.app')

@section('title')
Welcome
@stop

@section('content')
           
  <div class="content">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      @foreach($energysupplies as $energysupply)
        

        <div class="card-columns  col-md-4">
            <div class="card" style="max-width:200px;">

                <img src="/img/avatar.jpg" width="120" height="120" class="card-img-top" alt="Card image" />

                <div class="card-block">

                    <h4 class="card-title">{{ $energysupply->energy_capacity }} KW energy at {{ $energysupply->price }} EnCoin per KWh</h4>

                    <p class="card-text">Producer:<a href="/userSupply/{{ $energysupply->user->id }}"> {{ $energysupply->user->name}} </a> <br/> Posted on: {{date("d M Y h:m", strtotime($energysupply->created_at))}}</p>

                  <!--   <input type="text" name="energize_code" id="code"/>
 -->
                    <div class="panel-footer" style="text-align: right;">
                      <a href="#modal-table" role="button" class="green" data-toggle="modal"> 
                      
                        <Button name="buy">Buy Now</Button>
                        </a>
                              
                    </div>

                </div>
            </div>           

        </div>
      @endforeach
      
    </div>
  </div> 

<!-- <script type="text/javascript">
  function showCode(){
    //document.getElementById('code').style.display = 'block';

    console.log( $(this).closest("input").id);
  }

</script> -->
                

  <!-- modal content -->
  <div id="modal-table" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header no-padding">
                  <div class="table-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <span class="white">&times;</span>
                      </button>
                     Purchase Energy
                  </div>
              </div>

              <div class="modal-body no-padding">
                  <!-- #modal content begins -->
                  <div class="col-xs-12">
                      <!-- PAGE CONTENT BEGINS -->

                      <br/>
                      <form class="form-horizontal" role="form" method="POST" action="{{url('/buy/energy')}}">
                      {{ csrf_field() }}
                      <!-- #section:elements.form -->
                  
                      <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                      <input type="text" id="form-field-1" class="form-control" name="energize_code" disabled="true" value="#ENERGIZE{{ $energysupply->user_id}}" />

                      
                      <div class="form-group">

                          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Quantity (in KWh)</label>

                          <div class="col-sm-8">
                              <input type="text" id="form-field-1" class="form-control" name="energy_capacity" placeholder="" required="required" autofocus="autofocus" autocomplete="off"/>
                          </div>
                      </div>

                  </div>
                  <!-- #modal content ends -->
              </div>

              <div class="modal-footer no-margin-top">
                  <div class="col-md-offset-3 col-md-9 pull-right">
                      <button class="btn btn-sm btn-yucolor" type="submit">
                          <i class="ace-icon fa fa-send"></i>
                          Make Transaction
                      </button>
                      </form>
                  
                      <button class="btn btn-sm btn-yucolor pull-right" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Close
                      </button>
                  </div>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
</div>
</div>
@stop





   



































