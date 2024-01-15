<?php
namespace App\Http\Controllers\AutoGenID;
class AutoIDFunction {
    public function splitID($lastId, $prefix): int {
        return (int) substr($lastId, strlen($prefix));
    }

    public function AutoID($prefix, $model, $primarykeyname){
        $records = $model::orderBy($primarykeyname, 'desc')->get();
        if(count($records)==0){
            return $prefix.'01';
        }
        $lastId= $records[0]->$primarykeyname;
        $lastNumber = $this->splitID($lastId, $prefix);
        $genID = $lastNumber<9?'0'.($lastNumber+1):($lastNumber+1);
        return $prefix.$genID;
    }
}


?>
