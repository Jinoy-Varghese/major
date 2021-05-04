<div class="container p-lg-4 ">

<?php
defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION['u_id']))
{
  redirect('Home/login','refresh');
}
if($this->session->flashdata('insert_success')){
    echo '
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> Assignment submitted successfully.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
   }
?>

<link href="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/bootstrap-table/jspdf.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-table/jspdf.plugin.autotable.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table-export.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>

    <nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Assignments</li>
            <li class="breadcrumb-item active" aria-current="page">Add Assignment</li>
        </ol>
    </nav>

    <form class=" mt-5" method="post" action="<?php echo base_url();?>Professor/mark_assignment">

<div class="form-row mt-5">



    <div class="col-md-3 mb-3">
        <label for="validationCustom07">Course</label>

        <select class="custom-select" id="course" required name="course">
            <option selected disabled value="">Choose...</option>
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


    $this->db->select('DISTINCT(sub_course)');
    $this->db->from('subject_assigned');
    $this->db->where('teacher_id',$_SESSION['u_id']);
    $sql=$this->db->get();
    foreach($sql->result() as $subject_data)
    {
    echo "<option value='$subject_data->sub_course'>$subject_data->sub_course</option>";
    }
    ?>
        </select>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            Please enter a course.
        </div>
    </div>


    <div class="col-md-3 mb-3">
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

    <div class="col-md-3 mb-3">
        <label for="validationCustom05">Semester</label>

        <select class="custom-select" id="semester" required name="semester">
            <option selected disabled value="">Choose...</option>






        </select>

    </div>


    <div class="col-md-3 mb-3">
        <label for="validationCustom05">Semester</label>

        <select class="custom-select" id="semester" required name="semester">
            <option selected disabled value="">Choose...</option>






        </select>

    </div>

</div>
<div class="form-row mt-4">
    <input class="btn btn-primary ml-1" type="submit" name="u_reg" value="Submit">
</div>

</form>

</div>    