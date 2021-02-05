<video autoplay="true" id="videoElement"></video>
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
	width: 426px;
	height: 320px;
	background: url("https://image.freepik.com/free-vector/modern-video-player_186930-245.jpg");
    background-size:cover;
    background-repeat:no-repeat;
}
</style>