<?php

class WireController extends Controller {

    private $db;
    public $category;
    public $region;

    public function __construct($model){

        if(isset($category)){
            $this->set_category($category);
        }

        if(isset($region)){
            $this->region = $region;
        }

        $this->bindData('title', 'Wire');

        $this->template = 'wire.html';

        parent::__construct($model);

    }

    public function set_category($cat_id){
        $this->category = $cat_id;
    }

    public function loadStream($cat_name, $start){

        $this->set_category($this->model->get_category_id($cat_name));
        $this->template = 'wire_stream.html';
        $this->bindData('stories',$this->model->get_stories($start, $this->category));
        $this->render();

    }

    public function display($cat = 'all'){

        $this->user->authenticate('wire');

        $this->bindData('cur_category', $cat);
        $this->bindData('action', 'load');
        $this->bindData('categories', $this->model->get_categories());
        //$this->bindData('new_stories_day', $this->model->get_stats_24hr());
        //$this->bindData('new_stories_week', $this->model->get_stats_week());
        //$this->bindData('new_stories_month', $this->model->get_stats_month());
        $this->bindData('user_rank', $this->user->get_rank());

        $this->render();
        
    }

    public function search(){

        $this->user->authenticate('wire');
        $this->bindData('user_rank', $this->user->get_rank());

        if ( isset($_GET['q'])){
            $this->bindData('query', $_GET['q']);
        }
                
        $this->bindData('action', 'search');
        $this->bindData('categories', $this->model->get_categories());
        $this->render();

    }

    public function loadSearch(){

        if ( isset($_GET['start'])){
            $start = $_GET['start'];
        } else {
            $start = 0;
        }

        if ( isset($_GET['q'])){
            $query = $_GET['q'];
            $this->bindData('stories', $this->model->search_stories($start, $query));
        }

        $this->template = 'wire_stream.html';
        $this->render();
    }
}

