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
















}


/* End of file Hod.php */
/* Location: ./application/controllers/Hod.php */