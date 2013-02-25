<?php
class Garbage_model extends CI_Model {
	public function __construct ()
	{
		$this->load->database();
	}

	public function get_garbage($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('garbage');
			return $query->result_array();
		}

		$query = $this->db->get_where('garbage', array('slug' => $slug));
		return $query->row_array();
	}

	public function set_garbage()
{
	$this->load->helper('url');
	
	$slug = url_title($this->input->post('household_name'), 'dash', TRUE);
	
	$data = array(
		'household_name' => $this->input->post('household_name'),
		'slug' => $slug,
		'text' => $this->input->post('text')
	);
	
	return $this->db->insert('garbage', $data);
}
}

