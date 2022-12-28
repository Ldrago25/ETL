<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Agency;
use App\Models\Invoice;
use App\Models\Passit;
use App\Models\DetailInvoice;
use Maatwebsite\Excel\Concerns\ToModel;

class DetailInvoiceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if(!is_string( $row[7])){
            $client=Client::create([
                'name'=>$row[2],
                'lastName'=>$row[1]
            ]);
                
            $passit=Passit::create([
                'type'=>$row[4],
                'price'=>$row[7],
                'unitCost'=>$row[6],
                'iva'=>10
            ]);
        
            $agency=Agency::create([
                'name'=>$row[3],
            ]);
        
            $invoice=Invoice::create([
                'date'=>date("Y-m-d", strtotime($row[10])),
                'amountPassits'=>$row[5],
                'haveSouce'=>$row[8],
            ]);
                
            return new DetailInvoice([
                'client_id'=>$client->id,
                'agency_id'=>$agency->id,
                'invoice_id'=>$invoice->id,
                'passit_id'=>$passit->id,
                'priceTotal'=>$row[9]
            ]);
        
        }
        
    }
}
