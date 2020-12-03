<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $items = Company::all();
        return view('rgst.company.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('rgst.company.add');
    }

    public function add_confirmation(CompanyRequest $request) {

    }

    public function create(CompanyRequest $request) {
        $company = new Company;
        $form = $request->all();
        // $request->session()->put('items', $values);
        unset($form['_token']);
        $company->fill($form)->save();
        return redirect('/rgst/company');
    }

    
    public function edit(Request $request) {
        $company = Company::find($request->id);
        return view('rgst.company.edit', ['form' => $company]);
    }

    public function update(Request $request) {
        $company = Company::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $company->fill($form)->save();
        return redirect('/rgst/company');
    }

    public function delete(Request $request) {
        $company = Company::find($request->id);
        return view('rgst.company.del', ['form' => $company]);
    }

    public function remove(Request $request) {
        Company::find($request->id)->delete();
        return redirect('/rgst/company');
    }

    public function get_items(Request $request)
    {
        $values = $request->all();
        unset($values['_token']);
        $request->session()->put('items', $values);
        $sesdata = $request->session()->get('items');
        $items = Company::find($sesdata);
        return view('rgst.company.get_items', ['items' => $items]);
    }

    public function export_csv(Request $request)
    {
        $headers = [ //ヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=company_csvexport.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function() use ($request)
            {
                $createCsvFile = fopen('php://output', 'w'); //※fopenチェック
                $columns = [ //1行目の情報
                    'ID',
                    '4レター',
                    '会社形態',
                    '名前',
                    '名前(ふりがな)',
                    '名前(英語)',
                    '郵便番号',
                    '住所',
                    '電話番号',
                    '短縮',
                    'FAX番号',
                    'Eメール',
                    '担当者',
                    '担当者携帯',
                    '備考',
                    '初回登録者',
                    '更新登録者',
                    '初回登録日時',
                    '更新登録日時',
                ];	
            mb_convert_variables('SJIS-win', 'UTF-8', $columns);
            fputcsv($createCsvFile, $columns);
            $sesdata = $request->session()->get('items');
            $items = Company::find($sesdata);
            foreach ($items as $item)
            {
                $csv = [
                    $item->id,
                    $item->four_letter,
                    $item->company_form,
                    $item->name,
                    $item->name_ruby,
                    $item->name_eng,
                    $item->postcode,
                    $item->address,
                    $item->tel,
                    $item->short_num,
                    $item->fax,
                    $item->email,
                    $item->incharge,
                    $item->incharge_phone,
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
