<?php
namespace App\Services;
use App\Models\Promotion;
use App\Models\Product;
class PromotionService
{
    public function getAll(){
        return Promotion::all();
    }
    public function create($data){
        return Promotion::create($data);
    }
    public function update($id, $data){
        $promotion = $this->find($id);
        $promotion->update($data);
        return $promotion;
    }
    public function delete($id){
        $promotion = $this->find($id);
        return $promotion->delete();
    }
    public function find($id){
        if($id == null){
            throw new \Exception('Id is required');
        }
        $promotion = Promotion::find($id);
        if($promotion == null){
            throw new \Exception('Promotion not found');
        }
        return $promotion;
    }

    public function getProductsPromotion($id){
        $promotion = $this->find($id);
        return Product::whereIn('id', $promotion->products)->get();
    }

    public function getProductNotPromotion($id){
        $promotion = $this->find($id);
        return Product::whereNotIn('id', $promotion->products)->get();
    }

    public function getPromotionByDate($date){
        return Promotion::where('startDate', '<=', $date)->where('endDate', '>=', $date)->get();
    }
}