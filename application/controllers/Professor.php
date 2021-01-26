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


}
 


/* End of file Super_admin.php */
/* Location: ./application/controllers/Super_admin.php */