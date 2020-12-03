<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Http\Request;
use App\Http\Requests\AirportRequest;

class AirportController extends Controller
{
    public function index(Request $request)
    {
        $items = Airport::all();
        return view('rgst.airport.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.airport.add');
    }

    public function create(AirportRequest $request) {
        $airport = new Airport;
        $form = $request->all();
        unset($form['_token']);
        $airport->fill($form)->save();
        return redirect('/rgst/airport');
    }

    public function edit(Request $request) {
        $airport = Airport::find($request->id);
        return view('rgst.airport.edit', ['form' => $airport]);
    }

    public function update(AirportRequest $request) {
        $airport = Airport::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $airport->fill($form)->save();
        return redirect('/rgst/airport');
    }

    public function delete(Request $request) {
        $airport = Airport::find($request->id);
        return view('rgst.airport.del', ['form' => $airport]);
    }

    public function remove(Request $request) {
        Airport::find($request->id)->delete();
        return redirect('/rgst/airport');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Airport::find($sesdata);
        return view('rgst.airport.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=airport_csvexport.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function() use ($request)
            {
                $createCsvFile = fopen('php://output', 'w'); //※fopenチェック
                $columns = [ //1行目の情報
                    'ID',
                    '種類',
                    '3レター',
                    '名前',
                    '名前(ふりがな)',
                    '名前(英語)',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日時',
                    '更新登録日時',
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Airport::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->id,
                    $item->type,
                    $item->three_letter,
                    $item->name,
                    $item->name_ruby,
                    $item->name_eng,
                    $item->remarks,
                    $item->created_user_id,
                    $item->updated_user_id,
                    $item->created_at,
                    $item->updated_at,
                ];
                mb_convert_variables('SJIS-win', 'UTF-8', $csv);
                fputcsv($createCsvFile, $csv);
            }
            fclose($createCsvFile);
        };
        return response()->stream($callback, 200, $headers);
    }
}
