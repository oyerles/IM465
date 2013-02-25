<?php
class Garbage extend CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('garbage_model');
	}

	public function index()
	{
		$data['garbage'] = $this->garbage_model->get_garbage();

	}

	public function view($slug)
	{
		$data['garbage_item'] = $this->garbage_model->get_garbage($slug);

		if (empty($data['garbage_item']))
		{
			show_404();

		}

		$data['household_name'] = $data['garbage_item']['household_name'];

		$this->load->view('templates/header', $data);
		$this->load->view('garbage/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function index ()
	{
		$data['garbage'] = $this->garbage_model->get_garbage();
		$data['household_name'] = 'Garbage Archive';

		$this->load->view('templates/header', $data);
		$this->load->view('garbage/index', $data);
		$this->load->view('templates/footer', $data);
	}


	public function create()
{
	$this->load->helper('form');
	$this->load->library('form_validation');
	
	$data['household_name'] = 'Create Garbage entry';
	
	$this->form_validation->set_rules('household_name', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');
	
	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('templates/header', $data);	
		$this->load->view('garbage/create');
		$this->load->view('templates/footer');
		
	}
	else
	{
		$this->news_model->set_news();
		$this->load->view('news/success');
	}
}

}