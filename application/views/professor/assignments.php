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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>

    <nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Assignments</li>
        </ol>
    </nav>




    <form class=" mt-5"  method="post"
        action="<?php echo base_url();?>hod/assign_teacher_process">

        <div class="form-row mt-5">



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

            <div class=" col-12 p-0 mt-5 ">
                <div class="col-12 col-md-12 p-0">


                    <table id="table" data-toolbar="#toolbar" data-search="false" data-sortable="false"
                        data-show-columns="false" data-toggle="table" data-pagination="false" class="table"
                        data-visible-search="false">
                        <thead class="table-primary">

                            <tr>
                                <th data-field="no." data-sortable="true">no.</th>
                                <th data-field="name" data-sortable="true">Name</th>

                                <th data-field="edit">Action</th>
                            </tr>

                        </thead>
                        <tbody id="table_body">
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
        <div class="form-row mt-4">
            <input class="btn btn-primary ml-1" type="submit" name="u_reg" value="Submit">
        </div>

    </form>
</div>
<script type="text/javascript">
$(document).ready(function() {

    $("#subject").change(function() {
        var subject = $(this).val();

        $.ajax({
            url: 'http://localhost/major/professor/view_subject_ajax',
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

    $("#semester").change(function() {
        var semester = $(this).val();
        var course = $('#course').val();

        $.ajax({
            url: 'http://localhost/major/Professor/view_students_ajax',
            type: 'post',
            data: {
                post_semester: semester,
                post_course: course
            },
            dataType: 'json',
            success: function(response) {

                var len = response.length;
                var j=1;
                $("#table_body").empty();

                for (var i = 0; i < len; i++) {
                    var name = response[i]['name'];
                    var s_id = response[i]['s_id'];

                    $("#table_body").append("<tr><td>" + j + "</td><td>" + name +
                        "</td><td class='text-center p-0' ><input type='hidden' name='limit' value='" +
                        j + "'><input type='hidden' name='sid" + j + "' value='" +
                        s_id + "'><input type='radio' name='" + j +
                        "' required value='present'> Present <input type='radio' class='ml-4' name='" +
                        j + "' required  value='absent'> Absent </td></tr>");
                        j++

                }


            }
        });
    });

});
</script>


