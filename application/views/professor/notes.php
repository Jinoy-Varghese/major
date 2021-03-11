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
<div class="col-md-3"></div>
<div class="col-md-3 col-sm-12 mt-5 ml-md-n5 border border-primary">sdf</div>
</div>

<div class="row">

<div class="col-12 pt-5"></div><div class="col-12 pt-5"></div>
<div class="col-md-2 col-5 ml-md-5 border border-dark" style="height:150px;">1</div>
<div class="col-md-2 col-5 ml-md-4 ml-5 border border-dark" style="height:150px;">2</div>
<div class="col-md-2 col-5 ml-md-4 mt-md-0 mt-5 border border-dark" style="height:150px;">3</div>
<div class="col-md-2 col-5 ml-md-4 ml-5 mt-md-0 mt-5 border border-dark" style="height:150px;">4</div>
<div class="col-md-2 col-5 ml-md-4 mt-5 mt-md-0 border border-dark" style="height:150px;">5</div>

<div class="col-md-2 col-5 ml-md-5 ml-5 mt-5 border border-dark" style="height:150px;">1</div>
<div class="col-md-2 col-5 ml-md-4 mt-5 border border-dark" style="height:150px;">2</div>
<div class="col-md-2 col-5 ml-md-4 mt-md-5 mt-5 ml-5 border border-dark" style="height:150px;">3</div>
<div class="col-md-2 col-5 ml-md-4 mt-5 border border-dark" style="height:150px;">4</div>
<div class="col-md-2 col-5 ml-md-4 mt-md-5 mt-5 ml-5 border border-dark" style="height:150px;">5</div>

</div>
</div>

<div class="col-md-12 mt-5"></div>