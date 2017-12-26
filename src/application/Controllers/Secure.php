<?php 

use CodeIgniter\Controller;
use \Psecio\Gatekeeper\Gatekeeper;

class Secure extends Application
{
    /**
	 * Constructor
	 */
	function __construct(...$params)
	{
        $this->isSecure = true;
		parent::__construct(...$params);
    }

	public function index()
	{
    	$this->data = array();
		$this->data['title'] = 'Demo';
        if (!isset($_POST['username']))
        {
        // CHECK IF 1 USER ONLY, REMOVE 1ST ONE AND ADD AGAIN
 	    $users = Gatekeeper::findUsers();
        if (count($users)==1)
        Gatekeeper::deleteUserById($users[0]->id);
        $credentials = array(
            'username' => 'demo',
            'password' => 'test1',
            'email' => 'ccornutt@phpdeveloper.org',
            'first_name' => 'Chris',
            'last_name' => 'Cornutt'
        );
        Gatekeeper::register($credentials);

		$this->data['pagetitle'] = 'CodeIgniter 4 Demo Login<br>id demo pw test1';
		$this->data['pagebody'] = 'login';
		$this->render();        
        }
	    else if (isset($_POST['username'])) 
        {
	    // ProTip: do validation here!
	    $credentials = array(
		'username' => $_POST['username'],
		'password' => $_POST['password']
	    );
	    if (Gatekeeper::authenticate($credentials) !== true) {
		//Login failed!
        $this->data['viewdata']=array('msg'=>'Login failed.');
		$this->data['pagetitle'] = 'CodeIgniter 4 Demo Login<br>id demo pw test1';
		$this->data['pagebody'] = 'login';
		$this->render();        
		} else {
		// Login successful!;
		$this->data['pagetitle'] = 'CodeIgniter 4 Demo Secure Area';
		$this->data['pagebody'] = 'welcome_secure';
		$this->render();
       	}
        }
    }
	//--------------------------------------------------------------------

}
