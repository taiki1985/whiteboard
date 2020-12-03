<?php

namespace App\Http\Controllers;

use App\Quarantine;
use Illuminate\Http\Request;
use App\Http\Requests\QuarantineRequest;

class QuarantineController extends Controller
{
    public function index(Request $request)
    {
        $items = Quarantine::all();
        return view('rgst.quarantine.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.quarantine.add');
    }

    public function create(QuarantineRequest $request) {
        $quarantine = new Quarantine;
        $form = $request->all();
        // $request->session()->put('items', $values);
        unset($form['_token']);
        $quarantine->fill($form)->save();
        return redirect('/rgst/quarantine');
    }

    
    public function edit(Request $request) {
        $quarantine = Quarantine::find($request->id);
        return view('rgst.quarantine.edit', ['form' => $quarantine]);
    }

    public function update(QuarantineRequest $request) {
        $quarantine = Quarantine::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $quarantine->fill($form)->save();
        return redirect('/rgst/quarantine');
    }

    public function delete(Request $request) {
        $quarantine = Quarantine::find($request->id);
        return view('rgst.quarantine.del', ['form' => $quarantine]);
    }

    public function remove(Request $request) {
        Quarantine::find($request->id)->delete();
        return redirect('/rgst/quarantine');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Quarantine::find($sesdata);
        return view('rgst.quarantine.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=quarantine_csvexport.csv',
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
            $items = Quarantine::find($sesdata);
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
