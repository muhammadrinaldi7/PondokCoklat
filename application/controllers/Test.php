 <?php 
use ay4t\WhatsAppHelper\WhatsAppSG;
 class Test extends CI_Controller{
    
    public function index()
	{
       
        $wa     = new WhatsAppSG();
        $wa->setPort('6789')
            ->setSenderPhone('0895705038835')
            ->setRecepient('089531778418')
            ->setMessage('MASOKKK!');

        var_dump($wa->SendText());
		$this->load->view('welcome_message');
	}
}
 ?>