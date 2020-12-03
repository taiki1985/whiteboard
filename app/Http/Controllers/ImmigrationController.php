<?php

namespace App\Http\Controllers;

use App\Immigration;
use Illuminate\Http\Request;
use App\Http\Requests\ImmigrationRequest;

class ImmigrationController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Immigration::all();
        return view('rgst.immigration.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.immigration.add');
    }

    public function create(ImmigrationRequest $request) {
        $immigration = new Immigration;
        $form = $request->all();
        unset($form['_token']);
        $immigration->fill($form)->save();
        return redirect('/rgst/immigration');
    }

    
    public function edit(Request $request) {
        $immigration = Immigration::find($request->id);
        return view('rgst.immigration.edit', ['form' => $immigration]);
    }

    public function update(ImmigrationRequest $request) {
        $immigration = Immigration::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $immigration->fill($form)->save();
        return redirect('/rgst/immigration');
    }

    public function delete(Request $request) {
        $immigration = Immigration::find($request->id);
        return view('rgst.immigration.del', ['form' => $immigration]);
    }

    public function remove(Request $request) {
        Immigration::find($request->id)->delete();
        return redirect('/rgst/immigration');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Immigration::find($sesdata);
        return view('rgst.immigration.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=immigration_csvexport.csv',
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
            $items = Immigration::find($sesdata);
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
