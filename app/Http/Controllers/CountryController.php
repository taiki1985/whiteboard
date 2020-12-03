<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $items = Country::all();
        return view('rgst.country.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.country.add');
    }

    public function create(CountryRequest $request) {
        $country = new Country;
        $form = $request->all();
        unset($form['_token']);
        $country->fill($form)->save();
        return redirect('/rgst/country');
    }

    public function edit(Request $request) {
        $country = Country::find($request->id);
        return view('rgst.country.edit', ['form' => $country]);
    }

    public function update(CountryRequest $request) {
        $country = Country::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $country->fill($form)->save();
        return redirect('/rgst/country');
    }

    public function delete(Request $request) {
        $country = Country::find($request->id);
        return view('rgst.country.del', ['form' => $country]);
    }

    public function remove(Request $request) {
        Country::find($request->id)->delete();
        return redirect('/rgst/country');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Country::find($sesdata);
        return view('rgst.country.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=country_csvexport.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function() use ($request)
            {
                $createCsvFile = fopen('php://output', 'w'); //※fopenチェック
                $columns = [ //1行目の情報
                    'ID',
                    '国名',
                    '国名(英語)',
                    '国コード（2桁）',
                    '国コード（3桁）',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日',
                    '最終更新日	',
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Country::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->id,
                    $item->name,
                    $item->name_eng,
                    $item->code_2,
                    $item->code_3,
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
