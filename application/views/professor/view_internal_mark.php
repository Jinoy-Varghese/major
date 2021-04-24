<?php
defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION['u_id']))
{
  redirect('Home/login','refresh');
}
?>
<style>
#top_nav
{
  background-color:#3c3c3c;
  height:50px;
  width:100vw;
  position:fixed;
  margin-top:-90px;"
}
@media print
{
#printpagebtn
{
    display:none;
}
}

</style>
<link href="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-4.3.1/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5.11.2/css/all.min.css'); ?>">

<script src="<?php echo base_url('assets/bootstrap-4.3.1/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/tableExport.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.plugin.autotable.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table-export.min.js'); ?>"></script>

<div class="col-12" id="top_nav">

<div class="col-md-12 text-right col-12 mt-3">
<i class="fas fa-print text-white" data-toggle="tootip" title="Print Internal Sheet" id="printpagebtn" onclick="window.print();" style="cursor:pointer;"></i>
</div>

</div>

<div class="container mt-5">
<div class="row" style="margin-top:90px;">
<div class="col-md-12 font-weight-bold text-center" style="font-size:23px;">Consolidated Statement Of Marks of Continous Evaluation(CE)</div>
<div class="col-md-12 font-weight-bold text-center" style="font-size:21px;">For First Degree Programmes under CBCS System</div>
</div>
</div>

<div class="col-md-6 font-weight-bold ml-5">College Name:-MarThoma College of Science And Technology,Ayur</div>
<div class="row ml-5">
<div class="col-md-3 font-weight-bold">College Code : 806</div>
<div class="col-md-5 font-weight-bold">Name & Code of the Programme : BSc.Computer Science(320)</div>
</div>
<div class="row ml-5">
<div class="col-md-3 font-weight-bold">Admission Year :

<?php 
$id=$_SESSION['u_id'];
$this->db->select('*');
$this->db->from('users');
$this->db->join('professor_data','professor_data.email=users.email');
$this->db->where('users.email',$id);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $dept=$user_data->dept;
}


$this->db->select('*');
$this->db->from('incharge_list');
$this->db->where('user_incharge',$_SESSION['u_id']);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
$sem=$user_data->semester;
}

$this->db->select('*');
$this->db->from('users');
$this->db->join('student_data','student_data.email=users.email');
$this->db->where('student_data.dept',$dept);
$this->db->where('s_sem',$sem);
$this->db->where('s_status',2);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $mail=$user_data->email;
}

$this->db->select('*');
$this->db->from('users');
$this->db->join('student_data','student_data.email=users.email');
$this->db->where('student_data.dept',$dept);
$this->db->where('s_sem',$sem);
$this->db->where('s_status',2);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $year[]=date('Y',strtotime($user_data->time_stamp));
}
  echo $year[0];
  echo '-';
  echo $year[0]+3;
?>

</div>
<div class="col-md-5 font-weight-bold">Month & Year of Study :June 2020-December 2020</div>
</div>
<div class="row ml-5">
<div class="col-md-3 font-weight-bold">Semester : 

<?php 
$id=$_SESSION['u_id'];
$this->db->select('*');
$this->db->from('users');
$this->db->join('professor_data','professor_data.email=users.email');
$this->db->where('users.email',$id);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $dept=$user_data->dept;
}


$this->db->select('*');
$this->db->from('incharge_list');
$this->db->where('user_incharge',$_SESSION['u_id']);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
$sem=$user_data->semester;
}

$this->db->select('DISTINCT(s_sem)');
$this->db->from('users');
$this->db->join('student_data','student_data.email=users.email');
$this->db->where('student_data.dept',$dept);
$this->db->where('s_sem',$sem);
$this->db->where('s_status',2);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
 echo strtoupper($user_data->s_sem);
}
?>

</div>
</div>  

<div class="col-md-12">
<table class="table table-bordered text-center text-nowrap mt-4" style="font-size:10px;">

<tr>
<th rowspan="3" class="align-middle">Candidate Code</th>
<th rowspan="3" class="align-middle">Name</th>
<th colspan="30">Name of Papers</th>
</tr>

<tr>
<th colspan="4">Subject 1</th>
<th colspan="4">Subject 2</th>
<th colspan="4">Subject 3</th>
<th colspan="4">Subject 4</th>
<th colspan="4">Subject 5</th>
<th colspan="5">Subject 6</th>
<th colspan="5">Subject 7</th>
</tr>

<tr>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>R</th>
<th>T</th>
<th>PPS</th>
<th>Total</th>
<th>A</th>
<th>R</th>
<th>T</th>
<th>PPS</th>
<th>Total</th>
</tr>

<tr>
<th></th>
<th></th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(20)</th>
</tr>

<?php 
$id=$_SESSION['u_id'];
$this->db->select('*');
$this->db->from('users');
$this->db->join('professor_data','professor_data.email=users.email');
$this->db->where('users.email',$id);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $dept=$user_data->dept;
}


$this->db->select('*');
$this->db->from('incharge_list');
$this->db->where('user_incharge',$_SESSION['u_id']);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
$sem=$user_data->semester;
}

$this->db->select('*');
$this->db->from('users');
$this->db->join('student_data','student_data.email=users.email');
$this->db->where('student_data.dept',$dept);
$this->db->where('s_sem',$sem);
$this->db->where('s_status',2);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
?>
<tr>
<th>32018806010</th>
<th><?php echo $user_data->name;?></th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
</tr>
<?php
}
?>


</table>
</div>



<?php 
$id=$_SESSION['u_id'];
$this->db->select('*');
$this->db->from('users');
$this->db->join('professor_data','professor_data.email=users.email');
$this->db->where('users.email',$id);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $dept=$user_data->dept;
}


$this->db->select('*');
$this->db->from('incharge_list');
$this->db->where('user_incharge',$_SESSION['u_id']);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
$sem=$user_data->semester;
}

$this->db->select('distinct(s_sem)');
$this->db->from('users');
$this->db->join('student_data','student_data.email=users.email');
$this->db->where('student_data.dept',$dept);
$this->db->where('s_sem',$sem);
$this->db->where('s_status',2);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $sem=$user_data->s_sem;
  echo $sem."<br>";
}

$this->db->select('*');
$this->db->from('subjects');
$this->db->where('sub_sem',$sem);
$sql=$this->db->get();
foreach($sql->result() as $subject)
{
  echo $subject->sub_name."<br>";
}
?>
