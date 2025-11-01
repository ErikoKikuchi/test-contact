<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    public function getGenderTextAttribute(){
        return match($this->gender){
        1 => '男性',
        2 => '女性',
        3 => 'その他',
        };
    }
    public function getCategoryIdTextAttribute(){
        return match($this->category_id){
        1 => '商品のお届けについて',
        2 => '商品の交換について',
        3 => '商品トラブル',
        4 => 'ショップへのお問い合わせ',
        5 => 'その他',
        default=> '不明',
    };
    }
    public function scopeCategorySearch($query, $category_id)
    {
    if (!empty($category_id)) {
        $query->where('category_id', $category_id);
    }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
    if (!empty($keyword)) {
        $query->where('content', 'like', '%' . $keyword . '%');
    }
    }

    public function scopeGenderSearch($query, $gender)
    {
    if (!empty($gender)) {
        $query->where('gender', $gender);
    }
    }
    public function scopeCreatedAtSearch($query, $created_at)
    {
    if (!empty($created_at)) {
        $query->where('created_at', $created_at);
    }
            return $query;
}
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}