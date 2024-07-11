<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Article;
use \App\Models\Region;
use \App\Models\Category;
use \App\Models\Topic;
use \App\Models\Location;


class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image();
        $grid->column('title', __('Title'));
        // $grid->column('description', __('Description'));
        $grid->column('category_id', __('Category'))->display(function ($categoryId) {
            return Category::find($categoryId)->name ?? '';
        });
        $grid->column('region_id', __('Region'))->display(function ($regionId) {
            return Region::find($regionId)->name ?? '';
        });
        $grid->column('topic_id', __('Topic'))->display(function ($topicId) {
            return Topic::find($topicId)->name ?? '';
        });
        $grid->column('location_id', __('Location'))->display(function ($locationId) {
            return Location::find($locationId)->name ?? '';
        });
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));


        // FILTERS
        $grid->filter(function($filter) {
            $filter->like('title', 'Title');
            $filter->equal('category_id', 'Category')->select(Category::all()->pluck('name', 'id'));
            $filter->equal('region_id', 'Region')->select(Region::all()->pluck('name', 'id'));
            $filter->equal('topic_id', 'Topic')->select(Topic::all()->pluck('name', 'id'));
            $filter->equal('location_id', 'Location')->select(Location::all()->pluck('name', 'id'));
            $filter->between('created_at', 'Created at')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('title', __('Title'));
        $show->field('description', __('Description'))->unescape();
        $show->field('category_id', __('Category'))->as(function ($categoryId) {
            return Category::find($categoryId)->name ?? '';
        });
        $show->field('region_id', __('Region'))->as(function ($regionId) {
            return Region::find($regionId)->name ?? '';
        });
        $show->field('topic_id', __('Topic'))->as(function ($topicId) {
            return Topic::find($topicId)->name ?? '';
        });
        $show->field('location_id', __('Location'))->as(function ($locationId) {
            return Location::find($locationId)->name ?? '';
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->text('title', __('Title'));
        $form->ckeditor('description', __('Description'));
        $form->image('image', __('Image'));
        $form->select('category_id', __('Category'))->options(
            Category::all()->pluck('name', 'id')
        );
        $form->select('region_id', __('Region'))->options(
            Region::all()->pluck('name', 'id')
        );
        $form->select('topic_id', __('Topic'))->options(
            Topic::all()->pluck('name', 'id')
        );
        $form->select('location_id', __('Location'))->options(
            Location::all()->pluck('name', 'id')
        );

        return $form;
    }
}
