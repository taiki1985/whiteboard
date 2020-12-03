<?php

namespace App\Http\Controllers;

use App\Rank;
use Illuminate\Http\Request;
use App\Http\Requests\RankRequest;

class RankController extends Controller
{
    public function index(Request $request)
    {
        $items = Rank::all();
        return view('rgst.rank.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.rank.add');
    }

    public function create(RankRequest $request) {
        $rank = new Rank;
        $form = $request->all();
        unset($form['_token']);
        $rank->fill($form)->save();
        return redirect('/rgst/rank');
    }
 
    public function edit(Request $request) {
        $rank = Rank::find($request->id);
        return view('rgst.rank.edit', ['form' => $rank]);
    }

    public function update(RankRequest $request) {
        $rank = Rank::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $rank->fill($form)->save();
        return redirect('/rgst/rank');
    }

    public function delete(Request $request) {
        $rank = Rank::find($request->id);
        return view('rgst.rank.del', ['form' => $rank]);
    }

    public function remove(Request $request) {
        Rank::find($request->id)->delete();
        return redirect('/rgst/rank');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Rank::find($sesdata);
        return view('rgst.rank.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=rank_csvexport.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function() use ($request)
            {
                $createCsvFile = fopen('php://output', 'w'); //※fopenチェック
                $columns = [ //1行目の情報
                    'ID',
                    'ランク名',
                    '略語',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日',
                    '最終更新日',
                ];
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Rank::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    'id',
                    'name',
                    'name_srt',
                    'remarks',
                    'created_user_id',
                    'updated_user_id',
                    'created_at',
                    'updated_at',
                ];
                mb_convert_variables('SJIS-win', 'UTF-8', $csv);
                fputcsv($createCsvFile, $csv);
            }
            fclose($createCsvFile);
        };
        return response()->stream($callback, 200, $headers);
    }
}
