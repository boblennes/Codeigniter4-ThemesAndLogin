<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Application
{
	public function index()
	{
		$this->data = array();
		$this->data['title'] = 'Demo';
		$this->data['pagetitle'] = 'CodeIgniter 4 Demo';
		$this->data['pagebody'] = 'welcome_message';
		$this->render();
	}

	//--------------------------------------------------------------------

}
