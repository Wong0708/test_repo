<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Product;
use App\ProductLogs;
use App\ProductDetails;
use App\driver;
use App\SupplyLogs;
// use App\SecondaryUser;
use DateTime;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fields = $request->all();
        $driver = new Driver();
        $date = new DateTime();
        $avail = "Available";

        $driver->name = $fields['name'];
        $driver->license_num = $fields['license'];
        $driver->contact_num = $fields['contact'];
        $driver->availability = $fields['availability'];
        $driver->dr_status = $avail;
        $driver->created_at = $date->getTimestamp();
        $driver->updated_at = $date->getTimestamp();
        $driver->save();
        Session::flash('success','Successfully added a driver!');
        return redirect("/schedule");
    }
    public function getDriver($id){

        $driver = Driver::find($id);
        if($driver['id'] == null){
            return view('errors.404');
        }
        return  view("appdev.driverdetail",['driver' => $driver]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = driver::find($id);
        $product->delete();

        // dd($product);

        Session::flash('success','Successfully deleted a driver!');
        return redirect("/schedule");
    }
}
