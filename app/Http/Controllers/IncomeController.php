<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Auth;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // กรณี login ใช้งานได้
        // ถ้าเป็น guest ห้าม login
    }
    public function create()//$id) // get
    {
        $income = new Income();
        $income->note = request('note'); // post
        $income->amount = floatval(request('amount'));
        $income->type = request('type');
        $income->userid = Auth::user()->id;
        //dd($income);
        $income->save();
        return redirect(route('home'));
    }
    public function show(){
        $data = Income::where('userid','=',Auth::user()->id)->get(); // ใช้ :all() มาทั้งหมด
        return view('home',
                    ['data'=>$data]
                );
    }
    public function del_data($id){ // รับ id แบบ GET
        Income::where('id','=',$id)->delete();
        return redirect(route('home'));
    }
    public function update_data(Request $request,$id)// get
    {
        Income::where('id','=',$id)->update($request->all());
        return redirect(route('home'));
    }
    public function view_edit($id){ // เพื่อใช้โชว์ข้อมูลใน form แก้ไข รับเป็น GET
        $data = Income::where('id','=',$id)->first();
        return view('edit',
                    ['data'=>$data]
                );
    }

}
