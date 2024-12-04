<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    protected $apiUrl = 'https://provinces.open-api.vn/api';

    public function getProvinces()
    {
        try {
            $provinces = Cache::remember('provinces', 60 * 60, function () {
                $response = Http::timeout(5)->get($this->apiUrl . '/p');

                if ($response->failed()) {
                    Log::error('API trả về lỗi:', [
                        'status' => $response->status(),
                        'body' => $response->body()
                    ]);
                    throw new \Exception('API không phản hồi thành công');
                }

                Log::info('API provinces gọi thành công', ['status' => $response->status()]);
                return $response->json();
            });

            return response()->json($provinces);
        } catch (\Exception $e) {
            Log::error('Lỗi trong getProvinces:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => true,
                'message' => 'Không thể lấy danh sách tỉnh thành'
            ], 500);
        }
    }
    public function getDistricts($province)
    {
        try {
            $districts = Cache::remember("districts_{$province}", 60 * 60, function () use ($province) {
                $response = Http::timeout(5)->get($this->apiUrl . "/p/{$province}?depth=2");

                if ($response->failed()) {
                    Log::error('API districts trả về lỗi:', [
                        'status' => $response->status(),
                        'body' => $response->body()
                    ]);
                    throw new \Exception('API không phản hồi thành công');
                }

                Log::info('API districts gọi thành công', ['status' => $response->status()]);
                return $response->json()['districts'];
            });

            return response()->json($districts);
        } catch (\Exception $e) {
            Log::error('Lỗi trong getDistricts:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'error' => true,
                'message' => 'Không thể lấy danh sách quận huyện'
            ], 500);
        }
    }

    public function getWards($district)
    {
        try {
            $wards = Cache::remember("wards_{$district}", 60 * 60, function () use ($district) {
                $response = Http::timeout(5)->get($this->apiUrl . "/d/{$district}?depth=2");

                if ($response->failed()) {
                    Log::error('API wards trả về lỗi:', [
                        'status' => $response->status(),
                        'body' => $response->body()
                    ]);
                    throw new \Exception('API không phản hồi thành công');
                }

                Log::info('API wards gọi thành công', ['status' => $response->status()]);
                return $response->json()['wards'];
            });

            return response()->json($wards);
        } catch (\Exception $e) {
            Log::error('Lỗi trong getWards:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'error' => true,
                'message' => 'Không thể lấy danh sách phường xã'
            ], 500);
        }
    }
}