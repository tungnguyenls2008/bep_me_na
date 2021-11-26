<?php

namespace App\Exports;

use App\Models\CheckoutOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CheckoutOrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CheckoutOrder::where(['deleted_at'=>null])->get();
    }
    public function view(): View
    {
        $checkoutOrder=CheckoutOrder::where(['deleted_at'=>null])->get();
        return view('checkout_orders.export', [
            'checkoutOrders' => $checkoutOrder
        ]);
    }
    public function headings(): array
    {
        return [
            'STT',
            'Số hóa đơn',
            'Tổng hóa đơn',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
    }
//    public function prepareRows($rows): array
//    {
//        return array_map(function ($profile) {
//            if ($profile->gender==1){
//                $profile->gender='Male';
//            }elseif ($profile->gender==0){
//                $profile->gender='Female';
//            }
//            if ($profile->user_type==1){
//                $profile->user_type='Personal';
//            }elseif ($profile->user_type==2){
//                $profile->user_type='Company';
//            }
////            try {
////                $profile->created_at=Carbon::createFromTimestamp(strtotime($profile->created_at))->format('d/m/Y H:i');
////                $profile->updated_at=Carbon::createFromTimestamp(strtotime($profile->updated_at))->format('d/m/Y H:i');
////                $profile->time_to_revex=Carbon::createFromTimestamp(strtotime($profile->time_to_revex)!=false?strtotime($profile->time_to_revex):0)->format('d/m/Y H:i');
////            }catch (Exception $ex){
////
////            };
//
//            return $profile;
//        }, $rows);
//    }
}
