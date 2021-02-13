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

class Student extends CI_Controller
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
    $this->load->view("student/dash_head.php");
    $this->load->view("student/index.php");
    $this->load->view("student/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function live_meeting()
  {
    $this->load->view("header.php");
    $this->load->view("amp.php");
    $this->load->view("student/dash_head.php");
    $this->load->view("student/live_meeting.php");
    $this->load->view("student/dash_footer.php");
    $this->load->view("footer.php");
  }

}
 

/* End of file Student.php */
/* Location: ./application/controllers/Student.php */