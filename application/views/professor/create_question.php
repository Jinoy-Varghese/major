<?php

//echo $_GET['semester'].$_GET['course'].$_GET['subject'].$_GET['question_no'];

?>
<div class="container p-lg-4 ">
<form class=" mt-5" method="get" action="<?php echo base_url();?>Professor/create_question_process">

    <div class="form-row mt-5">



 
        
        <div class="mt-2 h5"> 1. </div>
        <div class="col-11">
            <input required type="text" class="col-12 form-control" placeholder="Enter your question">
        </div>
        <div class="col-md-5 ml-4 mt-3"><input required type="text" name="optiona1" class="form-control" placeholder="Option 1"></div>
        <div class="col-md-5 ml-4 mt-3"><input required type="text" name="optionb1" class="form-control" placeholder="Option 2"></div>
        <div class="col-md-5 ml-4 mt-3"><input required type="text" name="optionc1" class="form-control" placeholder="Option 3"></div>
        <div class="col-md-5 ml-4 mt-3"><input required type="text" name="optiond1" class="form-control" placeholder="Option 4"></div>

        <div class="mt-5 h5 ml-md-4"> Choose the correct answer : </div>
        <div class="col-md-3 mt-md-5">
            <select required type="text" class="col-12 form-control" style="height:35px;">
                <option disabled selected>select</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
            </select>
        </div>
    </div>
    <div class="form-row mt-4">
        <input class="btn btn-primary ml-1" type="submit" name="u_reg" value="Next">
    </div>

</form>
</div>
