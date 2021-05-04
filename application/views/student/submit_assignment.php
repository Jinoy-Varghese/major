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
<style>
.file_border
{
    height:45vh;
    border:2px solid #3c3c3c;
    position:relative;
}
.file_1
{
    margin:0;
    position:absolute;
    top:55%;
    left:50%;
    transform:translate(-50%,-50%);
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
<div class="container" class="col-md-12"><br>

    <nav aria-label="breadcrumb mt-sm-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignment</li>
        </ol>
    </nav>

    <form method="post" action="<?php echo base_url();?>Student/upload_assignment" enctype="multipart/form-data">
    <div class="form-row mt-5 ml-5">
        <div class="col-md-3 col-12 mt-4 file_border">
        
    <div class="col-12 text-center file_1"><i class="fas fa-cloud-upload-alt" style="font-size:50px;"></i>
    <p>Upload the File Here</p><br>
    <label for="select_img" class="btn btn-primary mt-n5">Choose File</label>
    <input type="file" class="custom-file-input" name="image" id="select_img">
    </div>

        </div>

            <div class="col-md-8 mb-3 ml-5">
                <label for="validationCustom04">Subject</label>
                    <select class="custom-select" id="subject" name="subject" required>
                        <option selected disabled value="">Choose...</option>
                        <?php 
                            $id=$_SESSION['u_id'];
                            $this->db->select('*');
                            $this->db->from('users');
                            $this->db->join('student_data','student_data.email=users.email');
                            $this->db->where('users.email',$id);
                            $sql=$this->db->get();
                            foreach($sql->result() as $user_data)
                            {
                              $sem=substr($user_data->s_sem,1);
                            }

                            $this->db->select('*');
                            $this->db->from('subjects');
                            $this->db->where('sub_sem',$sem);
                            $this->db->where('is_lab','theory');
                            $sql=$this->db->get();
                            foreach($sql->result() as $user_data)
                            {
                                $subject=$user_data->sub_name;
                                ?>
                                <option value="<?php echo $subject;?>"><?php echo $subject;?></option>
                                <?php
                            }
                        ?>
                        
                    </select>
                    <div class="invalid-feedback">
                        Please select the Subject.
                    </div>

                <div class="col-md-14 mt-3">
                <label for="validationCustom05">Submitted To</label>

                <select class="custom-select" id="assign_professor" required name="assign_professor">
                    <option selected disabled value="">Choose...</option>




                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please enter a course.
                </div>
            </div>

                <div class="col-md-14 mt-3">
                <div class="form-floating">
                <label for="validationCustom02">Description</label>
                    <textarea class="form-control" name="desc" id="validationCustom02" placeholder="Description(Optional)" style="height: 100px" required></textarea>    
                    <div class="invalid-feedback">
                    Please Leave the complaint.
                </div>
                </div>
                <div class="sub_btn"><input class="btn btn-primary mt-4" type="submit" name="assign_btn" value="Upload Assignment" style="width:700px;"></div>
            </div>
            </div>
        </div>
</div>
</form>

<script type="text/javascript">
$(document).ready(function() {

    $("#subject").change(function() {
        var subject = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>/student/view_subject_ajax',
            type: 'post',
            data: {
                post_subject: subject
            },
            dataType: 'json',
            success: function(response) {

                var len = response.length;

                $("#assign_professor").empty();
                $("#assign_professor").append(
                    "<option disabled value='select' selected>--Select--</option>");
                for (var i = 0; i < len; i++) {
                    var name = response[i]['name'];

                    $("#assign_professor").append("<option value='" + name + "'>" + name +
                        "</option>");

                }
            }
        });
    });



});
</script>