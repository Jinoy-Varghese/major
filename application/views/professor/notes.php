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

    <?php
    $sql1=$this->db->get_where('users',array('email'=>$_SESSION["u_id"]));
    foreach($sql1->result() as $user_name)
    {
        $note_by=$user_name->name;
    }
    $this->db->select('*');
    $this->db->from('notes');
    $this->db->where('note_by',$note_by);
    $sql=$this->db->get();
    $i=1;
    foreach($sql->result() as $note_data)
    {
    $date=date("d-m-Y",strtotime($note_data->note_date));
?>
    <div class="col-md-3 col-6">
    <div class="border border-dark m-md-2 rounded" style="">
    <div class="col-12 border rounded" style="height:120px; background-image:url(<?php echo base_url();?>/assets/image/pdf_file.jpg);background-size:cover;background-position: center;"></div>
    <div class="col-12 border rounded pt-md-2" id="notehead_id" style=" font-size:85%;"><b><?php echo $i; $i++;?>.<?php echo strtoupper($note_data->note_heading);?></b>
    <div class="col-md-12 col-12 ml-n2 mb-md-2" style="font-size:85%;">Upload On <?php echo $date;?></div>
    </div>    
    </div>
    </div>
<?php
    }
?>


        

    </div>
</div>

<div class="col-md-12 mt-5"></div>