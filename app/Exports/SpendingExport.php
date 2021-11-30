<?php

namespace App\Exports;

use App\Models\RawMaterialImport;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SpendingExport implements FromView,WithHeadings,WithStyles,WithColumnFormatting,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RawMaterialImport::select(['id','name','quantity','unit','price','total','user_id','created_at'])->where(['deleted_at'=>null])->get();
    }
    public function view(): View
    {
        $search= request()->headers->get('referer');
        $search=explode('search?',$search);
        $spending= RawMaterialImport::OrderBy('created_at','desc');

        if (isset($search[1])){
            $search=explode('&',$search[1]);
            $search_params=[];
            foreach ($search as $param){
                $param=explode('=',$param);
                $search_params[$param[0]]=$param[1];
            }

            if (($search_params['create_from'])!=''|| ($search_params['create_to'])!=''){
                if (($search_params['create_from'])==''){
                    $search_params['create_from']='1970-01-01';
                }
                if (($search_params['create_to'])==''){
                    $search_params['create_to']='2100-12-31';
                }
                $from=date('Y-m-d H:i:s',strtotime($search_params['create_from'].' 00:00:00'));
                $to=date('Y-m-d H:i:s',strtotime($search_params['create_to'].' 23:23:59'));
                $spending->whereBetween('created_at',[$from,$to]);
            }
            if (($search_params['status'])!=''){
                $spending->where(['status'=>$search_params['status']]);
            }
            if (($search_params['name'])!=''){
                $spending->where('name','like','%'.$search_params['name'].'%');
            }
            if (($search_params['user_id'])!=''){
                $spending->where(['user_id'=>$search_params['user_id']]);
            }
            if (($search_params['provider_id'])!=''){
                $spending->where(['provider_id'=>$search_params['provider_id']]);
            }
        }

        $spending=$spending->get();
        $data=$spending;
        return view('raw_material_imports.export', [
            'rawMaterialImports' => $data
        ]);
    }
    public function headings(): array
    {
        return [
            'STT',
            'Nội dung',
            'Số lượng',
            'Đơn vị tính',
            'Đơn giá',
            'Thành tiền',
            'Người chi',
            'Ngày chi',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
    }
        public function prepareRows($rows): array
    {
        return array_map(function ($spending) {
            $user=User::query()->where(['id'=>$spending->user_id])->first();
            $spending->user_id=$user->name;
                $spending->created_at=date('d-m-Y H:i',strtotime($spending->created_at));
                $spending->updated_at=date('d-m-Y H:i',strtotime($spending->updated_at));
            return $spending;
        }, $rows);
    }

    public function columnFormats(): array
    {
        return [
            'E' => '#,##0_-',
            'F' => '#,##0_-',
        ];
    }
}
