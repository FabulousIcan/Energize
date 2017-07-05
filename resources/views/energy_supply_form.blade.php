@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1 class="page-header">Have Energy for sale?</h1>
                    <form class="form-horizontal" method="POST" action="/create/energy">

                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">

                        <div class="form-group">
                            <label class="control-label col-sm-2">Capacity</label>
                            <div class="col-sm-10">
                                 <input class="form-control" type="number" name="energy_capacity" maxlength="3" required="required"/> 
                               <!--  <select class="form-control" name="capacity">                                    
                                      <script language="javascript" type="text/javascript">

                                    var i
                                    for(i=50; i<=900;i++){
                                        document.write("<option value='i'>"+i+"</option>");
                                    }
                                    </script>
                                </select>  -->
   
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2">Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="price" required="required"/>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-2">Comment</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="8" name="description" maxlength="100"></textarea>
                           </div> 
                        </div> -->
                        <div class="col-sm-offset-2 col-sm-10">
                            {{ csrf_field() }}
                            <input class="btn btn-default pull-right" type="submit" value="Post">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


