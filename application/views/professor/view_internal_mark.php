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
  background-color:black;
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
<div class="col-md-5 font-weight-bold">Name & Code of the Programme : 
<?php
$this->db->select('dept');
$this->db->from('professor_data');
$this->db->where('email',$_SESSION['u_id']);
$sql=$this->db->get();
foreach($sql->result() as $department)
{
  echo "BSc.".$department->dept."(320)";
}
?>
</div>
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
<div class="col-md-5 font-weight-bold">Month & Year of Study :

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
  $month_year[]=date('M Y',strtotime($user_data->time_stamp));

}
echo $month_year[0];
echo "-";
?>

</div>
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
<table class="table table-bordered text-center text-nowrap mt-4" style="font-size:10px; width:100%;">

<tr>
<th rowspan="3" class="align-middle">Candidate Code</th>
<th rowspan="3" class="align-middle">Name</th>
<th colspan="30">Name of Papers</th>
</tr>

<tr>
<?php 
$id=$_SESSION['u_id'];
$this->db->select('*');
$this->db->from('incharge_list');
$this->db->where('user_incharge',$id);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $s_sem=$user_data->semester;
  $s_course=$user_data->course;
}
$s_sem=substr($s_sem,1);
$total_subject=0;
$total_theory=0;
$total_lab=0;

$this->db->select('*');
$this->db->from('subjects');
$this->db->where('sub_sem',$s_sem);
$this->db->where('is_lab','theory');
$sql=$this->db->where('sub_course',$s_course)->get();
foreach($sql->result() as $user_data)
{
  echo '<th colspan="4">'.$user_data->sub_name.'</th>';
  $total_subject++;
  $total_theory++;
}
$this->db->select('*');
$this->db->from('subjects');
$this->db->where('sub_sem',$s_sem);
$this->db->where('is_lab','lab');
$sql=$this->db->where('sub_course',$s_course)->get();
foreach($sql->result() as $user_data)
{
  echo '<th colspan="5">'.$user_data->sub_name.'</th>';
  $total_subject++;
  $total_lab++;
}

?>
</tr>
<tr>



<?php 
  for($i=0;$i<$total_theory;$i++)
  {
?>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<?php
  }
for($i=0;$i<$total_lab;$i++)
  {
?>
<th>A</th>
<th>R</th>
<th>T</th>
<th>PPS</th>
<th>Total</th>
<?php
  }
?>




</tr>

<tr>
<th></th>
<th></th>


<?php 
  for($i=0;$i<$total_theory;$i++)
  {
?>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<?php
  }
for($i=0;$i<$total_lab;$i++)
  {
?>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(20)</th>
<?php
  }
?>

</tr>


<?php
      $s_sem='s'.$s_sem;
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('student_data','student_data.email=users.email');
      $this->db->where('s_course',$s_course);
      $this->db->where('s_sem',$s_sem);
      $this->db->where('s_status','2');
      $this->db->order_by('name','ASC');
      $sql=$this->db->get();
      foreach($sql->result() as $user_data)
      {
        $s_id=$user_data->id;

?>
<tr>



<th><?php echo $s_id; ?></th>
<th><?php echo $user_data->name; ?></th>

<?php 
for($i=0;$i<$total_theory;$i++)
  {
?>


<th>
    <?php
      //attendance
      $this->db->select('*');
      $this->db->from('subject_attendance');
      $this->db->where('s_id',$s_id);
      $this->db->where('s_attendance','present');
      $sql2=$this->db->get();
      echo $total_present=$sql2->num_rows();

    ?>
</th>
<th>5</th>
<th>10</th>
<th>20</th>
<?php
  }

for($i=0;$i<$total_lab;$i++)
  {
?>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<?php
  }
?>




</tr>

<?php
      }
?>


</table>
</div>
