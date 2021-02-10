<div class="row mt-5">
  <div class="vid-out mt-md-5 col-md-5">
    <video autoplay="true" id="videoElement" class=" col-md-11 mt-md-4 pl-2 pr-2 shadow" ></video>
  </div>
  <div class="col-md-6 mt-md-5 pt-5">
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium ratione libero obcaecati nulla fugiat, hic officia, ab enim molestias quod possimus voluptatem distinctio, earum iusto sed quis exercitationem iure ipsam?
    <div class="mt-4">
    <a href="https://desolate-dusk-05767.herokuapp.com/<?php echo $_SESSION["u_id"] ?>" class="btn btn-primary text-light shadow">Start Meeting</a>
    </div>
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