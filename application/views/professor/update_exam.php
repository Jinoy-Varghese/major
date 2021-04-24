<div class="container p-lg-4 ">

    <?php 
if($this->session->flashdata('insert_success')){
 echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> New exam created.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($this->session->flashdata('insert_failed')){
    echo '
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Failed!</strong> Something Wend wrong, please try again.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
   }


?>



    <style>

    </style>


    <link href="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/bootstrap-table/jspdf.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-table/jspdf.plugin.autotable.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table-export.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <?php 
	$this->db->select('DISTINCT(exam_id),scheduled_date');
    $this->db->from('exam_questions');
    $exam_id=$_GET['exam_id'];
    $this->db->where('exam_id',$exam_id);
    $sql=$this->db->get();
	foreach($sql->result() as $exam)
	{
    ?>

    <nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="#">Update Exam</a></li>
        </ol>
    </nav>
    <form class="needs-validation mt-12" novalidate method="post" action="<?php echo base_url();?>Professor/edit_exam">
        <div class="form-row">
            <div class="col-md-12 mb-3">

                <label for="validationCustom01">Exam Id</label>
                <input type="text" class="form-control" id="validationCustom01" name="exam_id" required
                    value="<?php echo $exam->exam_id; ?>" disabled>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please provide a Exam Id
                </div>
            </div>

            <div class="col-md-4 mb-3">
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


            <div class="col-md-4 mb-3">
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

            <div class="col-md-4 mb-3">
                <label for="validationCustom05">Semester</label>

                <select class="custom-select" id="semester" required name="semester">
                    <option selected disabled value="">Choose...</option>






                </select>

            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Scheduled Date</label>
                <input type="date" class="form-control" required name="scheduled_date"
                    value="<?php echo strftime('%y-%m-%d',strtotime($exam->scheduled_date)); ?>">
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Count Down Time</label>
                <input type="time" class="form-control" step="any" name="time">
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Last Date and Time</label>
                <input required type="datetime-local" class="form-control" name="last_date"
                   >
            </div>



            <?php } ?>


            <div class="form-row mt-4">
                <a href="<?php echo base_url()?>Professor/edit_exam/<?php echo $exam->exam_id;?>"><input type="submit" name="complaint_btn" class="btn btn-primary" value="Update"></a>
            </div>

    </form>
</div>
<script type="text/javascript">
$(document).ready(function() {

    $("#subject").change(function() {
        var subject = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>/professor/view_subject_ajax',
            type: 'post',
            data: {
                post_subject: subject
            },
            dataType: 'json',
            success: function(response) {

                var len = response.length;

                $("#semester").empty();
                $("#semester").append(
                    "<option disabled value='select' selected>--Select--</option>");
                for (var i = 0; i < len; i++) {
                    var sem = response[i]['sem'];

                    $("#semester").append("<option value='" + sem + "'>" + sem +
                        "</option>");

                }
            }
        });
    });



});
</script>

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