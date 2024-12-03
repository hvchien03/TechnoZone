<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CustomerRequest;
class CustomerController extends Controller
{
    public function index()
    {
        $addressKey = config('services.external_api.address_key');
        $customers = User::where('role', 'user')->get();
        return view('admin.customer.index', compact('customers', 'addressKey'));
    }

    public function create()
    {
        $addressKey = config('services.external_api.address_key');
        return view('admin.customer.create', compact('addressKey'));
    }
    public function store(CustomerRequest $request)
    {
        try {
            $data = $request->validated();

            $existingEmail = User::where('email', $data['email'])->exists();
            $existingPhone = User::where('phone', $data['phone'])->exists();
            $errors = [];
            if ($existingPhone) {
                $errors['phone'] = 'Số điện thoại đã được sử dụng.';
            }

            if ($existingEmail) {
                $errors['email'] = 'Email đã được sử dụng.';
            }

            if (count($errors) > 0) {
                return response()->json([
                    'success' => false,
                    'errors' => $errors
                ], 422);
            }

            $data['password'] = '123456';
            $data['role'] = 'user';
            $customer = User::create($data);

            return response()->json([
                'success' => true,
                'redirectUrl' => route('customer.index')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    public function update(CustomerRequest $request)
    {
        try {
            $data = $request->validated();
            $customerId = $request->input('customer_id');
            $customer = User::find($customerId);

            $existingEmail = false;
            $existingPhone = false;

            if ($data['email'] !== $customer->email) {
                $existingEmail = User::where('email', $data['email'])
                    ->where('_id', '!=', $customerId)
                    ->exists();
            }

            if ($data['phone'] !== $customer->phone) {
                $existingPhone = User::where('phone', $data['phone'])
                    ->where('_id', '!=', $customerId)
                ->exists();
            }

            $errors = [];
            if ($existingPhone) {
                $errors['phone'] = 'Số điện thoại đã được sử dụng.';
            }

            if ($existingEmail) {
                $errors['email'] = 'Email đã được sử dụng.';
            }

            if (count($errors) > 0) {
                return response()->json([
                    'success' => false,
                    'errors' => $errors
                ], 422);
            }

            $customer = User::findOrFail($customerId);
            $customer->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'address' => $data['address']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật thành công',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
}
