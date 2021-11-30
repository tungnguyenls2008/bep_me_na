<?php

namespace App\Exports;

use App\Models\CheckoutOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CheckoutOrderExport implements FromView,WithHeadings,WithStyles,WithColumnFormatting,ShouldAutoSize
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
        $search= request()->headers->get('referer');
        $search=explode('search?',$search);
        $checkoutOrders= CheckoutOrder::where(['deleted_at'=>null])->OrderBy('created_at','desc');

        if (isset($search[1])){
            $search=explode('&',$search[1]);
            $search_params=[];
            foreach ($search as $param){
                $param=explode('=',$param);
                $search_params[$param[0]]=$param[1];
            }
            if (($search_params['bill_code'])!=''){
                $checkoutOrders->where('bill_code','like','%'.$search_params['bill_code'].'%');
            }
            if (($search_params['customer_info'])!=''){
                $checkoutOrders->where('customer_info','like','%'.$search_params['customer_info'].'%');
            }
            if (($search_params['user_id'])!=''){
                $checkoutOrders->where(['user_id'=>$search_params['user_id']]);
            }
            if (($search_params['regular_customer_id'])!=''){
                $checkoutOrders->where(['regular_customer_id'=>$search_params['regular_customer_id']]);
            }
            if (($search_params['status'])!=''){
                $checkoutOrders->where(['status'=>$search_params['status']]);
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
                $checkoutOrders->whereBetween('created_at',[$from,$to]);
            }
        }

        $checkoutOrders=$checkoutOrders->get();
        return view('checkout_orders.export', [
            'checkoutOrders' => $checkoutOrders
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
    public function columnFormats(): array
    {
        return [
            'C' => '#,##0_-',
        ];
    }
}
