<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsTo(User::class, 'user_favorite', 'micropost_id', 'user_id').withTimestamps();
    }
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合

            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }

        return view('welcome', $data);
    }
}