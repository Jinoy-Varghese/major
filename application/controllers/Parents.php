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

class Parents extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Fullcalendar_model');
    $this->load->model('Create_user_model');
    $this->load->model('Parents_model');
  }
  public function index()
  {
    $this->load->view("header.php");
    $this->load->view("parents/dash_head.php");
    $this->load->view("parents/index.php");
    $this->load->view("parents/dash_footer.php");
    $this->load->view("footer.php");
  }
  public function parent_profile()
  {
    $this->load->view("header.php");
    $this->load->view("parents/dash_head.php");
    $this->load->view("parents/my_profile_parent.php");
    $this->load->view("parents/dash_footer.php");
    $this->load->view("footer.php");
  }
} 