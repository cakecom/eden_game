<?php

namespace App\Http\Controllers;

use App\Box;
use App\Item;
use App\Item_receive;
use App\Tb_user;
use App\Transaction;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Routing\ControllerMiddlewareOptions
     */
    public function __construct()
    {
        return $this->middleware('checkuser');
    }
    public function index()
    {
        $username = session('username');
        $boxs = Box::select('*')->with('item')->get();
        $data = Tb_user::select('pvalues')->where('mid', $username)->first();
        $count = Transaction::select('count')->where('username', $username)->latest('id')->first();

        return view('account.index', compact('data', 'boxs', 'count'));
    }

    public function item(Request $request)
    {
        $data = Item::select('*')->where('boxes_id', $request->id)->get();
        foreach ($data as $item) {
            $output = '';
            $output .= '

  <p style="color: white"><label>ชื่อ : ' . $item['name'] . '</label></p>
  ';
        }
        $output .= '  <p style="color: white"><label>100% win count:0/70</label></p>';
        echo $output;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function Transaction(Request $request)
    {
        $username = session('username');
        $point_data = Tb_user::select('pvalues','bonus')->where('mid', $username)->first();
        $point = $point_data['pvalues'];
        $bonus =$point_data['bonus'];
        if($request->buy_type==1) {
            $balance = (int)$point - (int)$request->price;
            $balance_bonus = (int)$bonus - 0;
        }else{
            $balance = (int)$point - 0;

            $balance_bonus = (int)$bonus - (int)$request->price_bonus;
        }
        $count = Transaction::select('count')->where('username', $username)->latest('id')->first();
        $count = $count['count'];
        if ($count < 100) {
            $count = $count + 1;
        }
        ////:::::::::random item::::::::://///
        if($count==100){
            $rare_item=item::with('rate_r')->where('priority',1)->get();
            $dist2 = collect([]);
            foreach ($rare_item as $object) {
                $dist2->push([
                    'id' => $object['id'],
                    'rate' => $object->rate_r['rate'],
                    'number'=>$object['number'],
                    'code'=>$object['code'],
                    'name'=>$object['name'],
                    'image'=>$object['image']
                ]);
            }
            $rand = rand(1, $dist2->sum('rate'));
            $accum = 0;
            $idx = -1;
            $dist2->each(function ($d, $k) use (&$accum, &$idx, $rand) {
                $idx = $k;
                $accum += $d['rate'];
                if ($accum >= $rand) {
                    return false;
                }
            });
            $item_code=$dist2[$idx]['code'];
            $item_id=$dist2[$idx]['id'];
            $item_name=$dist2[$idx]['name'];
            $item_number=$dist2[$idx]['number'];
            $item_image=$dist2[$idx]['image'];
            $count=0;
        }else{
            $item_random = item::with('rate_r')->where('boxes_id', $request->box)->get();
            $dist = collect([]);
            foreach ($item_random as $object) {
                $dist->push([
                    'id' => $object['id'],
                    'rate' => $object->rate_r['rate'],
                    'number'=>$object['number'],
                    'code'=>$object['code'],
                    'name'=>$object['name'],
                    'image'=>$object['image']
                ]);
            }
            $rand = rand(1, $dist->sum('rate'));
            $accum = 0;
            $idx = -1;
            $dist->each(function ($d, $k) use (&$accum, &$idx, $rand) {
                $idx = $k;
                $accum += $d['rate'];
                if ($accum >= $rand) {
                    return false;
                }
            });
            $item_code=$dist[$idx]['code'];
            $item_id=$dist[$idx]['id'];
            $item_name=$dist[$idx]['name'];
            $item_number=$dist[$idx]['number'];
            $item_image=$dist[$idx]['image'];
        }
        $transaction = new Transaction();
        $item_receive = new Item_receive();
        $item = [
            'state' => 1,
            'account_name' => $username,
            'item_id' => $item_code,
            'item_quantity' => $item_number,
            'world_id' => 1010,
            'amount' => 1
        ];
        $item_receive->create($item);
        $data = [
            'username' => $username,
            'count' => $count,
            'box_id' => $request->box,
            'item_id' => $item_id,
            'bonus' =>$request->price_bonus,
            'price' => $request->price,
            'balance' => $balance,
            'balance_bonus' => $balance_bonus

        ];
        $transaction->create($data);
        Tb_user::where('mid', $username)
            ->update([
                'pvalues' => $balance,
                'bonus' =>$balance_bonus
                ]);
        $get_item=[
            'item_name'=>$item_name,
            'item_number'=>$item_number,
            'item_image'=>$item_image
        ];
        return redirect()->back()->with('get_item',$get_item);

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
