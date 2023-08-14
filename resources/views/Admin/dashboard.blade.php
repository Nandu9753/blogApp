@extends('Admin.layouts.app')
@section('content')
<div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{ url('/') }}"> Home</a></li>
						<li class="active">Dashboard</li>
					</ul>
            </div>
           
            </div>
                <div class="row padding-top">
                    <h2>Welocome to the {{ Auth::user()->name }} Dashboard</h2>
                </div>
            
            
        </div>
@endsection