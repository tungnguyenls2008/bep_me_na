<?php

namespace App\Exports;

use App\Models\RawMaterialImport;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SpendingExport implements FromView,WithHeadings,WithStyles
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
        return view('raw_material_imports.export', [
            'rawMaterialImports' => RawMaterialImport::where(['deleted_at'=>null])->get()
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
}
