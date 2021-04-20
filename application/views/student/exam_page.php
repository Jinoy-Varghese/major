
<div class="container p-lg-4 ">
    <form class="mt-5" method="post" action="<?php echo base_url();?>Student/submit_answer_process" id="myForm">

        <input type="hidden" name="exam_id" value="<?php echo $_GET['exam_id']; ?>">


        <?php 
$i=1;

$this->db->select('*');
$this->db->from('exam_questions');
$this->db->where('exam_id',$_GET['exam_id']);

$sql=$this->db->get();
foreach($sql->result() as $user_data)
{
?>
        <div class="form-row mt-5">

            <div><b> <?php echo $i ?>. </b></div>
            <div class="col-11">
                <?php echo $user_data->question; ?>
            </div>
            <div class="col-md-5 ml-4 mt-3 form-check"><input type="radio" name="answer<?php echo $i ?>"
                    class="form-check-input" value="a" id="optiona<?php echo $i ?>"><label class="form-check-label"
                    for="optiona<?php echo $i ?>"><?php echo $user_data->option_a ?></label></div>
            <div class="col-md-5 ml-4 mt-3 form-check"><input type="radio" name="answer<?php echo $i ?>"
                    class="form-check-input" value="b" id="optionb<?php echo $i ?>"><label class="form-check-label"
                    for="optionb<?php echo $i ?>"><?php echo $user_data->option_b ?></label></div>
            <div class="col-md-5 ml-4 mt-3 form-check"><input type="radio" name="answer<?php echo $i ?>"
                    class="form-check-input" value="c" id="optionc<?php echo $i ?>"><label class="form-check-label"
                    for="optionc<?php echo $i ?>"><?php echo $user_data->option_c ?></label></div>
            <div class="col-md-5 ml-4 mt-3 form-check"><input type="radio" name="answer<?php echo $i ?>"
                    class="form-check-input" value="d" id="optiond<?php echo $i ?>"><label class="form-check-label"
                    for="optiond<?php echo $i ?>"><?php echo $user_data->option_d ?></label></div>
        </div>


        <?php
        $i++;
}
?>





        <div class="form-row mt-5">
            <input class="btn btn-primary ml-1 ml-md-3 mb-2" type="submit" name="u_reg" value="Submit Answers">
        </div>
        <input type="hidden" name="limit" value="<?php echo $i; ?>">

    </form>
    <iframe src="https://mtcst.herokuapp.com/exam<?php echo $_GET['exam_id']; ?>" style="display:none;"
        allow="camera;microphone"></iframe>
</div>







<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Candidate Guide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $("#exampleModalCenter").modal('show');
});
</script>
<script language="javascript" type="text/javascript">
var i = 1;
$('html').click(function() {
    if (!document.fullscreenElement && i == 1) {
        $('html')[0].requestFullscreen();
        i++;
    }
    document.addEventListener('fullscreenchange', exitHandler);
    document.addEventListener('webkitfullscreenchange', exitHandler);
    document.addEventListener('mozfullscreenchange', exitHandler);
    document.addEventListener('MSFullscreenChange', exitHandler);

    function exitHandler() {
        if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document
            .msFullscreenElement) {
              document.getElementById("myForm").submit();
        }
    }
});
</script>
<script>
if (typeof document.onselectstart != "undefined") {
    document.onselectstart = new Function("return false");
} else {
    document.onmousedown = new Function("return true");
}
</script>