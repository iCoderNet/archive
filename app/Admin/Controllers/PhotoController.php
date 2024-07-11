<?php
namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\PhotoArticle;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Show;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;

class PhotoController extends AdminController
{
    protected $title = 'Photos';

    protected function grid()
    {
        $grid = new Grid(new Photo());

        $grid->column('id', __('ID'));
        $grid->column('photoarticle_id', __('Photo Article'))->display(function ($photoarticle_id) {
            return PhotoArticle::find($photoarticle_id)->title ?? '';
        });
        $grid->column('image', __('Photo'))->image();

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Photo::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('photoarticle_id', __('Photo Article'))->as(function ($photoarticle_id) {
            return PhotoArticle::find($photoarticle_id)->title ?? '';
        });
        $show->field('image', __('Photo'))->image();
        $show->field('description', __('Description'))->unescape();
        $show->field('category_id', __('Category'))->as(function ($categoryId) {
            return Category::find($categoryId)->name ?? '';
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Photo());

        $form->select('photoarticle_id', __('PhotoArticle ID'))->options(
            \App\Models\PhotoArticle::all()->pluck('title', 'id')
        )->required();
        $form->image('image', __('URL'))->required();
        $form->ckeditor('description', __('Description'));
        $form->select('category_id', __('Category'))->options(
            Category::all()->pluck('name', 'id')
        );
        return $form;
    }
}
