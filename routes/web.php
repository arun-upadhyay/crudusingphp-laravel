<?php
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use  Illuminate\Database\Schema\Blueprint;

Route::get('/', function () {
    return view('welcome', ['set' => 'set']);
});

// about us page
Route::get('/about-us', function () {
    $people = ['Arun', 'Shova'];
    $food = ['Grape', 'Apple'];
    return view('pages.about', ['people' => $people],  ['food' => $food]);
});

Route::get('/edit/{id}',function($id){
      $customer = DB::select('select * from customer where id ='. $id);
      return view('welcome',['customer'=>$customer], ['set' => 'edit']);
});
Route::post('update-customer',function(){
    DB::table('customer')
    ->where('id', Request::get('id'))
    ->update(['cname' => Request::get('cname')],['address' => Request::get('address')],['phoneno' => Request::get('phoneno')]);
    return redirect('view-records');
});
Route::get('/delete/{id}',function($id){
    DB::table('customer')->where('id', '=', $id)->delete();
   //DB::delete('delete from customer where id = ?',[$id]);
   return redirect('view-records');
});

Route::post('addcustomer', function () {
	$cname = Request::get('cname');
	$address = Request::get('address');
	$phoneno = Request::get('phoneno');
	// insert new record
	DB::table('customer')->insert(
        array(
            'cname' => "$cname",
            'address' => "$address",
            'phoneno' => "$phoneno"
         )
    );
   return redirect('view-records');
});

Route::any('view-records', function () {
	// retrieving all records from the database
    $customers = DB::table('customer')->get();
    //echo $customers;
    return view('welcome', ['customers' => $customers], ['set' => 'view']);
    // return view('welcome', ['name' => 'Samantha']);
});
