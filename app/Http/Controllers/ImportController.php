<?php

namespace App\Http\Controllers;

use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    //
    public function excel(Request $request){
        $file = $request->file('excelfile');
        $import = new CustomerImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()){
            return response()->json(['error' => $import->failures()]);
        }

    }
}
