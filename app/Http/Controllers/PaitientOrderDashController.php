<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaitientOrderDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }



    public function indexpaitent(Request $request){
       // $paitent_id=$request->get('user_id);
        $paitent_id=1;
        $orderDetail=DB::table('orders')
                     ->join('order_product','order_product.order_id','=','orders.order_id')
                     ->join('products','products.product_id','=','order_product.product_id')
                     ->where('orders.patient_id',$paitent_id)
                     ->Where('products.type','general')
                     ->select('orders.order_id','products.product_id','products.name','products.type','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
                     ->get();

        $medicalorder=DB::table('orders')
                     ->join('order_product','order_product.order_id','=','orders.order_id')
                     ->join('products','products.product_id','=','order_product.product_id')
                     ->where('orders.patient_id',$paitent_id)
                     ->Where('products.type','medical')
                     ->select('orders.order_id','products.product_id','products.name','products.type','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
                     ->get();


      //dd($orderDetail);
      //dd($medicalorder);
        return view('product_order_system.PatientOrderDash',['orderDetail'=>$orderDetail],['medicalorder'=>$medicalorder]);
    }

    /**
     * Display a listing of the general item search resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function searchgeneral(Request $request){

        $keyword=$request->get('dashsearchtxt');
        $type=$request->get('dashsearchtype');
        $paitent_id=$request->get('paitent_id');

        $orderDetail=DB::table('orders')
        ->join('order_product','order_product.order_id','=','orders.order_id')
        ->join('products','products.product_id','=','order_product.product_id')
        ->where('orders.patient_id',$paitent_id)
        ->Where('products.type','general')
        ->Where($type,'like','%'.$keyword.'%')
        ->select('orders.order_id','products.product_id','products.name','products.type','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
        ->get();

        $medicalorder=DB::table('orders')
                     ->join('order_product','order_product.order_id','=','orders.order_id')
                     ->join('products','products.product_id','=','order_product.product_id')
                     ->where('orders.patient_id',$paitent_id)
                     ->Where('products.type','medical')
                     ->select('orders.order_id','products.product_id','products.name','products.type','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
                     ->get();
                      // dd( $orderDetail);
                     return view('product_order_system.PatientOrderDash',['orderDetail'=>$orderDetail],['medicalorder'=>$medicalorder]);

    }
    /**
     * Display a listing of the Edit item page resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function showedit(Request $request){

        $order_id=$request->get('order_id_send');
        $product_id=$request->get('product_id_send');
        $paitent_id=$request->get('paitent_id_send');
        $product_name=$request->get('product_name_send');
        $product_type=$request->get('product_type_send');
        $product_date=$request->get('product_date_send');
        $order_statsu=$request->get('order_statsu_send');
        $product_quntity=$request->get('product_quntity_send');
        $order_totapayment=$request->get('order_totapayment_send');

        $stock= DB::table('products')
                  ->select('quantity')
                  ->where('product_id', $product_id);


        $paitint_order=array( $order_id, $product_id, $paitent_id,$product_name,$product_type,$product_date,$order_statsu,$product_quntity,$order_totapayment, $stock);

        //dd(  $paitint_order[8]);
        return view('product_order_system.PatientOrderDashEdit')->with(compact('paitint_order',$paitint_order));


    }

     /**
     * Display a listing of the medical item search resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function searchmedical(Request $request){

        $keyword=$request->get('dashsearchtxt');
        $type=$request->get('dashsearchtype');
        $paitent_id=$request->get('paitent_id');

        $medicalorder=DB::table('orders')
        ->join('order_product','order_product.order_id','=','orders.order_id')
        ->join('products','products.product_id','=','order_product.product_id')
        ->where('orders.patient_id',$paitent_id)
        ->Where('products.type','medical')
        ->Where($type,'like','%'.$keyword.'%')
        ->select('orders.order_id','products.product_id','products.name','products.type','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
        ->get();

        $orderDetail=DB::table('orders')
                     ->join('order_product','order_product.order_id','=','orders.order_id')
                     ->join('products','products.product_id','=','order_product.product_id')
                     ->where('orders.patient_id',$paitent_id)
                     ->Where('products.type','general')
                     ->select('orders.order_id','products.product_id','products.name','products.type','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
                     ->get();

                     return view('product_order_system.PatientOrderDash',['orderDetail'=>$orderDetail],['medicalorder'=>$medicalorder]);


                    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {



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
    public function updates(Request $request)
    {

        $order_id=$request->get('orderid');
        $product_id=$request->get('product_id');
        $newQuntity=$request->get('quntity');




        DB::table('order_product')
            ->where('order_id', $order_id)
            ->where('product_id',  $product_id)
            ->update(['quantity' => $newQuntity]);

            return redirect('paitientorderdash');



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $paitent_order=Order::find($id);
       $paitent_order->delete();
       return redirect('paitientorderdash');

    }
}