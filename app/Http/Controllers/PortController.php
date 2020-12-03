<?php

namespace App\Http\Controllers;

use App\Port;
use Illuminate\Http\Request;
use App\Http\Requests\PortRequest;

class PortController extends Controller
{
    public function index(Request $request)
    {
        $items = Port::all();
        return view('rgst.port.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.port.add');
    }

    public function create(PortRequest $request) {
        $port = new Port;
        $form = $request->all();
        // $request->session()->put('items', $values);
        unset($form['_token']);
        $port->fill($form)->save();
        return redirect('/rgst/port');
    }

    
    public function edit(Request $request) {
        $port = Port::find($request->id);
        return view('rgst.port.edit', ['form' => $port]);
    }

    public function update(PortRequest $request) {
        $port = Port::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $port->fill($form)->save();
        return redirect('/rgst/port');
    }

    public function delete(Request $request) {
        $port = Port::find($request->id);
        return view('rgst.port.del', ['form' => $port]);
    }

    public function remove(Request $request) {
        Port::find($request->id)->delete();
        return redirect('/rgst/port');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Port::find($sesdata);
        return view('rgst.port.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=port_csvexrgst.port.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function() use ($request)
            {
                $createCsvFile = fopen('php://output', 'w'); //※fopenチェック
                $columns = [ //1行目の情報
                    'ID',
                    '名前',
                    '名前(ふりがな)',
                    '名前(英語)',
                    '住所',
                    '税関ID',
                    '入管ID',
                    '検疫ID',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日時',
                    '更新登録日時',	
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Port::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->id,
                    $item->name,
                    $item->name_ruby,
                    $item->name_eng,
                    $item->address,
                    $item->custom_id,
                    $item->immigration_id,
                    $item->quarantine_id,
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
