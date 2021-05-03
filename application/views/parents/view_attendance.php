<?php
defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION['u_id']))
{
  redirect('Home/login','refresh');
}
?>
<link href="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">

<script src="<?php echo base_url('assets/bootstrap-table/tableExport.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.plugin.autotable.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table-export.min.js'); ?>"></script>


<div class="container p-lg-4">
    <nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">My Student Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Attendance</li>
        </ol>
    </nav>



<?php 
$id=$_SESSION['u_id'];
$this->db->select('*');
$this->db->from('users');
$this->db->join('parent_data','parent_data.email=users.email');
$this->db->where('users.email',$id);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $s_mail=$user_data->s_mail;
}

$this->db->select('*');
$this->db->from('student_data');
$this->db->where('email',$s_mail);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
  $s_id=$user_data->student_id;
  $s_sem=$user_data->s_sem;
}

$this->db->select('*');
$this->db->from('attendance');
$this->db->where('s_id',$s_id);
$sql=$this->db->get();
$slno=1;
foreach($sql->result() as $user_data)
{
  $s_attendance=$user_data->s_attendance;
}

$con = mysqli_connect("localhost", "root", "", "college_management");
$query2="SELECT COUNT(s_attendance) as total FROM attendance WHERE s_id='$s_id' AND s_attendance='present'";
$sql2=mysqli_query($con,$query2);
$result2=mysqli_fetch_assoc($sql2);
$result2['total'];


$query4="SELECT s_id,s_sem,count(*) as occur from attendance group by s_id,s_sem having count(*)=(SELECT COUNT(*) as occur from attendance group by s_id,s_sem order by occur desc limit 1)";
$sql4=mysqli_query($con,$query4);
$result4=mysqli_fetch_assoc($sql4);
$result4['occur']."<br>";

$present=$result2['total'];
$total=$result4['occur'];
$total_attendance=round(($present*5)/$total);
echo $total_attendance;
?>
</tbody>
<table>

</div>    
