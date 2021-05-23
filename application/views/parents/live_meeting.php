<?php 
if($this->session->flashdata('meeting_over')){
 echo '
<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
  <strong>Success!</strong>  The meeting has been ended.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
 
 
?>
<style>
.custom-button
{

  color:#007BFF;
  text-decoration:none;

}
.custom-button:hover
{
  color:white;
  background:#007BFF;
  cursor:pointer;
}

</style>

<div class="row mt-5">
    <div class="vid-out mt-md-5 col-md-5">
        <video autoplay="true" id="videoElement" class=" col-md-11 mt-md-4 pl-2 pr-2 shadow"></video>
    </div>




        
   <?php
    $id=$_SESSION['u_id'];
    $this->db->select('*');
    $this->db->from('parent_data');
    $this->db->join('student_data','student_data.email=parent_data.s_mail');
    $this->db->where('parent_data.email',$id);
    $sql=$this->db->get();
    foreach($sql->result() as $user_data)
    {
      $dept=$user_data->dept;
      $sem=$user_data->s_sem;
    }



    $this->db->select('*');
    $this->db->from('incharge_list');
    $this->db->where('incharge_dept',$dept);
    $this->db->where('semester',$sem);
    $sql=$this->db->get();
    foreach($sql->result() as $user_data)
    {
      $incharge_id=$user_data->user_incharge;
    }

   $sql=$this->db->select('*')->from('meeting_data')->where('meet_by',$incharge_id)->get();
   foreach($sql->result() as $value)
    {
      $status=$value->meet_status;
    }
    if($status==1)
    {
   ?>

    <div class="mt-4">
      <a href="https://mtcst.herokuapp.com/<?php echo md5($incharge_id); ?>" class="btn btn-primary text-light shadow">Join Meeting</a>
    </div>
  <?php 
  }
  else
  {
  ?>

    <div class="mt-4">
      Meeting didn't started by the host.
    </div>

  <?php 
   }
  ?>
 
 </div>


 <!--  added live preview with details
      meeting progress added
 -->




 <script>
 var video = document.querySelector("#videoElement");

 if (navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then(function(stream) {
            video.srcObject = stream;
        })
        .catch(function(err0r) {
            console.log("Something went wrong!");
        });
}
</script>
<style>
#videoElement {


    height: 250px;
    padding: 0;
    border: 1px solid blue;
    /*
  	background: url("<?php echo base_url("assets/image/video-thumb1.jpg");?>");
    background-size:contain;
    background-repeat:no-repeat;
    */
}
</style>
