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

class Professor extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Fullcalendar_model');
    $this->load->model('Create_user_model');
    $this->load->model('Professor_model');
  }

  public function index()
  {
    $this->load->view("header.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/index.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function add_student()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/add_student.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function add_parent()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/add_parent.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function mark_attendance()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/mark_attendance.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function view_students()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/view_students.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function live_meeting()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/live_meeting.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function notes()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/notes.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function add_notes_page()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/add_notes_page.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function start_meeting()
  {
    $value=array('meet_status'=>1);
    $this->db->where('email',$_SESSION["u_id"]);
    $this->db->update('professor_data',$value);
    $link="https://mtcst.herokuapp.com/".md5($_SESSION["u_id"]); 
    redirect($link,'refresh');
  }
  public function leave_meeting()
  {
    $value=array('meet_status'=>0);
    $this->db->where('email',$_SESSION["u_id"]);
    $this->db->update('professor_data',$value);
    $this->session->set_flashdata('meeting_over',);
    redirect('Professor/live_meeting','refresh');
  }
  public function mark_attendance_process()
  {
    $id=$_SESSION['u_id'];
    $this->db->select('*');
    $this->db->from('incharge_list');
    $this->db->where('user_incharge',$id);
    $sql=$this->db->get();
    foreach($sql->result() as $user_data)
    {
      $s_sem=$user_data->semester;
      $u_dept=$user_data->incharge_dept;
    }
    $limit=$this->input->post('limit');
    $date=$this->input->post('date');
    for($i=1;$i<=$limit;$i++)
    {
       $attendance=$this->input->post($i);
       $student_id='sid'.$i;
       $sid=$this->input->post($student_id);
       $attendance_data=array('s_id'=>$sid,'s_attendance'=>$attendance,'s_sem'=>$s_sem,'timestamp'=>$date);
       $this->db->insert('attendance',$attendance_data);
    }
    $this->session->set_flashdata('insert_success',"Sucessfully inserted");
    redirect('Professor/mark_attendance','refresh');
  }


  public function professor_profile()
  {
    $this->load->view("header.php");
    $this->load->view("professor/dash_head.php");
    $this->load->view("professor/my_profile2.php");
    $this->load->view("professor/dash_footer.php");
    $this->load->view("footer.php");
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
     $this->Professor_model->update_profile($update_data,$id);
     $this->session->set_flashdata('update_success',"Successfully Updated");
     redirect('professor/professor_profile','refresh');
    }
    else
    {
      $this->session->set_flashdata('update_failed',"Updation Failed");
      redirect('professor/professor_profile','refresh');
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
            redirect('professor/professor_profile','refresh');
          }
          else
          {
            $this->session->set_flashdata('changepass_failed',"New Password & Confirm Password Mismatch...!");
            redirect('professor/professor_profile','refresh');
          }
        }
        else
        {
          $this->session->set_flashdata('changepass_old_failed',"Current Password Mismatch...!");
          redirect('professor/professor_profile','refresh');
        }
   }
   else
   {
     $this->session->set_flashdata('changepass_wrong',"Password is wrong...!");
     redirect('professor/professor_profile','refresh');
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

    redirect('Professor/Professor_profile','refresh');
  	
 
  }


  }
  
 

/* End of file Super_admin.php */
/* Location: ./application/controllers/Super_admin.php */