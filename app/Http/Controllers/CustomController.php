<?php

namespace App\Http\Controllers;

use App\Custom;
use Illuminate\Http\Request;
use App\Http\Requests\CustomRequest;

class CustomController extends Controller
{
    public function index(Request $request)
    {
        $items = Custom::all();
        return view('rgst.custom.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.custom.add');
    }

    public function create(CustomRequest $request) {
        $custom = new Custom;
        $form = $request->all();
        unset($form['_token']);
        $custom->fill($form)->save();
        return redirect('/rgst/custom');
    }

    
    public function edit(Request $request) {
        $custom = Custom::find($request->id);
        return view('rgst.custom.edit', ['form' => $custom]);
    }

    public function update(CustomRequest $request) {
        $custom = Custom::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $custom->fill($form)->save();
        return redirect('/rgst/custom');
    }

    public function delete(Request $request) {
        $custom = Custom::find($request->id);
        return view('rgst.custom.del', ['form' => $custom]);
    }

    public function remove(Request $request) {
        Custom::find($request->id)->delete();
        return redirect('/rgst/custom');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Custom::find($sesdata);
        return view('rgst.custom.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=custom_csvexport.csv',
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
                    '管轄',
                    '郵便番号',
                    '住所',
                    '電話番号',
                    '短縮',
                    'FAX番号',
                    'Eメール',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日時',
                    '更新登録日時',		
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Custom::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->id,
                    $item->name,
                    $item->name_ruby,
                    $item->name_eng,
                    $item->jurisdiction,
                    $item->postcode,
                    $item->address,
                    $item->tel,
                    $item->short_num,
                    $item->fax,
                    $item->email,
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
