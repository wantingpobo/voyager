<?php

namespace App\Widgets;

use voyager;
use App\Models\Article;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ArticleDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Article::count();
        // $string = trans_choice('voyager::dimmer.user', $count);
        $string = "文章數量:" . $count;

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$string}",
            'text'   => "目前文章為" . $count . "篇",
            'button' => [
                'text' => "顯示文章",
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/04.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
