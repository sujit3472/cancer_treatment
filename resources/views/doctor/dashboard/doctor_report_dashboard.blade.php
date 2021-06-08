@extends('layouts.adminapp')
@section('header')

@endsection
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Dashboard</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
			
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content">
  	<div class="container-fluid">
    	<!-- Small boxes (Stat box) -->
	    <div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>0</h3>
						<p>Doctor User</p>
					</div>
				</div>
			</div>
	      	<!-- ./col -->
	      	<div class="col-lg-3 col-6">
	        <!-- small box -->
		        <div class="small-box bg-success">
		        	<div class="inner">
			            <h3>0</h3>
						<p>Enquiry Count</p>
		        	</div>
	        	</div>
	     	</div>
	   	</div>
    	<!-- /.row (main row) -->
  	</div><!-- /.container-fluid -->
</section>
@endsection

@section('footer')
<script type="text/javascript">
	
</script>
@endsection