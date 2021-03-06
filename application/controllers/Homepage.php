<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Homepage extends Application
    {
        public function __construct() {
	parent::__construct();
            $this->load->model('LogModel');

	}
        

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *        http://example.com/index.php/welcome
         *    - or -
         *        http://example.com/index.php/welcome/index
         *    - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see https://codeigniter.com/user_guide/general/urls.html
         */
        public function index()
        {
            $this->data['pagebody'] = 'homepage_view';
            $this->data['pagetitle'] = 'Homepage';
            
            $moneySpent = $this->LogModel->RetrieveMoneySpentPurchasing();
            $moneyEarned = $this->LogModel->RetrieveMoneyEarnedSales();
            $costOfConsumed = $this->LogModel->RetrieveCostofConsumed();
            
            $this->data['moneySpent'] = $moneySpent;
            $this->data['moneyEarned'] = $moneyEarned;
            $this->data['consumedCost'] = $costOfConsumed;

            $this->render();
        }
    }