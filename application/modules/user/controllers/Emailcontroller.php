<?php
class EmailController extends CI_Controller {

    public function send_mail($tomail,$subject,$message) {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = $this->config->item('MAIL_DRIVER');
        $config['smtp_host'] = $this->config->item('MAIL_HOST');
        $config['smtp_user'] = $this->config->item('MAIL_USERNAME');
        $config['smtp_pass'] = $this->config->item('MAIL_PASSWORD');
        $config['smtp_port'] = $this->config->item('MAIL_ENCRYPTION');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        
        $from_email = $this->config->item('MAIL_USERNAME');
        $to_email = $tomail;
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        //Send mail
        if($this->email->send())
            $message = "Congragulation Email Send Successfully.";
        else
            $message = "You have encountered an error";
        return $message;
    }
}
?>