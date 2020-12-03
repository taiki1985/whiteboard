<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\HotelRequest;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $items = Hotel::all();
        return view('rgst.hotel.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.hotel.add');
    }

    public function add_confirmation(HotelRequest $request) {

    }

    public function create(HotelRequest $request) {
        $hotel = new Hotel;
        $form = $request->all();
        // $request->session()->put('items', $values);
        unset($form['_token']);
        $hotel->fill($form)->save();
        return redirect('/rgst/hotel');
    }

    
    public function edit(Request $request) {
        $hotel = Hotel::find($request->id);
        return view('rgst.hotel.edit', ['form' => $hotel]);
    }

    public function update(Request $request) {
        $hotel = Hotel::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $hotel->fill($form)->save();
        return redirect('/rgst/hotel');
    }

    public function delete(Request $request) {
        $hotel = Hotel::find($request->id);
        return view('rgst.hotel.del', ['form' => $hotel]);
    }

    public function remove(Request $request) {
        Hotel::find($request->id)->delete();
        return redirect('/rgst/hotel');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Hotel::find($sesdata);
        return view('rgst.hotel.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=hotel_csvexport.csv',
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
                    '郵便番号',
                    '住所',
                    '住所(英語)',
                    '電話番号',
                    '短縮',
                    'FAX番号',
                    'Eメール',
                    'WEB',
                    'チェックイン',
                    'チェックアウト',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日時',
                    '更新登録日時',
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Hotel::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->id,
                    $item->name,
                    $item->name_ruby,
                    $item->name_eng,
                    $item->postcode,
                    $item->address,
                    $item->address_eng,
                    $item->tel,
                    $item->short_num,
                    $item->fax,
                    $item->emai,
                    $item->web,
                    $item->check_in,
                    $item->check_out,
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
