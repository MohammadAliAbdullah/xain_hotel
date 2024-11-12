<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

    }
    public function statusUpdate(){
        $this->db->set("bookingstatus",1);
        $this->db->where("date_time<",date('Y-m-d', strtotime('-7 days')));
        $this->db->where("bookingstatus!=",5);
        $this->db->where("checkoutdate<",date("Y-m-d"));
        $this->db->update("booked_info");
    }
}			