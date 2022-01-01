<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    private $_view;
    private $_subject;
    private $_fromAddress;
    private $_fromName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        
        $this->data = $param['data'];
        $this->_view = $param['view'];
        $this->_subject = $param['subject'];

        $this->_fromAddress = env('MAIL_FROM_ADDRESS', 'no-reply@smarqtech.com');
        $this->_fromName = env('MAIL_FROM_NAME', 'Smarqtech');

        if(isset($param['from']) && isset($param['from']['address']) && isset($param['from']['name'])){
            $this->_fromAddress = $param['from']['address'];
            $this->_fromName = $param['from']['name'];
        }
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->_view)->subject($this->_subject)->from($this->_fromAddress,  $this->_fromName);
    }
}
