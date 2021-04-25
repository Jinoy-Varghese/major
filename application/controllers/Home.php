<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Create_user_model');
  }
  public function index()
  {
    $this->load->view("landing_page.php");
    
  }
  public function login()
  {
    $this->load->view("header");
    $this->load->view("login");
    $this->load->view("footer");
  }
  public function logout()
  {
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) 
    {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_unset();
    session_destroy();
    redirect('home/login');
  }

   public function login_process()
   {
     if($this->input->post('u_login'))
      {
        $u_name=$this->input->post('u_name');
        $u_pass=md5($this->input->post('u_password'));
        $u_data=array('u_name'=>$u_name,'u_pass'=>$u_pass);
        $users_list=$this->db->get_where('users',array('email'=>$u_data['u_name']));
        if($users_list->num_rows()>0)
        {
          foreach($users_list->result() as $users)
          {
            if($u_data['u_name']==$users->email && $u_data['u_pass']==$users->password)
            {
              $_SESSION['u_id']=$u_data['u_name'];
              $_SESSION['role']=$users->role;
              if($users->role=="Super Admin")
              {
              redirect('Super_admin','refresh');
              }
              elseif($users->role=="librarian")
              {
              redirect('Librarian','refresh');
              }
              elseif($users->role=="hod")
              {
              redirect('Hod','refresh');
              }
              elseif($users->role=="parent")
              {
              redirect('Parents','refresh');
              }
              elseif($users->role=="student")
              {
              redirect('student','refresh');
              }
              elseif($users->role=="professor")
              {
              redirect('Professor','refresh');
              }
              elseif($users->role=="lab assistant")
              {
              redirect('Lab_assistant','refresh');
              }
              elseif($users->role=="principal")
              {
              redirect('Principal','refresh');
              }
            }
            else
            {
              $this->session->set_flashdata('invalid_user',"failed");
              redirect('Home/login','refresh');
            }
          }
        }
        else
            {
              $this->session->set_flashdata('invalid_user',"failed");
              redirect('Home/login','refresh');
            }
      }
   }
   public function insert_hod()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_dept=$this->input->post('u_dept');
       $u_role="hod";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob,'dept'=>$u_dept);
       $this->Create_user_model->insert_hod($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('Super_admin/add_hod','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('Super_admin/add_hod','refresh');
     }
   }
   public function google_auth()
   {
    $this->load->view("google_auth.php"); 
   }
   public function insert_professor()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_dept=$this->input->post('u_dept');
       $u_role="professor";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob,'dept'=>$u_dept);
       $this->Create_user_model->insert_professor($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('Super_admin/add_professor','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('Super_admin/add_professor','refresh');
     }
   }
   public function insert_lab_assistant()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_dept=$this->input->post('u_dept');
       $u_role="lab assistant";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob,'dept'=>$u_dept);
       $this->Create_user_model->insert_lab_assistant($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('Super_admin/add_lab_assistant','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('Super_admin/add_lab_assistant','refresh');
     }
   }
   public function insert_student()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_dept=$this->input->post('u_dept');
       $u_role="student";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob,'dept'=>$u_dept);
       $this->Create_user_model->insert_student($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('hod/add_student','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('Super_admin/add_student','refresh');
     }
   }
   public function insert_student_professor()
   {
     if($this->input->post('u_reg'))
     {
      $id=$_SESSION['u_id'];
      $this->db->select('*');
      $this->db->from('incharge_list');
      $this->db->where('user_incharge',$id);
      $sql=$this->db->get();
      foreach($sql->result() as $user_data)
      {
        $sem=$user_data->semester;
        $u_dept=$user_data->incharge_dept;
      }

       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_course=$this->input->post('course');
       
       $u_role="student";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob,'dept'=>$u_dept,'s_sem'=>$sem,'s_course'=>$u_course);
       $this->Create_user_model->insert_student($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('professor/add_student','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('professor/add_student','refresh');
     }
   }
   public function insert_professor_hod()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_dept=$this->input->post('u_dept');
       $u_role="professor";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob,'dept'=>$u_dept);
       $this->Create_user_model->insert_professor($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('hod/add_professor','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('hod/add_professor','refresh');
     }
   }
   public function change_principal_process()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_role="principal";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('principal_email'=>$u_email,'dob'=>$u_dob);
       $this->Create_user_model->insert_principal($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('super_admin/change_principal','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('super_admin/change_principal','refresh');
     }
   }
   public function insert_lab_assistant_hod()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_dept=$this->input->post('u_dept');
       $u_role="lab assistant";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob,'dept'=>$u_dept);
       $this->Create_user_model->insert_lab_assistant($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('hod/add_lab_assistant','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('hod/add_lab_assistant','refresh');
     }
   }
   public function insert_parent()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $ph_no=$this->input->post('ph_no');
       $s_mail=$this->input->post('s_mail');
       $u_pass=md5($this->input->post('u_pass'));
       $u_dept=$this->input->post('u_dept');
       $u_role="parent";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'s_mail'=>$s_mail,'dept'=>$u_dept);
       $this->Create_user_model->insert_parent($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Sucessfully inserted");
       redirect('professor/add_parent','refresh');
     }
     else
     {
      $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('professor/add_parent','refresh');
     }
   }
   public function insert_librarian()
   {
     if($this->input->post('u_reg'))
     {
       $f_name=$this->input->post('f_name');
       $l_name=$this->input->post('l_name');
       $u_name=$f_name." ".$l_name;
       $u_email=$this->input->post('u_email');
       $u_address=$this->input->post('u_address');
       $u_gender=$this->input->post('u_gender');
       $u_dob=$this->input->post('u_dob');
       $ph_no=$this->input->post('ph_no');
       $u_pass=md5($this->input->post('u_pass'));
       $u_role="librarian";
       $u_data1=array('name'=>$u_name,'password'=>$u_pass,'email'=>$u_email,'address'=>$u_address,'gender'=>$u_gender,'phone'=>$ph_no,'role'=>$u_role);
       $u_data2=array('email'=>$u_email,'dob'=>$u_dob);
       $this->Create_user_model->insert_librarian($u_data1,$u_data2);
       $this->session->set_flashdata('insert_success',"Successfully inserted");
       redirect('Super_admin/add_librarian','refresh');
     }
     
     else
     {
       $this->session->set_flashdata('insert_failed',"insertion failed");
       redirect('Super_admin/add_librarian','refresh');
     }
    }
   public function leave_meeting()
   {
     $this->db->from('users');
     $this->db->select('*');
     $this->db->where('email',$_SESSION['u_id']);
     $sql=$this->db->get();
     foreach($sql->result() as $user_data)
     {
       $present=$user_data->role;
     }
     if($present=='professor')
     {
       $value1=array('meet_status'=>0);
       $value2=array('status'=>0);

       $this->db->where('email',$_SESSION["u_id"]);
       $this->db->update('professor_data',$value1);
       $this->db->where('meet_by',$_SESSION["u_id"]);
       $this->db->update('meeting_data',$value2);

       $this->session->set_flashdata('meeting_over',"Theernnu");
       redirect('Professor/live_meeting','refresh');
     }
     else
     {
       redirect('Student/live_meeting','refresh');
     }
   }
}