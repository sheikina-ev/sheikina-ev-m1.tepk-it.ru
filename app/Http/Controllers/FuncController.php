<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class FuncController extends Controller
{
    public function calculate(int $productTypeId, int $materialTypeId, int $availMaterial, float $param1, float $param2): int {
        try {
            if ($availMaterial <= 0 || $param1 <= 0 || $param2 <= 0) {
                return -1;
            }
            $productType = ProductType::findOrFail($productTypeId);

            $materialType = MaterialType::findOrFail($materialTypeId);

            // Расчёт количества необходимого сырья на единицу продукции
            $rawPerProduct = $param1 * $param2 * $productType->coefficient;

            // Учет потери материала
            $lossPercent = $materialType->loss;

            $rawWithLoss = $rawPerProduct * (1 + $lossPercent / 100);

            // Вычисление максимального количество продукции
            $productionCount = floor($availMaterial / $rawWithLoss);

            return $productionCount >= 0 ? (int)$productionCount : 0;

        } catch (\Exception $e) {
            return -1;
        }
    }
}

