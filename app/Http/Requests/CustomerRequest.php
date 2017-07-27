<?php

namespace App\Http\Requests;

use App\Customer;
use App\Services\CustomerService;
use Illuminate\Foundation\Http\FormRequest;
use Validator;

class CustomerRequest extends FormRequest
{
    protected $create = false;
    protected $createCusOrder = false;
    /**
     * Service construct
     *
     * @return \App\Services\BlackUserService
     */
    public function serviceConstruct()
    {
        return new CustomerService(
            new Customer
        );
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Validator::extend('check_duplicate_phone', function ($attribute, $value, $parameters, $validator) {
            $customer = $this->serviceConstruct()->checkDuplicatePhone($value);
            return $customer ? false : true;
        });

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'company' => 'required'
        ];
        if ($this->create) {
            $rules = [
                'phone' => 'required|min:10|max:15|check_duplicate_phone'
            ] + $rules;
        }

        if ($this->createCusOrder) {
            $rules = [
                'content' => 'required',
                'size' => 'required',
                'phone' => 'required|min:10|max:15',
                'number' => 'required|integer',
                'total_price' => 'required|min:0|integer',
                'deposited' => 'required|min:0|integer',
                'delivery_date' => 'required',
            ] + $rules;
        }

        return $rules;
    }

    /**
     * Custom attributes list
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Họ và Tên',
            'phone' => 'SĐT',
            'address' => 'Địa chỉ',
            'company' => 'Công Ty',
            'size' => 'Kích thước',
            'number' => 'Số lượng',
            'total_price' => 'Thành tiền',
            'deposited' => 'trả trước',
            'delivery_date' => 'Ngày giao',
            'content' => 'Nội dung',
        ];
    }

    /**
     * Custom validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'thông tin cần thiết',
            'address.required' => 'thông tin cần thiết',
            'phone.required' => 'thông tin cần thiết',
            'phone.min' => 'lớn hơn',
            'phone.max' => 'nhỏ hơn',
            'phone.check_duplicate_phone' => 'SDT đã tồn tại',
            'company.required' => 'thông tin cần thiết',
            'size.required' => 'thông tin cần thiết',
            'number.required' => 'thông tin cần thiết',
            'number.integer' => 'thông tin cần thiết',
            'total_price.required' => 'thông tin cần thiết',
            'deposited.required' => 'thông tin cần thiết',
            'delivery_date.required' => 'thông tin cần thiết',
            'content.required' => 'thông tin cần thiết',
        ];
    }

    /**
     * Get validator instance
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $routeName = $this->route()->getName();

        if ($this->isMethod('post')) {
            switch ($routeName) {
                case 'Customer.store':
                    $this->create = true;
                    break;
                case 'Customer.storecusorder':
                    $this->createCusOrder = true;
                    break;
            }
        }

        return parent::getValidatorInstance();
    }

    /**
     * Redirect rules.
     *
     * @return array
     */
    protected function redirectRules()
    {
        return [
            'store' => [
                'action' => 'create',
            ],
            'storerequest' => [
                'action' => 'edit',
            ]
        ];
    }
}
