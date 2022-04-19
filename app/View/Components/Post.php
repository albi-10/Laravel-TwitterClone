<?php

namespace App\View\Components;



use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $post;
    public $user;

    public function __construct($post, $user)
    {
        $this->post = $post;
        $this->user= $user;
    }

    public function excerpt($post, $limit = 5)
    {
        return Str::limit($post, $limit);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $posts = this->$user->posts()->with(['user','likes'])->paginate(5);
        return view('components.post',compact('posts'));
    }
}
