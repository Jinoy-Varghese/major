<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Super_admin
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI

 *
 */


class Office extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Fullcalendar_model');
    $this->load->model('Create_user_model');
    $this->load->model('Office_model');
  }
  public function index()
  {
    $this->load->view("header.php");
    $this->load->view("office/dash_head.php");
    $this->load->view("office/index.php");
    $this->load->view("office/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function office_profile()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("office/dash_head.php");
    $this->load->view("office/office_profile.php");
    $this->load->view("office/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function fees_paid()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("office/dash_head.php");
    $this->load->view("office/fees_paid.php");
    $this->load->view("office/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function fees_offline_paid()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("office/dash_head.php");
    $this->load->view("office/fees_offline.php");
    $this->load->view("office/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function offline_fees_process()
  {
    $id=$_SESSION['u_id'];

    $course=$this->input->post('course');
    $semester=$this->input->post('semester');
    $amount=$this->input->post('amount');
    $limit=$this->input->post('limit');
    

    for($i=1;$i<=$limit;$i++)
    {

      $student_id='sid'.$i;
      $rating='v'.$i;
      $mark=$this->input->post($rating);
      $sid=$this->input->post($student_id);
       $fee_data=array('paid_by'=>$sid,'course'=>$course,'sem'=>$semester,'amount'=>$amount);
       $this->db->insert('fees_paid',$fee_data);
    }
    $this->session->set_flashdata('insert_success',"Sucessfully inserted");
    redirect('Office/fees_offline_paid','refresh');
   
  

  }


  public function update_profile()
  {
  if($this->input->post('update_user'))
  {
   $id=$this->input->post('id');; 
   $name=$this->input->post('name');
   $email=$this->input->post('email');
   $address=$this->input->post('address');  
   $gender=$this->input->post('gender');
   $phone=$this->input->post('phone');
   $update_data=array('name'=>$name,'email'=>$email,'address'=>$address,'gender'=>$gender,'phone'=>$phone);
   $this->Office_model->update_profile($update_data,$id);
   $this->session->set_flashdata('update_success',"Successfully Updated");
   redirect('Office/office_profile','refresh');
  }
  else
  {
    $this->session->set_flashdata('update_failed',"Updation Failed");
    redirect('Office/office_profile','refresh');
  }
 }
 public function change_password()
 {
   if($this->input->post('changepw_btn'))
   {
   $id=$this->input->post('id');;
   $current=$this->input->post('current');
   $new=$this->input->post('new');
   $confirm=$this->input->post('confirm');

    $sql=$this->db->get_where('users',array('email'=>$_SESSION["u_id"]));
    foreach($sql->result() as $user_details)
    {
      $password=$user_details->password;
    } 
      if($password==md5($current))
      {
        if(md5($new)==md5($confirm))
        {
          $update_password=array('password'=>md5($confirm));
          $this->Create_user_model->password_change($update_password,$id);
          $this->session->set_flashdata('changepass_success',"Password Changed Successfully");
          redirect('Office/office_profile','refresh');
        }
        else
        {
          $this->session->set_flashdata('changepass_failed',"New Password & Confirm Password Mismatch...!");
          redirect('Office/office_profile','refresh');
        }
      }
      else
      {
        $this->session->set_flashdata('changepass_old_failed',"Current Password Mismatch...!");
        redirect('Office/office_profile','refresh');
      }
 }
 else
 {
   $this->session->set_flashdata('changepass_wrong',"Password is wrong...!");
   redirect('Office/office_profile','refresh');
 }
}
public function upload_image()
{
    $image = $_FILES['image']['name'];
    $target = "assets/img/profile/".basename($image);
  $value=array('u_image'=>$target);
  $this->db->where('email',$_SESSION["u_id"]);
  $this->db->update('users',$value);
  move_uploaded_file($_FILES['image']['tmp_name'], $target);
  $this->session->set_flashdata('update_success',"Successfully Updated");

  redirect('Office/office_profile','refresh');

}

public function view_students_ajax()
{
  
    $depart_sem =$_POST['post_semester']; 
    $depart_course=$_POST['post_course'];
    $users_arr = array();
        
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('student_data','student_data.email=users.email');
      $this->db->where('s_course',$depart_course);
      $this->db->where('s_status','2');
      $sql=$this->db->where('s_sem',$depart_sem)->get();
      
      foreach($sql->result() as $user_data)
      {
        $name=$user_data->name;
        $s_id=$user_data->email;
        
        $this->db->select('*');
        $this->db->from('fees_paid');

        $users_arr[] = array("name" => $name,"s_id"=>$s_id);
      }
      
    
    // encoding array to json format
    echo json_encode($users_arr);
}
public function view_sem_num()
{
      $depart_course =$_POST['post_course']; // department id
    
    $users_arr = array();
        
      $this->db->select('sem_num');
      $this->db->from('course_list');
      $sql=$this->db->where('course_name',$depart_course)->get();
      foreach($sql->result() as $user_data)
      {
        $sem_num=$user_data->sem_num;
      }
      $users_arr[] = array("sem_num" => $sem_num);
    
    // encoding array to json format
    echo json_encode($users_arr);
}
}   