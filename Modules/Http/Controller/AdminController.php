<?php


namespace App\Modules\Http\Controller;

use PDO;
use App\Modules\App;
use BadMethodCallException;
use App\Modules\Http\Controller\BaseController;
use DateTime;
use PDOException;

class AdminController extends BaseController{
    
    public function admin(){
        if(!$_SERVER['REMOTE_ADDR'] === '127.0.0.1'){
            return view('errors/403');
        }
        
        return view('admin/panel');
    }
}