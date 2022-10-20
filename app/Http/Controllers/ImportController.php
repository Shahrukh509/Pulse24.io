<?php

namespace App\Http\Controllers;

use App\Models\UploadAssignNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ImportController extends Controller
{
    private $rows = [];

      public function import(Request $request)
    {



        $path = $request->file('file')->getRealPath();
        $records = array_map('str_getcsv', file($path));

        if (!count($records) > 0) {
            return 'Error...';
        }

        // Get field names from header column

        // dd($records);

        $fields = array_map('strtolower', $records[0]);

        // Remove the header column
        array_shift($records);

        foreach ($records as $record) {
            if (count($fields) != count($record)) {
                return 'csv_upload_invalid_data';
            }

            // Decode unwanted html entities
            $record =  array_map("html_entity_decode", $record);

            // Set the field name as key
            $record = array_combine($fields, $record);

            // Get the clean data
            $this->rows[] = $this->clear_encoding_str($record);
        }

        // dd($this->rows);
        $uploadnumber = '';
        if($request->name == 'yes' || $request->phone == 'yes' || $request->mobile == 'yes' || $request->email == 'yes' || $request->address == 'yes')
        {
            foreach ($this->rows as $data) {
            
            if($request->name == 'yes')
            {
                $name = $data['name'];   
            }else
            {
                $name = null;
            }
            if($request->phone == 'yes')
            {
                $phone = $data['phone'];   
            }else
            {
                $phone = null;
            }
            if($request->mobile == 'yes')
            {
                $mobile = $data['mobile'];   
            }else
            {
                $mobile = null;
            }
            if($request->email == 'yes')
            {
                $email = $data['email'];   
            }else
            {
                $email = null;
            }
            if($request->address == 'yes')
            {
                $address = $data['address'];   
            }else
            {
                $address = null;
            }
            
            
           $uploadnumber =  UploadAssignNumber::create([
                            'name' => $name,
                            'phone' => $phone,
                            'mobile' => $mobile,
                            'email' => $email,
                            'address' => $address,
                            'status' => 1,
                            'country_code' => null,
                            'date' => $request->date,

                        ]);

           

           }
        }
        
           
          
           if($uploadnumber)
           {
                Session::flash('message', 'data added successfully!'); 
                Session::flash('success', 'alert-success');
           }else
           {
               Session::flash('message', 'atleast one must be Checked!'); 
               Session::flash('error', 'alert-danger');
           }


               return back();

        
    }
    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
}
