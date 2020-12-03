<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $items = Car::all();
        return view('car.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('car.add');
    }

    public function add_confirmation(CarRequest $request) {

    }

    public function create(CarRequest $request) {
        $car = new Car;
        $form = $request->all();
        // $request->session()->put('items', $values);
        unset($form['_token']);
        $car->fill($form)->save();
        return redirect('/car');
    }

    
    public function edit(Request $request) {
        $car = Car::find($request->id);
        return view('car.edit', ['form' => $car]);
    }

    public function update(Request $request) {
        $car = Car::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $car->fill($form)->save();
        return redirect('/car');
    }

    public function delete(Request $request) {
        $car = Car::find($request->id);
        return view('car.del', ['form' => $car]);
    }

    public function remove(Request $request) {
        Car::find($request->id)->delete();
        return redirect('/car');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Car::find($sesdata);
        return view('car.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=car_csvexport.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function() use ($request)
            {
                $createCsvFile = fopen('php://output', 'w'); //※fopenチェック
                $columns = [ //1行目の情報
                    'name_jpn',
                    'jurisdiction',
                    'postcode',
                    'address',
                    'tel',
                    'short_num',
                    'fax',			
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Car::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->two_letter,
                    $item->name,
                    $item->name_ruby,
                    $item->name_eng,
                    $item->tel,
                    $item->short_num,
                    $item->fax,
                    $item->email,
                    $item->start,
                    $item->end,
                    $item->saturday,
                    $item->sunday,
                    $item->national_holiday,
                    $item->ok_board,
                    $item->immigration_notice,
                    $item->remarks,
                    $item->created_user_id,
                    $item->updated_user_id,
                ];
                mb_convert_variables('SJIS-win', 'UTF-8', $csv);
                fputcsv($createCsvFile, $csv);
            }
            fclose($createCsvFile);
        };
        return response()->stream($callback, 200, $headers);
    }
}
