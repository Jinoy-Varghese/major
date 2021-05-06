<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Student_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Student_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function update_profile($update_data,$id)
  {
    $this->db->where('id',$id)->update('users',$update_data);
  }
  public function upload_assignment($assign_upload)
  {
    $this->db->insert('assignment_submit',$assign_upload);
  }
  // ------------------------------------------------------------------------

}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */