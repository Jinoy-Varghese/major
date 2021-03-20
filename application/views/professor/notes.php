<?php
defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION['u_id']))
{
  redirect('Home/login','refresh');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-4"></div>
        <div class="col-md-2 col-sm-12 mt-5 "><a href="add_notes_page" class="btn btn-primary text-light float-right w-100 mr-md-1 pt-2 pb-2" style="cursor:pointer">Add Notes</a></div>
    </div>

    <div class="row p-0 mt-4 mt-md-5">

        <div class="col-md-3 col-6"><div class="border border-dark m-2" style="height:180px;">1</div></div>
        <div class="col-md-3 col-6"><div class="border border-dark m-2" style="height:180px;">1</div></div>
        <div class="col-md-3 col-6"><div class="border border-dark m-2" style="height:180px;">1</div></div>
        <div class="col-md-3 col-6"><div class="border border-dark m-2" style="height:180px;">1</div></div>
        <div class="col-md-3 col-6"><div class="border border-dark m-2" style="height:180px;">1</div></div>



        

    </div>
</div>

<div class="col-md-12 mt-5"></div>