<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(CategoryService $categoryService): void
    {
        // Lấy danh sách danh mục từ CategoryService (hoặc bất kỳ dịch vụ nào bạn muốn)
        $categories = $categoryService->getAllCate();

        // Chia sẻ danh mục với tất cả các view trong ứng dụng
        View::share('categoryAllView', $categories);
    }
}