<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Imports\DataImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Attribute\Entities\Option;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->readFromExcel( public_path('/uploads/Car2520Brands-27-05-2023.xlsx'));
    }

    public function readFromExcel($path)
    {
        DB::beginTransaction();
        try {
            /*
                row = [
                    0 =>    Car Brand == 1
                    1 =>    Car Model == 40
                    2 =>    Year      == 10
                    3 =>    Status    == Active / Inactive == 1 / 0
                ]
            */

            for ($j = 1900; $j <= 2030 ; $j++) {
                Option::create([
                    'attribute_id' => 10,
                    'value' => [
                        'ar'    => $j,
                        'en'    => $j,
                    ],
                    'is_default'    => 0,
                    'status'        => 1,
                ]);
            }

            $rows = Excel::toArray(new DataImport(), $path);
            $data = array_filter(array_slice($rows[0], 1, 10000) , function ($subArray) {
                return $subArray[0] !== null;
            });

            foreach ($data as $item){
                $status = $item[3] == "Inactive" ? 0 : 1;
                $yearArr = [];
                if(str_contains($item[2],'-')){
                    $arr = explode(' - ',$item[2]);
                    for ($i =  $arr[0]; $i <= $arr[1] ; $i++) {
                        $yearObj = Option::where('attribute_id',10)->where('value->en',$i)->first();
                        if($yearObj){
                            $yearArr[] = $yearObj->id;
                        }
                    }
                }else{
                    $yearObj = Option::where('attribute_id',10)->where('value->en',$item[2])->first();
                    if($yearObj){
                        $yearArr[] = $yearObj->id;
                    }
                }

//                if($item[0] == 'Buick' && $item[1] == 'Concept'){
////                    dd(array_unique($yearArr));
//                    dd($status);
//                    dd($item);
//                }

                $brandObj = Option::where('attribute_id',1)->where('value->en',$item[0])->first();
                if(!$brandObj){
                    $brandObj = Option::create([
                        'attribute_id' => 1,
                        'value' => [
                            'ar'    => $item[0],
                            'en'    => $item[0],
                        ],
                        'is_default'    => 0,
                        'status'        => 1,
                        'parent_id'     => 40,
//                        'related_options' => [$modelObj->id],
                    ]);
                }

                $modelObj = Option::where('attribute_id',40)->where('parent_id_option',$brandObj->id)->where('value->en',$item[1])->first();
                if(!$modelObj){
                    $modelObj = Option::create([
                        'attribute_id' => 40,
                        'value' => [
                            'ar'    => $item[1],
                            'en'    => $item[1],
                        ],
                        'is_default'    => 0,
                        'status'        => $status,
                        'parent_id'     => 10,
                        'related_options' => $yearArr,
                        'parent_id_option'  => $brandObj->id,
                    ]);
                }
//                else{
//                    $oldOptions = $modelObj->related_options->all();
//                    $newOptions = array_unique(array_merge($yearArr,$oldOptions));
//                    $modelObj->update(['related_options'=>$newOptions]);
//                }



                $oldOptions = $brandObj->related_options->all();
                $oldOptions[] = $modelObj->id;
                $brandObj->update(['related_options'=>$oldOptions]);
            }

            DB::commit();
//            dd($data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
