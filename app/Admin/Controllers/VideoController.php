<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Video;

class VideoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Video';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Video());

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
        $show = new Show(Video::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('url', __('Url'))->link();
        $show->field('video', __('Video'));
        $show->field('cover', __('Cover'))->image();
        $show->field('duration', __('Duration'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Video());

        $form->text('title', __('Title'));
        $form->url('url', __('Url'));
        $form->file('video', __('Video'))
        ->removable()
        ->move('videos');
        $form->image('cover', __('Cover'));
        $form->text('duration', __('Duration'));
        $form->text('description', __('Description'));

        return $form;
    }
}
