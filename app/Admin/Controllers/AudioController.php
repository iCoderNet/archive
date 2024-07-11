<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Audio;
use App\Models\Category;

class AudioController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Audio';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Audio());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('duration', __('Duration'));

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
        $show = new Show(Audio::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('audio', __('Audio'))->file();
        $show->field('duration', __('Duration'));
        $show->field('category_id', __('Category'))->as(function ($categoryId) {
            return Category::find($categoryId)->name ?? '';
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
        $form = new Form(new Audio());

        $form->text('title', __('Title'));
        $form->file('audio', __('Audio'))
                    ->removable()
                    ->move('audios');
        $form->text('duration', __('Duration'));
        $form->select('category_id', __('Category'))->options(
            Category::all()->pluck('name', 'id')
        );

        return $form;
    }
}
