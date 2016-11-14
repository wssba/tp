<?php
namespace Admin\Controller;

class CommonController extends \Think\Controller{
        public function __construct() {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['username'])){
//            header('Location:/admin/admin/login');
//            echo"<script>window.location.href='/admin/admin/login';</script>";
            $this->redirect('/admin/admin/login');


            
        }
    }
}
