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
<link href="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">

<script src="<?php echo base_url('assets/bootstrap-table/tableExport.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.plugin.autotable.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table-export.min.js'); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <nav aria-label="breadcrumb mt-sm-5">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Assignments</li>
    </ol>
    </nav>




<form class="needs-validation mt-5" novalidate method="post" action="<?php echo base_url();?>hod/assign_teacher_process">

<div class="form-row mt-5">
            
            

                <div class="col-md-4 mb-3">
                <label for="validationCustom06">Course</label>

            <select class="custom-select" id="validationCustom08" required name="course">
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
            <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a Subject.
                </div>
            </div>
            
                <div class="col-md-4 mb-3">
                <label for="validationCustom05">Semester</label>
       
                    <select class="custom-select" id="semester" required name="semester">
                    <option selected disabled value="">Choose...</option>






                    </select>
                    <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a Semester.
                </div>
            </div>

            <div class=" col-12 p-0 mt-5 ">
                <div class="col-12 col-md-12 p-0">
                    <div id="toolbar">
                            <select class="form-control">
                                <option value="all">Export All</option>
                                <option value="selected">Export Selected</option>
                            </select>
                    </div>
        
    <table id="table"
    data-show-export="true"
    data-toolbar="#toolbar"
    data-search="true"
    data-sortable="true"
    data-show-columns="true"
    data-toggle="table" 
    data-pagination="true"
    class="table"
    data-visible-search="true"
    >
  <thead class="table-primary">
  
		<tr>
			<th data-field="state" data-checkbox="true"></th>
            <th data-field="no." data-sortable="true">no.</th>
			<th data-field="name" data-sortable="true">Name</th>

      <th data-field="edit">Action</th>
		</tr>
    
  </thead>
	<tbody>
  
  <?php  
  $id=$_SESSION['u_id'];
  $sql2=$this->db->select('*')->from('incharge_list')->where('user_incharge',$id)->limit(1)->order_by('timestamp','desc')->get();
	foreach($sql2->result() as $incharge)
	{
    $sem_charge=$incharge->semester;
  }
  $this->db->select('*');
  $this->db->from('incharge_list');
  $this->db->where('user_incharge',$id);
  $sql3=$this->db->get();
  foreach($sql3->result() as $user_data)
  {
    $sem=$user_data->semester;
    $u_dept=$user_data->incharge_dept;
  }


	$sql=$this->db->select('*')->from('student_data')->where('s_status',2)->where('s_sem',$sem_charge)->where('dept',$u_dept)->join('users','users.email=student_data.email')->get();
    $i=1;
	foreach($sql->result() as $student)
	{
      
    ?>
		<tr>
			<td class="bs-checkbox"><input data-index="<?php echo $student->student_id ?>" name="btSelectItem" type="checkbox"></td>
            <td><?php echo $i; ?></td>
			<td><?php echo $student->name; ?></td>

      <td class="text-center p-0" >
        <input type="hidden" name="limit" value="<?php echo $i; ?>">
        <input type="hidden" name="sid<?php echo $i; ?>" value="<?php echo $student->student_id; ?>">
        <input type="radio" name="<?php echo $i ?>" required value="present"> Present <input type="radio" class="ml-4" name="<?php echo $i ?>" required  value="absent"> Absent 
      </td>
	  	</tr>
    <?php
     $i=$i+1; 		
	}
	?>

	</tbody>
</table>
                    


                </div>
            </div>
           

            
            </div>
            <div class="form-row">
            <input class="btn btn-primary ml-1" type="submit" name="u_reg" value="Submit">
            </div>

    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){

$("#subject").change(function(){
    var subject = $(this).val();

    $.ajax({
        url: 'http://localhost/major/professor/view_subject_ajax',
        type: 'post',
        data: {post_subject:subject},
        dataType: 'json',
        success:function(response){
          
            var len = response.length;
            
            $("#semester").empty();
            $("#semester").append("<option disabled value='select' selected>--Select--</option>");
            for( var i = 0; i<len; i++){
                var sem = response[i]['sem'];
                
                $("#semester").append("<option value='s"+sem+"'>"+sem+"</option>");

            }
        }
    });
});

$("#semester").change(function(){
    var subject = $(this).val();

    $.ajax({
        url: 'http://localhost/major/professor/view_students_ajax',
        type: 'post',
        data: {post_subject:subject},
        dataType: 'json',
        success:function(response){
          
            var len = response.length;
            
            $("#semester").empty();
            for( var i = 0; i<len; i++){
                var sem = response[i]['sem'];
                
                $("#semester").append("<option value='s"+sem+"'>"+sem+"</option>");

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

var $table = $('#table')

  $(function() {
    $('#toolbar').find('select').change(function () {
      $table.bootstrapTable('destroy').bootstrapTable({
        exportDataType: $(this).val(),
        exportTypes: ['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf'],
        columns: [
          {
            field: 'state',
            checkbox: true,
            visible: $(this).val() === 'selected'
          }
        ]
      })
    }).trigger('change')
  })
  
</script>
