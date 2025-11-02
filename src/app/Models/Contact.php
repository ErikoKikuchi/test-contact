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
        return $query;
    }

    public function scopeKeywordSearch($query, $keyword)
    {
    if (!empty($keyword)) {
        $query->where(function ($q) use ($keyword) {
        $q->where('first_name', 'like', '%' . $keyword . '%')
            ->orWhere('last_name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%');
    });
    } return $query;
    }

    public function scopeGenderSearch($query, $gender)
    {
    if (!empty($gender)) {
        $query->where('gender', $gender);
    }
        return $query;
    }
    public function scopeDateSearch($query, $date)
    {
    if (!empty($date)) {
        $query->whereDate('created_at', $date);
    }
        return $query;
}
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}