<?php
defined('BASEPATH') or exit('No direct script access allowed');
if(!isset($_SESSION['u_id']))
{
  redirect('Home/login','refresh');
}
?>
<?php
    function get_file_extension($file_name)
    {
    return pathinfo($file_name,PATHINFO_EXTENSION);
    }
?>
<div class="container p-lg-4">
<?php 
if($this->session->flashdata('insert_success')){
 echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> New Note Inserted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($this->session->flashdata('insert_failed')){
    echo '
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Failed!</strong> Something Wend wrong, please try again.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
   }
?>
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
    <?php 
    $file_format=get_file_extension("$note_data->note_file");
    if($file_format=="pdf")
    {
    echo "<div class='col-12 border  rounded-top' style='height:120px; background-image:url(http://localhost/major/assets/image/pdf_file.jpg);background-size:cover;background-position: center;'></div>";
    }
    elseif($file_format=="docx")
    {
        echo "<div class='col-12 border  rounded-top' style='height:120px; background-image:url(http://localhost/major/assets/image/word_file.jpg);background-size:cover;background-position: center;'></div>";
    }
    elseif($file_format=="pptx")
    {
        echo "<div class='col-12 border  rounded-top' style='height:120px; background-image:url(http://localhost/major/assets/image/powerpoint_file.jpg);background-size:cover;background-position: center;'></div>";
    }
    elseif($file_format=="jpg" || $file_format=="png")
    {
        echo "<div class='col-12 border  rounded-top' style='height:120px; background-image:url(http://localhost/major/assets/image/jpg_file.jpg);background-size:cover;background-position: center;'></div>";
    }
    else
    {
        echo "<div class='col-12 border rounded-top' style='height:120px; background-image:url(http://localhost/major/assets/image/other_file.jpg);background-size:cover;background-position: center;'></div>";
    }
    ?>
    <div class="col-12 border rounded-bottom pt-md-2" style=" font-size:85%;"><b><?php echo $i; $i++;?>.<?php echo strtoupper($note_data->note_heading);?></b>
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