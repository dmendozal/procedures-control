<?php

namespace App\Http\Controllers;

use App\Debtor;
use App\Detail;
use App\Person;
use App\Product;
use App\Sale;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create()
    {
        $products = Product::all();
        $persons = Person::all();
        return view('sale.create', compact('products', 'persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = new Collection();
        $idproducts = $request->id_producto;
        foreach ($idproducts as $key => $value) {
            $item = collect([
                'id_product' => $value,
                'amount' => $request->amount[$key],
                'subtotal' => $request->subtotal[$key],
                'sell_price' => $request->sell_price[$key],
            ]);
            $collection->push($item);
        };
        $finalProducts = $collection->groupBy('id_product');
        $collectionFinal = new Collection();
        foreach ($finalProducts as $key => $value) {
            $finalItem = collect([
                'id_product' => $value[0]['id_product'],
                'amount' => $value->sum('amount'),
                'subtotal' => $value->sum('subtotal'),
                'sell_price' => $value[0]['sell_price']
            ]);
            $collectionFinal->push($finalItem);
        };

        $sale = Sale::create([
            'date' => date('Y-m-d H:i:s'),
            'paid_out' => $request->total_paid_out,
            'total' => $request->total_to_pay,
            'fkidperson' => ($request->fkidperson == 0)? null: $request->fkidperson
        ]);

        foreach ($collectionFinal as $key => $value) {
            $detail = new Detail();
            $detail->amount = $value['amount'];
            $detail->price = $value['sell_price'];
            $detail->subtotal = $value['subtotal'];
            $detail->fkidsale = $sale->idsale;
            $detail->fkidproduct = $value['id_product'];
            $detail->save();

            $product = Product::find($value['id_product']);
            $product->stock = $product->stock - $value['amount'];
            $product->update();
        }

        if ($request->fkidperson != 0) {
            $debtor = new Debtor();
            $debtor->debt = ($request->total_to_pay - $request->total_paid_out);
            $debtor->date = date('Y-m-d H:i:s');
            $debtor->state_debtor = 1;
            $debtor->fkidperson = $request->fkidperson;
            $debtor->fkidsale = $sale->idsale;
            $debtor->save();
        }

        return redirect()->route('sale.index');
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
        //
    }
}
