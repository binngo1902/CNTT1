<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class CustomerImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnError,SkipsOnFailure
{
    use Importable,SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            //
            'customer_name' => $row['name'],
            'email' => $row['email'],
            'tel_num' => $row['telnum'],
            'address' => $row['address']


        ]);
    }


    public function rules(): array
    {
        return [
            '*.name' => ['required','min:6'],
            '*.email' => ['required','email','unique:mst_customer,email'],
            '*.telnum' => ['required','regex:/^[0-9]{10}$/'],
            '*.address' => ['required']
        ];

    }
    public function customValidationMessages()
        {
            return [
                'name.required' => 'Vui lòng nhập tên khách hàng',
                'name.min' => 'Tên khách hàng phải nhiều hơn 5 ký tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã được đăng ký',
                'telnum.required' => 'Điện thoại không được để trống',
                'telnum.regex' => 'Số điện thoại phải là số và có 10 số',
                'address.required' => 'Địa chỉ không được để trống',
            ];
    }


}
