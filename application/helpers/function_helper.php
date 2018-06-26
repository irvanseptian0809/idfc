<?php

function getSkin($data=null){
	$CI =& get_instance();

	$CI->load->view('skin/header', $data);
	$CI->load->view('skin/body');
	$CI->load->view('skin/footer');
}

function goLogin(){
	$CI =& get_instance();

	$data['title'] = 'Login';
	$CI->load->view('login/login', $data);
}

function checkSession($sessName=null){
	$CI =& get_instance();

	if(trim($sessName)=="")
		return $CI->session->userdata();
	else
		return $CI->session->userdata("$sessName");
}

function isLogin(){
	if(checkSession("id")=="")
		return FALSE;
	else
		return TRUE;
}

function escapeStr($str){
	$CI =& get_instance();

	return $CI->db->escape_str($str);
}

function postInput($str){
	$CI =& get_instance();

	return $CI->input->post("$str");
}

function loadModel($model){
	$CI =& get_instance();

	if(is_array($model)){
		foreach ($model as $each){
			loadModel($each);
		}
	}else{
		return $CI->load->model("$model");
	}
}

function loadLibrary($library){
	$CI =& get_instance();

	if(is_array($library)){
		foreach ($library as $each){
			loadLibrary($each);
		}
	}else{
		return $CI->load->library("$library");
	}
}

function loadView($view,$data=null){
	$CI =& get_instance();

	if(is_array($view)){
		foreach ($view as $each){
			loadView($each,$data);
		}
	}else{
		return $CI->load->view("$view",$data);
	}
}

function getLastId(){
	$CI =& get_instance();
	return $CI->db->insert_id();
}

function setSession($arrayUserData){
	$CI =& get_instance();

	return $CI->session->set_userdata($arrayUserData);
}

function sessionValue($sessionName){
	$CI =& get_instance();

	return $CI->session->userdata("$sessionName");
}

function ajaxProcessStatus($grid=null,$text="Loading..."){
	$str = "<td colspan='100'>$text</td> />";
	if(trim($grid)==""){
		$str = "<div class='row-fluid'><div class='span12' style='text-align: center;'>$text</div></div>";
	}

	return $str;
}

function mysqldatetime(){
	$CI =& get_instance();
	$datestring = "%Y-%m-%d %H:%i:%s";
	$time = time();
	return mdate($datestring, $time);
}

function getSeachQuery($table,$keyword){
    $CI =& get_instance();
    $fields = $CI->db->list_fields($table);
    $likeQuery = "";
    foreach ($fields as $field)
    {
       $likeQuery.="LOWER(".$table.".".$field.") LIKE LOWER('%".$keyword."%') OR ";
    }
    $likeQuery.="false";
    return $likeQuery;
}

function getSeachFormArray($fields,$keyword){
	$likeQuery = "";
    foreach ($fields as $field)
    {
       $likeQuery.="LOWER(".$field.") LIKE LOWER('%".$keyword."%') OR ";
    }
    $likeQuery.="false";
    return $likeQuery;
}

function setNumberFormat($val){
	if($val!=''){
		$setNumberFormat = number_format($val,2,',','.');
	}else if($val==0){
		$setNumberFormat = '0,00';
	}else{
		$setNumberFormat = NULL;
	}

	return $setNumberFormat;
}

function setNumberFormatNoDesimal($val){
	if($val!=""){
		$setNumberFormat = number_format($val,0,',','.');
		return $setNumberFormat;
	}else{
		return NULL;
	}

}

function tanggal_indo($tanggal){
	$bulan = array (1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function build_table($modul,$id,$column,$result_query,$column_data,$table,$custom=""){
	?>
	<div class="col-sm-12">
		<div class="panel panel-default panel-table">
			<?php if($custom<>'only_view'){ ?>
			<div class="panel-heading">
				<?php if($custom=='upload_table'){ ?>
				<form name="import" id="import" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td style="padding-left:0px;">
								<span class="btn btn-space btn-primary" href="#" data-toggle="modal" data-target="#mymodal" onclick="action('<?php echo $modul?>','add','null','<?php echo $table?>')"><i class="icon icon-left mdi mdi-plus-circle"></i> Add Data</span>
							</td>
							<td>
								<input type="file" id="myfiles" name="myfiles" />
							</td>
							<td>
								<input class="btn btn-space btn-danger" type="submit" value="Upload Data" />
							</td>
						</tr>
					</table>
				</form>
				<?php }else{ ?>
				<button class="btn btn-space btn-primary" href="#" data-toggle="modal" data-target="#mymodal" onclick="action('<?php echo $modul?>','add','null','<?php echo $table?>')"><i class="icon icon-left mdi mdi-plus-circle"></i> Add Data</button>
				<?php } ?>
			</div>
			<?php } ?>
			<div class="panel-body">
				<table id="<?php echo $id?>" class="table table-striped table-hover table-fw-widget">
					<thead>
						<tr>
							<th width="10%">No</th>
							<?php
							if(strpos($column,',') !== false){
								$column = explode(',',$column);
								foreach($column as $key => $value) {
								  ?>
									<th><?php echo trim($value)?></th>
									<?php
								}
							}else{
								?>
								<th><?php echo trim($column)?></th>
								<?php
							}
							if($custom<>'only_view'){
							?>
							<th width="20%">Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
						foreach ($result_query->result() as $row){
							$no++;
							$mod = $no%2;
							if($mod==0){
								$class = "even";
							}else{
								$class = "odd";
							}
							?>
							<tr class="<?php echo $class?> gradeA" style="font-weight:normal;">
								<td><?php echo $no?></td>
								<?php
								if(is_array($column_data)){
									$column_data = implode(',',$column_data);
								}
								if(strpos($column_data,',') !== false){
									$column_data = explode(',',$column_data);
									foreach($column_data as $key => $value) {
									  ?>
										<td><?php echo $row->$value?></td>
										<?php
									}
								}else{
									?>
									<td><?php echo $row->$column_data?></td>
									<?php
								}
								if($custom<>'only_view'){
								?>
								<td class="center">
									<button class="btn btn-space btn-warning btn-sm" href="#" data-toggle="modal" data-target="#mymodal" onclick="action('<?php echo $modul?>','edit','<?php echo $row->id?>','<?php echo $table?>')"><i class="icon icon-left mdi mdi-edit"></i> Edit</button>
									<button class="btn btn-space btn-danger btn-sm" href="#" data-toggle="modal" data-target="#mymodal" onclick="action('<?php echo $modul?>','delete','<?php echo $row->id?>','<?php echo $table?>')"><i class="icon icon-left mdi mdi-delete"></i> Delete</button>
								</td>
								<?php } ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
}
