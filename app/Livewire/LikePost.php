<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post){
       $this->isLiked = $post->checkLike(auth()->user());
       $this->likes = $post->likes()->count(); 
    }

    public function like()
    {
        if($this->post->checkLike(auth()->user())){
            $this->post->likes()->where('user_id', $this->post->user_id)->delete();
            $this->isLiked = false;
            $this->likes--;
        }else{
            Like::create([
                'user_id' => auth()->user()->id,
                'post_id' => $this->post->id,
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
