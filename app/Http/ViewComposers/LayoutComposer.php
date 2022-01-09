<?php
 namespace App\Http\ViewComposers;

use App\Models\Topic;
use Illuminate\View\View;

 class LayoutComposer
 {
     public $layoutData = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
         $this->layoutData['tags'] = Topic::withCount('blog')->get();
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
         $view->with('layoutData', $this->layoutData);
     }
 }