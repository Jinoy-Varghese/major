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


<table class="text-center" data-toolbar="#toolbar" data-toggle="table" class="table" data-visible-search="true">
                        <thead class="table-primary">

                            <tr>
                                <th data-field="sl.no" data-sortable="true">Sl.No</th>
                                <th data-field="name" data-sortable="true">Date</th>
                                <th data-field="complaint" data-sortable="true">Presnt/Absent</th>
                            </tr>
                        </thead>
                        <tbody>


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
}

$this->db->select('*');
$this->db->from('attendance');
$this->db->where('s_id',$s_id);
$sql=$this->db->get();
$slno=1;
foreach($sql->result() as $user_data)
{
  $s_attendance=$user_data->s_attendance;
?>
<tr>
<td><?php echo $slno++;?></td>
<td><?php echo date('d-m-Y',strtotime($user_data->timestamp));?></td>
<td><?php echo $user_data->s_attendance;?></td>
</tr>
<?php  
}
?>
</tbody>
<table>




</div>    

