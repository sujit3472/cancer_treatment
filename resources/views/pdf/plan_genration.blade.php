<!doctype html>
<html>
	<head>
		<title>&nbsp;</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=320, target-densitydpi=device-dpi">
		<style type="text/css">
			body{ font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif; font-size:12px; }
			table, th, td {border: solid 1px #000; border-collapse: collapse; padding: 3px 6px; font-size:12px; } 
			table th{font-weight:bold;}
			.top_wrapper{width:100%; display:inline-block;margin-top:10px; }	
			.lt_sec{float:left; width:50%;padding: 15px;}
			.rt_sec{float:right; width:35%;padding: 15px;}
			.table_wrapper{float:left; width:100%; margin-bottom:15px;}
			tr{ page-break-inside:avoid; page-break-after:auto }
			thead { display:table-header-group }
			.logo_box{display: inline-block; width: 100%; background-color: black; padding:10px 0;color:white}
			.product_img{width: 150px;}
		</style>
	</head>
	<body>
		<div style="width: 100%; margin:0 auto; text-align: center;">
			<div class="top_wrapper">
				<div class="logo_box">
					<h1>Online Cancer Treatment</h1>
				</div>
				<div class="lt_sec">
					<p style="text-align:left; color:#000; line-height:22px;">
						<strong style="font-size:13px;">Hello  {{ ucfirst( $data->fn_patient_enquiry_plan_genration_data->fn_patient_enquiry_data->name ?? '' )}} :
						</strong>&nbsp;</br>	                 
					</p>
					<p>
						Your case is accepted by the doctor "
						<strong style="font-size:13px;">{{ $data->fn_doctor_plan_genration_data->name  ?? '' }}"</strong>&nbsp;</br>
						check the below details of plan</br>
					</p>
				</div>
			</div>	
			<div class="table_wrapper">
				{!! $data->description ?? '' !!}
			</div>
			<p style="float: left;width: 100%;text-align: left;border-top: 1px solid #eaeaea;border-bottom: 1px solid #eaeaea;padding: 30px 0;font-size: 14px;">
				<div class="footer">
					Copyright © {{ now()->year }} Cancer Treatment. All rights reserved.
				</div>
				
			</p>
		</div>
	</body>
</html>
