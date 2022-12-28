<?php

namespace App\Imports;

use App\Models\Dato;
use App\Models\Client;
use App\Models\Agency;
use App\Models\Invoice;
use App\Models\Passit;
use App\Models\DetailInvoice;
use Maatwebsite\Excel\Concerns\ToModel;

class DatosImport implements ToModel
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
                'name'=>$row[1],
                'lastName'=>$row[2]
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
            
            $detailInvoice=DetailInvoice::create([
                'client_id'=>$client->id,
                'agency_id'=>$agency->id,
                'invoice_id'=>$invoice->id,
                'passit_id'=>$passit->id,
                'priceTotal'=>$row[9]
            ]);
    
            return new Dato([
            'name'=>$row[1]
            ]);
        }
    }
}
