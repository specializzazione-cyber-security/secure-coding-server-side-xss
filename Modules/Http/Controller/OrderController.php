<?php


namespace App\Modules\Http\Controller;

use PDO;
use DateTime;
use PDOException;
use App\Modules\App;
use BadMethodCallException;
use App\Modules\Models\Order;
use App\Modules\Http\Controller\BaseController;
use Dompdf\Dompdf;
use mikehaertl\wkhtmlto\Pdf;

class OrderController extends BaseController{
    
    public function ordersPage(){
        if(!$_SESSION['user']){
            return view('errors/403');
        }

        $orders =  Order::select("SELECT * from orders WHERE user_id = " . $_SESSION['user']['id']);
       
        return view("profile/orders", ['orders' => $orders]);
    }

    public function print(){
        $order = Order::select("SELECT * from orders WHERE id = " . $_GET['order']);
        
        $stmt = App::$app->database->pdo->prepare("SELECT * from users WHERE id = :userId");
        $stmt->execute(['userId'=>$order->user_id]);
        $user = $stmt->fetch();


        $receipt = "
        <h1>Ricevuta ordine</h1>

        <table>
          <tr>
            <th>ID ordine</th>
            <th>Email di riferimento</th>
            <th>Data</th>
            <th>Totale</th>
            <th>Note</th>
          </tr>
            <tr>
              <td>$order->id</td>
              <td>". $user['email'] ."</td>
              <td> ". date_format($order->date, 'd/m/y') . "</td>
              <td>$order->total</td>
              <td>$order->note</td>
            </tr>
        </table>
        ";

        echo $receipt;
    }
}