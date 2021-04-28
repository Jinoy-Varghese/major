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
if($this->session->flashdata('registered_success')){
 echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> New Complaint Registered.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($this->session->flashdata('registration_failed')){
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
            <li class="breadcrumb-item"><a href="#">Offline Mark</a></li>
    </nav>
    <form class="needs-validation mt-5" novalidate method="post"
        action="<?php echo base_url();?>Professor/offline_mark_process">
        <div class="form-row">
     
            <div class="col-md-6 col-6 mb-3">
                <label for="validationCustom01">Student Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="s_name" required>
                <div class="invalid-feedback">
                    Please provide student name
                </div>
            </div>

            <div class="col-md-6 col-6 mb-3">
          
                <label for="validationCustom06">Subject</label>

                <select class="custom-select" id="subject" required name="subject">
                    <option selected disabled value="select">Choose...</option>
                    <?php 

            $this->db->select('DISTINCT(subject)');
            $this->db->from('subject_assigned');
            $this->db->where('teacher_id',$_SESSION['u_id']);
            $sql=$this->db->get();
            foreach($sql->result() as $user_data)
            {
            echo "<option value='$user_data->subject'>$user_data->subject</option>";
            }
            ?>
                </select>

            </div>
            <div class="col-md-6 col-6 mb-3">
          
            
                <label for="validationCustom05">Semester</label>

                <select class="custom-select" id="semester" required name="semester">
                    <option selected disabled value="">Choose...</option>
                </select>
      
            </div>
            <div class="col-md-6 col-6 mb-3">
                <label for="validationCustom01">Mark</label>
                <input type="text" class="form-control" id="validationCustom01" name="mark" required>
                <div class="invalid-feedback">
                    Please provide mark
                </div>
            </div>
            </div>
            <input class="btn btn-primary" type="submit" name="complaint_reg" value="Submit">
    </form>
    
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>