<?php 
if($this->session->flashdata('meeting_over')){
 echo '
<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
  <strong>Success!</strong>  The meeting has been ended.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
 
 
?>
<style>
.custom-button
{

  color:#007BFF;
  text-decoration:none;

}
.custom-button:hover
{
  color:white;
  background:#007BFF;
  cursor:pointer;
}

</style>
<div class="row mt-5">
    <div class="vid-out mt-md-5 col-md-5">
        <video autoplay="true" id="videoElement" class=" col-md-11 mt-md-4 pl-2 pr-2 shadow"></video>
    </div>
   
                    <?php 
	

  $id=$_SESSION['u_id'];
  $this->db->select('*');
  $this->db->from('users');
  $this->db->join('parent_data','parent_data.email=users.email');
  $this->db->join('student_data','student_data.email=users.email');
  $this->db->where('users.email',$id);
  $sql=$this->db->get();
  foreach($sql->result() as $user_data)
  {
                     $course=$user_data->s_course;
                      $semester=$user_data->s_sem;
  }
  $this->db->select('meet_by,sem');
  $this->db->from('meeting_data');
  $this->db->where('status',1);
  $this->db->where('sem',$semester);
  $this->db->where('course',$course);



  $sql=$this->db->get();
  foreach($sql->result() as $user_data)
  {
  

?>
  
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $user_data->subject ?></td>
      <td><a href="<?php echo 'https://mtcst.herokuapp.com/'.md5($user_data->course).md5($user_data->sem); ?>" class="btn border-primary col-12 custom-button">Join</a></td>
	  	</tr>
	<?php		
  $i++;
	}
	?>
	</tbody>
</table>
