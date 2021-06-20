<?php

namespace App\Http\Controllers;

use App\Inc;
use App\GRManual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;
use Auth;

class IncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $os2 = DB::select("select OS_Number, Material, Material_Desc, sum(Qty) as Qty, UoM, Vendor_Name, Delivery_Date,ROW_NUMBER() OVER( ORDER BY Delivery_Date DESC ) AS rownumber from dbo.tb_OrderSheet where Delivery_Date > getdate()-3 group by OS_Number, Material, Material_Desc, UoM, Vendor_Name, Delivery_Date");
        // $GRManual = GRManual::all();
// dd($os2);
        return view('view', compact('os2'));
    }

    public function viewedit(Request $request, $id)
    {
        $os2 = DB::select("select * from (select OS_Number, Material, Material_Desc, sum(Qty) as Qty, UoM, Vendor_Name, Delivery_Date,ROW_NUMBER() OVER( ORDER BY Delivery_Date DESC) AS rownumber from dbo.tb_OrderSheet where Delivery_Date > getdate()-3 group by OS_Number, Material, Material_Desc, UoM, Vendor_Name, Delivery_Date) as t1 where rownumber = $id")[0];
        return view('viewedit', compact('os2'));
    }

    public function store(Request $request)
    {
            $current_time = Carbon::now();
            $data = array(
              'id_os' => $request->id_os,
              'gr_datetime' => $current_time,
              'suratjalan' => $request->suratjalan,
              'userscan' => $request->userscan,
              'namapart' => $request->namapart,
              'qty_os' => $request->qty_os,
              'qty_kedatangan' => $request->qty_kedatangan,
              'supplier' => $request->supplier

            );
            GRManual::insert($data);

          return redirect('/')->with('status', 'Data Berhasil Ditambahkan !');
    }

    public function edit()
    {
        $os3 = GRManual::orderBy('id', 'DESC')->get();
    
        return view('edit', compact('os3'));
    }

    public function editos(Request $request, $id)
    {
        $os3 = DB::select("select * from dbo.tb_GR_Manual where id = $id")[0];

        return view('editos', compact('os3'));
    }

    public function update(Request $request,GRManual $os3)
    {
        $current_time = Carbon::now();
        // $os3 = DB::select("select * from dbo.tb_GR_Manual where id = $os3->id");
        $os3 = GRManual::where('id', $os3->id);
        $os3->update([
            'id_os' => $request->id_os,
            // 'gr_datetime' => $current_time,
            'suratjalan' => $request->suratjalan,
            'userscan' => $request->userscan,
            'namapart' => $request->namapart,
            'qty_os' => $request->qty_os,
            'qty_kedatangan' => $request->qty_kedatangan,
            'supplier' => $request->supplier
                ]);
                // dd($os3);
        return redirect('/edit')->with('status', 'Berhasil Diubah !');
    }

    public function dataos()
    {
        $os4 = DB::select("select *,case when qty_os = qty_kedatangan then 'completed' when qty_os > qty_kedatangan then 'pending' else 'over' end as status from (select id_os,namapart,qty_os,sum(qty_kedatangan) as qty_kedatangan, supplier from dbo.tb_GR_Manual group by id_os,namapart,qty_os,supplier) as t1");

        return view('dataos', compact('os4'));
    }
}
