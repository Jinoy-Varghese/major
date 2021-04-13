<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Hod
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Hod extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Hod_model');
  }

  public function index()
  {
    $this->load->view("header.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/index.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php"); 
  }
  public function add_student()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/add_student.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php"); 
  }
  public function add_professor()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/add_professor.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php"); 
  }
  public function add_lab_assistant()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/add_lab_assistant.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php"); 
  }
  public function view_professor()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/view_professor.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function change_incharge()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/change_incharge.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function add_course()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/add_course.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function add_subject()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/add_subject.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function assign_teachers()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("hod/dash_head.php");
    $this->load->view("hod/assign_teachers.php");
    $this->load->view("hod/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function add_course_process()
  {
    $id=$_SESSION['u_id'];
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('hod_data','hod_data.email=users.email');
    $this->db->where('users.email',$id);
    $sql=$this->db->get();
    foreach($sql->result() as $user_data)
    {
      $dept=$user_data->dept;
    }

    $course_name=$this->input->post('course_name');
    $gradguation=$this->input->post('gradguation');
    $sem_num=$this->input->post('sem_num');
    $course_data=array('course_name'=>$course_name,'gradguation'=>$gradguation,'department'=>$dept,'sem_num'=>$sem_num);
    $this->db->insert('course_list',$course_data);
    $this->session->set_flashdata('insert_success',"Sucessfully inserted");
    redirect('hod/add_course','refresh');

  
  }
  public function add_subject_process()
  {
    $id=$_SESSION['u_id'];
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('hod_data','hod_data.email=users.email');
    $this->db->where('users.email',$id);
    $sql=$this->db->get();
    foreach($sql->result() as $user_data)
    {
      $dept=$user_data->dept;
    }

    $sub_name=$this->input->post('sub_name');
    $gradguation=$this->input->post('gradguation');
    $sem_num=$this->input->post('sub_sem');
    $sub_data=array('sub_name'=>$sub_name,'sub_gradguation'=>$gradguation,'sub_dept'=>$dept,'sub_sem'=>$sem_num);
    $this->db->insert('subjects',$sub_data);
    $this->session->set_flashdata('insert_success',"Sucessfully inserted");
    redirect('hod/add_subject','refresh');

  
  }
  
  public function assign_teacher_process()
  {
    $id=$_SESSION['u_id'];
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('hod_data','hod_data.email=users.email');
    $this->db->where('users.email',$id);
    $sql=$this->db->get();
    foreach($sql->result() as $user_data)
    {
      $dept=$user_data->dept;
    }

    $course=$this->input->post('course');
    $semester=$this->input->post('semester');
    $teacher=$this->input->post('teacher');
    $subject=$this->input->post('subject');


    $sub_data=array('sub_course'=>$course,'teacher_id'=>$teacher,'sub_dept'=>$dept,'sem'=>$semester,'subject'=>$subject);
    $this->db->insert('subject_assigned',$sub_data);
    $this->session->set_flashdata('insert_success',"Sucessfully inserted");
    redirect('hod/assign_teachers','refresh');

  
  }



  function change_incharge_process()
  {
    $id=$_SESSION['u_id'];
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('hod_data','hod_data.email=users.email');
    $this->db->where('users.email',$id);
    $sql=$this->db->get();
    foreach($sql->result() as $user_data)
    {
      $dept=$user_data->dept;
    }


    $course=$this->input->post('course');
    $semester=$this->input->post('semester');
    $incharge_list=$this->input->post('incharge_list');
    $incharge_data=array('semester'=>$semester,'user_incharge'=>$incharge_list,'course'=>$course,'incharge_dept'=>$dept);
    $this->db->insert('incharge_list',$incharge_data);
    $this->session->set_flashdata('insert_success',"Sucessfully inserted");
    redirect('hod/change_incharge','refresh');

  }
  public function verify_student_success()
  {
    $student_id=$this->uri->segment(3);
    $data=array('s_status'=>1);
    $this->db->where('student_id',$student_id);
    $this->db->update('student_data',$data);
    $this->session->set_flashdata('insert_success',"Sucessfully verified");
    redirect('hod/add_student','refresh');
  }
  public function verify_student_reject()
  {
    $student_id=$this->uri->segment(3);
    $data=array('s_status'=>5);
    $this->db->where('student_id',$student_id);
    $this->db->update('student_data',$data);
    $this->session->set_flashdata('insert_success',"Sucessfully verified");
    redirect('hod/add_student','refresh');
  }

  public function Hod_profile()
  {
    $this->load->view("header.php");
    $this->load->view("Hod/dash_head.php");
    $this->load->view("Hod/my_profile4.php");
    $this->load->view("Hod/dash_footer.php");
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
     $this->Hod_model->update_profile($update_data,$id);
     $this->session->set_flashdata('update_success',"Successfully Updated");
     redirect('Hod/Hod_profile','refresh');
    }
    else
    {
      $this->session->set_flashdata('update_failed',"Updation Failed");
      redirect('Hod/Hod_profile','refresh');
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
            redirect('Hod/Hod_profile','refresh');
          }
          else
          {
            $this->session->set_flashdata('changepass_failed',"New Password & Confirm Password Mismatch...!");
            redirect('Hod/Hod_profile','refresh');
          }
        }
        else
        {
          $this->session->set_flashdata('changepass_old_failed',"Current Password Mismatch...!");
          redirect('Hod/Hod_profile','refresh');
        }
   }
   else
   {
     $this->session->set_flashdata('changepass_wrong',"Password is wrong...!");
     redirect('Hod/Hod_profile','refresh');
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

    redirect('Hod/Hod_profile','refresh');
  	
 
  }

  public function view_semester_ajax()
  {
    


        $depart_sub =$_POST['post_subject']; // department id
      

      $users_arr = array();
          
        $this->db->select('*');
        $this->db->from('subjects');
        $sql=$this->db->where('sub_name',$depart_sub)->get();
        foreach($sql->result() as $user_data)
        {
          $sem=$user_data->sub_sem;
          $users_arr[] = array("sem" => $sem);
        }

      
      // encoding array to json format
      echo json_encode($users_arr);
  }












}


/* End of file Hod.php */
/* Location: ./application/controllers/Hod.php */