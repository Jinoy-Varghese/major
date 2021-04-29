<div class="container p-lg-4 ">

<?php 
if($this->session->flashdata('insert_success')){
 echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> New record created.
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
    <nav aria-label="breadcrumb mt-sm-5">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Add incharge</a></li>
    </ol>
    </nav>






<form class="needs-validation mt-5" novalidate method="post" action="<?php echo base_url();?>hod/change_incharge_process">

<div class="form-row mt-5">
            
            

                <div class="col-md-4 mb-3">
                <label for="validationCustom06">Course</label>

            <select class="custom-select" id="validationCustom08" required name="course">
            <option selected disabled value="">Choose...</option>
            <?php 

            $id=$_SESSION['u_id'];
            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('hod_data','hod_data.email=users.email');
            $this->db->where('users.email',$id);
            $sql=$this->db->get();
            foreach($sql->result() as $user_data)
            {
            $dept=$user_data->dept;
            }


            $this->db->distinct();
            $this->db->select('course_name');
            $this->db->from('course_list');
            $this->db->where('department',$dept);
            $sql=$this->db->get();
            foreach($sql->result() as $course_data)
            {
            echo "<option value='$course_data->course_name'>$course_data->course_name</option>";
            }
            ?>
            </select>
            <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a Semester.
                </div>
            </div>

            
                <div class="col-md-4 mb-3">
                <label for="validationCustom05">Semester</label>
       
                    <select class="custom-select" id="validationCustom05" required name="semester">
                    <option selected disabled value="">Choose...</option>
                    <option value="s1">s1</option>
                    <option value="s2">s2</option>
                    <option value="s3">s3</option>
                    <option value="s4">s4</option>
                    <option value="s5">s5</option>
                    <option value="s6">s6</option>
                    </select>
                    <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a Semester.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom06">incharge_list</label>

            <select class="custom-select" id="validationCustom06" required name="incharge_list">
            <option selected disabled value="">Choose...</option>
            <?php 

$id=$_SESSION['u_id'];
$this->db->select('*');
$this->db->from('users');
$this->db->join('hod_data','hod_data.email=users.email');
$this->db->where('users.email',$id);
$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
$dept=$user_data->dept;
}



            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('professor_data','professor_data.email=users.email');
            $this->db->where('professor_data.dept',$dept);
            $sql=$this->db->get();
            foreach($sql->result() as $user_data)
            {
            echo "<option value='$user_data->email'>$user_data->name</option>";
            }
            ?>
            </select>
            <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a Semester.
                </div>
            </div>
            </div>
            <div class="form-row">
            <input class="btn btn-primary ml-1" type="submit" name="u_reg" value="Submit form">
            </div>

    </form>
</div>
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
