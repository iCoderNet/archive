<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Appeal;

class AppealController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Appeal';

    protected $dataSettings = [
        'appeal'=>[
            'name'=>'Appeal',
            'color'=>'red',
        ],
        'suggestion'=>[
            'name'=>'Suggestion',
            'color'=>'green',
        ],
        'question'=>[
            'name'=>'Question',
            'color'=>'blue',
        ],
        'read_status'=>[
            '1'=> [
                'name'=>'Unread',
                'color'=>'orange',
                'icon'=>'icon-envelope',
            ],
            '2'=> [
                'name'=>'Read',
                'color'=>'silver',
                'icon'=>'icon-envelope-open',
            ],

            'list'=>[
                '1'=>'Unread',
                '2'=>'Read',
            ]
        ],
    ];

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Appeal());
        $dataSettings = $this->dataSettings;

        $grid->model()->orderBy('created_at', 'desc');

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('subject', __('Subject'))->display(function ($subject) use ($dataSettings) {
            $color = isset($dataSettings[$subject]['color']) ? $dataSettings[$subject]['color'] : 'black';
            $name = isset($dataSettings[$subject]['name']) ? $dataSettings[$subject]['name'] : $subject;
            return "<span style='font-weight: bold; color: $color';>$name</span>";
        });
        $grid->column('status', __('Status'))->display(function ($status) use ($dataSettings) {
            $color = isset($dataSettings['read_status'][$status]['color']) ? $dataSettings['read_status'][$status]['color'] : 'black';
            $icon = isset($dataSettings['read_status'][$status]['icon']) ? $dataSettings['read_status'][$status]['icon'] : 'icon-window-close';
            $name = isset($dataSettings['read_status'][$status]['name']) ? $dataSettings['read_status'][$status]['name'] : $status;
            return "<i class='$icon' style='color: $color';></i> <span style='font-weight: bold; color: $color';>$name</span>";
        });
        $grid->column('created_at', __('Created at'))->display(function ($createdAt) {
            return \Carbon\Carbon::parse($createdAt)->format('d.m.Y - H:i:s');
        });

        $grid->filter(function($filter) {
            $filter->like('name', __('Name'));
            $filter->like('email', __('Email'));
            $filter->like('phone', __('Phone'));
            $filter->like('subject', __('Subject'));
            $filter->equal('status', __('Status'))->select($this->dataSettings['read_status']['list']);
        });

        $grid->actions(function ($actions) {
            $actions->disableEdit();
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
        $appeal = Appeal::findOrFail($id);

        // Update status to "Read" if it is currently "Unread"
        if ($appeal->status == 1) {
            $appeal->status = 2;
            $appeal->save();
        }
        
        $show = new Show(Appeal::findOrFail($id));
        $dataSettings = $this->dataSettings;

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('message', __('Message'));
        $show->field('subject', __('Subject'))->as(function ($subject) use ($dataSettings) {
            $color = isset($dataSettings[$subject]['color']) ? $dataSettings[$subject]['color'] : 'black';
            $name = isset($dataSettings[$subject]['name']) ? $dataSettings[$subject]['name'] : $subject;
            return "<span style='font-weight: bold; color: $color;'>$name</span>";
        })->unescape();
        $show->field('status', __('Status'))->as(function ($status) use ($dataSettings) {
            $color = isset($dataSettings['read_status'][$status]['color']) ? $dataSettings['read_status'][$status]['color'] : 'black';
            $icon = isset($dataSettings['read_status'][$status]['icon']) ? $dataSettings['read_status'][$status]['icon'] : 'icon-window-close';
            $name = isset($dataSettings['read_status'][$status]['name']) ? $dataSettings['read_status'][$status]['name'] : $status;
            return "<i class='$icon' style='color: $color';></i> <span style='font-weight: bold; color: $color';>$name</span>";
        })->unescape();
        
        $show->field('created_at', __('Created at'))->as(function ($createdAt) {
            return \Carbon\Carbon::parse($createdAt)->format('d.m.Y - H:i:s');
        });
        $show->field('updated_at', __('Updated at'))->as(function ($updatedAt) {
            return \Carbon\Carbon::parse($updatedAt)->format('d.m.Y - H:i:s');
        });
        
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Appeal());

        // $form->text('name', __('Name'));
        // $form->email('email', __('Email'));
        // $form->text('phone', __('Phone'));
        // $form->text('subject', __('Subject'));
        // $form->text('message', __('Message'));

        return $form;
    }
}
