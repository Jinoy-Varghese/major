<div class="container p-lg-4 ">

    <?php 
if($this->session->flashdata('insert_success')){
 echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Fees updated successfully.
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

    <nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Update Fees</li>
        </ol>
    </nav>




    <form class=" mt-5" method="post" action="<?php echo base_url();?>office/offline_fee_process">

        <div class="form-row mt-5">



            <div class="col-md-4 mb-3">
                <label for="validationCustom07">Course</label>

                <select class="custom-select" id="course" required name="course">
                    <option selected disabled value="">Choose...</option>
                    <?php 

            $id=$_SESSION['u_id'];
            $this->db->select('*');
            $this->db->from('course_list');
            $sql=$this->db->get();
            foreach($sql->result() as $user_data)
            {
        
            echo "<option value='$user_data->course_name'>$user_data->course_name</option>";
            
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
                <label for="validationCustom05">Semester</label>

                <select class="custom-select" id="semester" required name="semester">
                    <option selected disabled value="">Choose...</option>




                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a course.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Fee Amount</label>

                <input type="number" class="form-control" id="validationCustom02" value="" name="fees" required>

                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a course.
                </div>
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

    $("#course").change(function() {
        var course = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>/office/view_sem_num',
            type: 'post',
            data: {
                post_course: course
            },
            dataType: 'json',
            success: function(response) {

                var len = response.length;

                $("#semester").empty();
                $("#semester").append(
                    "<option disabled value='select' selected>--Select--</option>");
                var sem_num = response[0]['sem_num'];
                var j = 1;
                for (var i = 0; i < sem_num; i++) {

                    $("#semester").append("<option value='s" + j + "'>" + j +
                        "</option>");
                    j++;

                }
            }
        });
    });


    $("#semester").change(function() {
        var semester = $(this).val();
        var course = $('#course').val();

        $.ajax({
            url: '<?php echo base_url(); ?>/office/view_students_ajax',
            type: 'post',
            data: {
                post_semester: semester,
                post_course: course
            },
            dataType: 'json',
            success: function(response) {

                var len = response.length;
                var j = 1;
                $("#table_body").empty();

                for (var i = 0; i < len; i++) {
                    var name = response[i]['name'];
                    var s_id = response[i]['s_id'];

                    $("#table_body").append("<tr><td>" + j + "</td><td>" + name +
                        "</td><td class=' p-0' ><input type='hidden' name='limit' value='" +
                        j + "'><div class='form-row col-12'><input type='hidden' name='sid" + j + "' value='" +
                        s_id + "'><div class='col-12 text-center'><input type='button' name='v"+j+"' required value='Paid' class='form-control'> </div></div></td></tr>");
                    j++;

                }


            }
        });
    });

});
</script>
