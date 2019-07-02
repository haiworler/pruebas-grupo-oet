@extends('admin.home')
@section('contenido')
<div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count">
          <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Propietarios en el sistema</span>
            <div class="count">{{$CanPerpro}}</div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Conductores en el sistema</span>
            <div class="count">{{$CanPerCon}}</div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-car"></i> Total Vehículos Registrados</span>
            <div class="count green">{{$CanVe}}</div>
          </div>
          
         
          
        </div>
        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            
          </div>

        </div>
        <br />

       





        
      </div>
@endsection
