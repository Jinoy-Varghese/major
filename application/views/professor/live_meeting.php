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


<div class="row mt-5">
  <div class="vid-out mt-md-5 col-md-5">
    <video autoplay="true" id="videoElement" class=" col-md-11 mt-md-4 pl-2 pr-2 shadow" ></video>
  </div>
  <div class="col-md-6 mt-md-5 pt-5">
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium ratione libero obcaecati nulla fugiat, hic officia, ab enim molestias quod possimus voluptatem distinctio, earum iusto sed quis exercitationem iure ipsam?
   <?php
   $sql=$this->db->select('meet_status')->from('professor_data')->where('email',$_SESSION['u_id'])->get();
   foreach($sql->result() as $value)
	{
    $status=$value->meet_status;
  }
  if($status==1)
  {
    ?>

    <div class="mt-4">
      <a href="start_meeting" class="btn btn-primary text-light shadow">Rejoin Meeting</a>
      <a href="leave_meeting" class="btn btn-danger text-light shadow">Stop Meeting</a>
    </div>
  <?php 
  }
  else
  {
  ?>

    <div class="mt-4">
      <a href="start_meeting" class="btn btn-primary text-light shadow">Start Meeting</a>
    </div>

  <?php 
   }
  ?>


  </div>
</div>


<!-- added live preview with details-->




<script>
var video = document.querySelector("#videoElement");

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}
</script>
<style>
#videoElement
{


    height: 250px;
    padding:0;
    border:1px solid blue;
/*
  	background: url("<?php echo base_url("assets/image/video-thumb1.jpg");?>");
    background-size:contain;
    background-repeat:no-repeat;
    */
}

</style>