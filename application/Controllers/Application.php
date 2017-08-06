<?php
namespace App\Controllers;
use CodeIgniter\View\Parser;
use \Psecio\Gatekeeper\Gatekeeper;

/**
 * Our base controller.
 */
class Application extends \CodeIgniter\Controller
{
	protected $data = array (); // parameters for view components
	protected $id;   // identifier for our content
	protected $isSecure = false; // set to true if login needed

    /**
	 * Constructor
	 */
	function __construct(...$params)
	{
		parent::__construct(...$params);
		$this->loader = new \CodeIgniter\Autoloader\FileLocator(new \Config\Autoload());
		$this->viewsDir = __DIR__.'/Views';
		$this->config = new \Config\App();
		$this->data	= array ();
		$this->data['title'] = 'CodeIgniter 4 Demo with Secure Area';
		$this->errors = array ();

		if ($this->isSecure)
		{
	       $config = array(
            'type' => 'mysql',
            'username' => 'gk-user',
            'password' => 'gate123',
            'name' => 'gatekeeper',
            'host' => 'localhost'
        	);
        	Gatekeeper::init(null, $config);
			
		}
	}
	/**
	 * Render this page
	 */
	function render()
	{
        // header
        $d = array( 
            'pagetitle'=>isset($this->data['pagetitle'])?$this->data['pagetitle']:$this->data['title'],
            'endofheader'=>isset($this->data['endofheader'])?$this->data['endofheader']:''
        );
		echo View('theme/header', $d);

        // nav
		$choices = $this->config->menuChoices;
		foreach ($choices['menudata'] as &$menuitem)
		{
			$menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
		}
		echo View('theme/nav', $choices);


        // main body
        // heading optional
        $viewdata = isset($this->data['viewdata'])?$this->data['viewdata']:array();
        $d = array(
            'titleblock'=>isset($this->data['titleblock'])?$this->data['titleblock']:'', 
            'content'=>view($this->data['pagebody'], $viewdata)
            );
		echo View('theme/body', $d);
        // footer
        $d = array(
            'footerbar'=>'',
            'endofbody'=>isset($this->data['endofbody'])?$this->data['endofbody']:''
        );
		echo View('theme/footer', $d);
	}
}
/* end Application.php */