<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Agency;
use App\Models\Invoice;
use App\Models\Passit;
use App\Models\DetailInvoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
class DetailInvoiceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();

        if(!is_string( $row[7])){
            $client=DB::table('clients')
                    ->where([
                    ['name',$row[2]],
                    ['lastName',$row[1]]
                    ])->first();
            //$out->writeln("client ".is_null($client));        
            if(is_null($client)){
                $client=Client::create([
                    'name'=>$row[2],
                    'lastName'=>$row[1]
                ]);
                $client->save();
            }
            DB::commit();
            $passit=DB::table('passits')
                    ->where([
                    ['type',$row[4]],
                    ])->first();
            
            if(is_null($passit)){
                $passit=Passit::create([
                    'type'=>$row[4],
                    'price'=>$row[7],
                    'unitCost'=>$row[6],
                    'iva'=>10
                ]);
                $passit->save();
            }
            DB::commit();
            $agency=DB::table('agencies')
            ->where('name',$row[3])
            ->first();
            if(is_null($agency)){
                $agency=Agency::create([
                    'name'=>$row[3],
                ]);
                $agency->save();
            }
          
            DB::commit();
            $invoice=Invoice::create([
                'date'=>date("Y-m-d", strtotime($row[10])),
                'haveSouce'=>$row[8],
            ]);
            $invoice->save();
            
            DB::commit();
            
            return new DetailInvoice([
                    'client_id'=>$client->id,
                    'agency_id'=>$agency->id,
                    'invoice_id'=>$invoice->id,
                    'passit_id'=>$passit->id,
                    'amountPassits'=>$row[5],
                    'priceTotal'=>$row[9]
            ]);

        }
        
    }
}
