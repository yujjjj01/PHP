<?php

use App\Http\Controllers\Admin\Product\AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Product\ProductLabelController;
use App\Http\Controllers\Admin\Product\ProductTypeController;
// 後台產品
Route::group(["middleware" => "manager", "prefix" => "admin/product"], function () {
    // 產品類別
    Route::group(["prefix" => "types"], function () {
        Route::get("list", [ProductTypeController::class, "list"]);
        Route::get("create", [ProductTypeController::class, "create"]);
        Route::post("store", [ProductTypeController::class, "store"]);
        Route::get("edit/{id}", [ProductTypeController::class, "edit"]);
        Route::post("update", [ProductTypeController::class, "update"]);
        Route::post("delete", [ProductTypeController::class, "delete"]);
    });

    // 產品標籤
    Route::group(["prefix" => "label"], function () {
        Route::get("list", [ProductLabelController::class, "list"]);
        Route::get("create", [ProductLabelController::class, "create"]);
        Route::post("store", [ProductLabelController::class, "store"]);
        Route::get("edit/{id}", [ProductLabelController::class, "edit"]);
        Route::post("update", [ProductLabelController::class, "update"]);
        Route::post("delete", [ProductLabelController::class, "delete"]);
    });

    // 產品

    Route::redirect("product/list", "/admin/product/list");
    Route::get("list", [AdminProductController::class, "list"]);
    Route::get("create", [AdminProductController::class, "create"]);
    Route::post("store", [AdminProductController::class, "store"]);
    Route::get("edit/{id}", [AdminProductController::class, "edit"]);
    Route::post("update", [AdminProductController::class, "update"]);
    Route::post("delete", [AdminProductController::class, "delete"]);
});
