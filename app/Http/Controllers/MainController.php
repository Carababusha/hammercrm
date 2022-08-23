<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class MainController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        //$locale = 'es';//App::getLocale();
        //App::setLocale($locale);
    }

    public function index(Request $request)
    {
        $order = new Order();
        $data['order_count'] = $order->getPendingCount(Auth::user()->company_id);
        return view('dashboard');
    }
}
