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


<div class="container p-lg-4 ">
    <?php 
if($this->session->flashdata('update_success')){
 echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Complaint Fixed Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($this->session->flashdata('update_failed')){
    echo '
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Failed!</strong> Something Wend wrong, please try again.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
   }
?>
    <nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Complaints</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Complaint</li>
        </ol>
    </nav>

    <table id="table" data-toolbar="#toolbar" data-search="false" data-sortable="false"
                        data-show-columns="false" data-toggle="table" data-pagination="false" class="table"
                        data-visible-search="false">
                        <thead class="table-primary">

                            <tr>
                                <th data-field="sl.no" data-sortable="true">Sl.No</th>
                                <th data-field="name" data-sortable="true">System No</th>
                                <th data-field="complaint" data-sortable="true">Complaint</th>
                                <th data-field="register_by" data-sortable="true">Register By</th>
                                <th data-field="registered_on" data-sortable="true">Register On</th>
                                <th data-field="edit">Status</th>
                            </tr>

                        </thead>
	<tbody>
	<?php 
    $sql=$this->db->get('lab_complaints');
    $sl_no=1;
	foreach($sql->result() as $complaints_data)
	{
    ?>
		<tr>
            <td><?php echo $sl_no; $sl_no++;?></td>
			<td><?php echo $complaints_data->sym_no ?></td>
			<td><?php echo $complaints_data->complaint ?></td>
            <td><?php echo $complaints_data->register_by ?></td>
            <td><?php echo date("d-m-Y",strtotime($complaints_data->registered_on)) ?></td>
            <td>
            <?php
            if($complaints_data->status==1)
            {
                echo "<b style='color:red;'>Not Fixed</b>";
            }
            else
            {
                echo "<b style='color:green;'>Fixed</b>";
            }
            ?>
            </form>
            </td>
	  	</tr>
	<?php		
	}
	?>
	</tbody>
    </table>



    </div>
