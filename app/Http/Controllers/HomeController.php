<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(5);
        
        return view('admin.index',compact('customers'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function adminindex()
    {
        $customers = Customer::latest()->paginate(5);
        
        return view('admin.index',compact('customers'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function approve($id){
        $leave = Customer::findOrFail($id);
        $leave->status = 'approved'; //Approved
        $leave->save();
        return redirect()->back();
     }
     
     public function decline($id){
        $leave = Customer::findOrFail($id);
        $leave->status = 'rejected'; //Declined
        $leave->save();
        return redirect()->back();
     }
}
