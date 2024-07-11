<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\PhotoArticle;

class PhotoArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PhotoArticle';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PhotoArticle());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));

        $grid->filter(function($filter) {
            $filter->like('title', 'Title');
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
        $show = new Show(PhotoArticle::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->photos('Photos', function ($photo) {
            $photo->image('image', __('Photo'))->image();

            $photo->disableCreateButton();
            $photo->disableActions();
            $photo->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                $actions->disableView();
            });
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
        $form = new Form(new PhotoArticle());

        // Now form title value will be stored in $form->model()->title

        $form->text('title', __('Title'))->required();

        $form->hasMany('photos', function (Form\NestedForm $form) {
            $form->image('image', __('Photo'))->required();
            $form->ckeditor('description', __('Description'));
            $form->select('category_id', __('Category'))->options(
                Category::all()->pluck('name', 'id')
            );
        });

        return $form;
    }
}
