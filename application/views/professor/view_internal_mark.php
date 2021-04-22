<?php
defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION['u_id']))
{
  redirect('Home/login','refresh');
}
?>
<style>
@media print
{
#printpagebtn
{
    display:none;
}
}
</style>
<link href="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-4.3.1/css/bootstrap.min.css'); ?>">

<script src="<?php echo base_url('assets/bootstrap-4.3.1/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/tableExport.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/jspdf.plugin.autotable.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-table/bootstrap-table-export.min.js'); ?>"></script>

<div class="container mt-5">
<div class="row">
<div class="col-md-12 font-weight-bold text-center" style="font-size:23px;">Consolidated Statement Of Marks of Continous Evaluation(CE)</div>
<div class="col-md-12 font-weight-bold text-center" style="font-size:21px;">For First Degree Programmes under CBCS System</div>
</div>
</div>

<div class="col-md-6 font-weight-bold ml-5">College Name:-MarThoma College of Science And Technology,Ayur</div>
<div class="row ml-5">
<div class="col-md-3 font-weight-bold">College Code : 806</div>
<div class="col-md-5 font-weight-bold">Name & Code of the Programme : BSc.Computer Science(320)</div>
</div>
<div class="row ml-5">
<div class="col-md-3 font-weight-bold">Admission Year : 2018-2021</div>
<div class="col-md-5 font-weight-bold">Month & Year of Study :June 2020-December 2020</div>
</div>
<div class="row ml-5">
<div class="col-md-3 font-weight-bold">Semester : S5</div>
</div>

<div class="col-md-12 col-12 text-right">
<button class="btn btn-primary" id="printpagebtn" onclick="window.print();">Print Internal Sheet</button>
</div>

<table class="table table-bordered text-center text-nowrap mt-4" style="font-size:10px;">

<tr>
<th rowspan="3" class="align-middle">Candidate Code</th>
<th rowspan="3" class="align-middle">Name</th>
<th colspan="30">Name of Papers</th>
</tr>

<tr>
<th colspan="4">Subject 1</th>
<th colspan="4">Subject 2</th>
<th colspan="4">Subject 3</th>
<th colspan="4">Subject 4</th>
<th colspan="4">Subject 5</th>
<th colspan="5">Subject 6</th>
<th colspan="5">Subject 7</th>
</tr>

<tr>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>Assig</th>
<th>T</th>
<th>Total</th>
<th>A</th>
<th>R</th>
<th>T</th>
<th>PPS</th>
<th>Total</th>
<th>A</th>
<th>R</th>
<th>T</th>
<th>PPS</th>
<th>Total</th>
</tr>

<tr>
<th></th>
<th></th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(10)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(20)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(5)</th>
<th>(20)</th>
</tr>

<tr>
<th>32018806010</th>
<th>Arun Ayyappan</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
</tr>

<tr>
<th>32018806016</th>
<th>Devadathan R</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
</tr>

<tr>
<th>32018806017</th>
<th>Febin Mathew</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
</tr>

<tr>
<th>32018806023</th>
<th>Jinoy Varghese</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>10</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>5</th>
<th>20</th>
</tr>



</table>