<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\MainController;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerDeleteController extends MainController
{
    /**
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request, int $id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customer')->with(['status' => true, 'message' => __('Customer deleted successfully')]);
    }
}
