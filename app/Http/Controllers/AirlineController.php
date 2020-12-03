<?php

namespace App\Http\Controllers;

use App\Airline;
use Illuminate\Http\Request;
use App\Http\Requests\AirlineRequest;

class AirlineController extends Controller
{
    public function index(Request $request)
    {
        $items = Airline::all();
        return view('rgst.airline.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.airline.add');
    }

    public function create(AirlineRequest $request) {
        $airline = new Airline;
        $form = $request->all();
        unset($form['_token']);
        $airline->fill($form)->save();
        return redirect('/rgst/airline');
    }

    
    public function edit(Request $request) {
        $airline = Airline::find($request->id);
        return view('rgst.airline.edit', ['form' => $airline]);
    }

    public function update(Request $request) {
        $airline = Airline::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $airline->fill($form)->save();
        return redirect('/rgst/airline');
    }

    public function delete(Request $request) {
        $airline = Airline::find($request->id);
        return view('rgst.airline.del', ['form' => $airline]);
    }

    public function remove(Request $request) {
        Airline::find($request->id)->delete();
        return redirect('/rgst/airline');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Airline::find($sesdata);
        return view('rgst.airline.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=airline_csvexport.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function() use ($request)
            {
                $createCsvFile = fopen('php://output', 'w'); //※fopenチェック
                $columns = [ //1行目の情報
                    'ID',
                    '2レター',
                    '名前',
                    '名前(ふりがな)',
                    '名前(英語)',
                    '電話番号',
                    '短縮',
                    'FAX番号',
                    'Eメール',
                    '営業開始時間',
                    '営業終了時間',
                    '土曜休み',
                    '日曜休み',
                    '祝日休み',
                    'OK TO BOARD',
                    '入管通報',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日時',
                    '更新登録日時',
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Airline::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->id,
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
