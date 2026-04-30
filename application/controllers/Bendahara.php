<?php 
    class Bendahara extends MY_Controller{
        public function __construct()
        {
            parent::__construct();

            $this->onlyRole('bendahara');
        }

        public function index(){
            $data['judul'] = 'Dashboard Bendahara';
            $this->render('bendahara/dashboard');
        }
    }
?>