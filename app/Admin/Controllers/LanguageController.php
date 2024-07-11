<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Person;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use OpenAdmin\Admin\Grid;
use App\Models\LanguageLine;
use OpenAdmin\Admin\Show;
use Illuminate\Support\Str;

class LanguageController extends Controller
{

    public function pages(){
        return redirect()->route('admin.language.index');
    }

    public function index(Content $content)
    {
        $pages = LanguageLine::all();
        $tabrow = "";
        $tabrow_ = [];
        foreach ($pages as $page) {
            if (!in_array($page->group, $tabrow_)) {
                $tabrow_[] = $page->group;
                $tabrow .= '<tr data-key="1" class="row-1">
                                <td class="column-group">
                                    <a href="'.route('admin.languages.pagesGR', $page->group).'">'.$page->group.'</a>
                                </td>
                            </tr>';
            }
        }
        $html = '<div class="card p-0">
                    <div class="container-fluid card-header no-border">
                        <div class="row">
                            <div class="col-auto me-auto">
                                <a href="'.route('admin.language.create').'" class="btn btn-sm btn-success me-1 grid-create-btn"
                                    title="New">
                                    <i class="icon-plus"></i><span class="hidden-xs">New</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" autocomplete="off">
                        <table class="table grid-table table-sm table-hover select-table">
                            <thead>
                                <tr>
                                    <th class="column-group">Pages</th>
                                </tr>
                            </thead>
                            '.$tabrow.'
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>';

        return $content
            ->title('Languages')
            ->description('Pages')
            ->body($html);
    }

    public function pagesGR($group, Content $content)
    {
        $pages = LanguageLine::all()->where('group', $group);
        if (count($pages) == 0) {
            return redirect()->route('admin.language.index');
        }
        $tabrow = "";
        foreach ($pages as $page) {
            $ml = json_decode($page->text);
            $enText = isset($ml->en) ? $ml->en : 'N/A';
            $ruText = isset($ml->ru) ? $ml->ru : 'N/A';
            $deText = isset($ml->de) ? $ml->de : 'N/A';
            $tabrow .= '<tr data-key="1" class="row-1">
                            <td class="column-group">
                                <a href="'.route('admin.language.edit', $page->id).'">'.$page->key.'</a>
                            </td>
                            <td class="column-group">
                                '.Str::words($enText, 10).'
                            </td>
                            <td class="column-group">
                                '.Str::words($ruText, 10).'
                            </td>
                            <td class="column-group">
                                '.Str::words($deText, 10).'
                            </td>
                        </tr>';
        }
        $html = '<div class="card p-0">
                    <div class="table-responsive" autocomplete="off">
                        <div class="container-fluid card-header no-border">
                            <div class="row">
                                <div class="col-auto me-auto">
                                    <a href="'.route('admin.language.create').'?page='.$group.'" class="btn btn-sm btn-success me-1 grid-create-btn"
                                        title="New">
                                        <i class="icon-plus"></i><span class="hidden-xs">New</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table grid-table table-sm table-hover select-table">
                            <thead>
                                <tr>
                                    <th class="column-group">Key</th>
                                    <th class="column-group">EN</th>
                                    <th class="column-group">RU</th>
                                    <th class="column-group">DE</th>
                                </tr>
                            </thead>
                            '.$tabrow.'
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>';

        return $content
            ->title('Language Pages')
            ->description(ucfirst(strtolower($group)))
            ->body($html);
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(LanguageLine::findOrFail($id));
        $text = json_decode(LanguageLine::findOrFail($id)->text);
        $enText = isset($text->en) ? $text->en : 'N/A';
        $ruText = isset($text->ru) ? $text->ru : 'N/A';
        $deText = isset($text->de) ? $text->de : 'N/A';

        $show->field('id', __('Id'));
        $show->field('group', __('Group'));
        $show->field('key', __('Key'));
        $show->field('ENGLISH', __('ENGLISH'))->as(function ($value) use ($enText) {
            return $enText;
        });
        $show->field('RUSSIAN', __('RUSSIAN'))->as(function ($value) use ($ruText) {
            return $ruText;
        });
        $show->field('GERMAN', __('GERMAN'))->as(function ($value) use ($deText) {
            return $deText;
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));


        return $show;
    }

    public function show($id, Content $content)
    {
        return $content
            ->title('Word Detail')
            ->description('Detail of word entry')
            ->body($this->detail($id));
    }

    protected function form($id = null, $page=null)
    {
        $form = new Form(new LanguageLine());

        if ($id) {
            $languageLine = LanguageLine::findOrFail($id);
            $text = json_decode($languageLine->text);
            $enText = isset($text->en) ? $text->en : '';
            $ruText = isset($text->ru) ? $text->ru : '';
            $deText = isset($text->de) ? $text->de : '';

            $form->text('group', __('Page'))->default($languageLine->group);
            $form->text('key', __('Key'))->default($languageLine->key);
            $form->text('text.en', __('English'))->default($enText);
            $form->text('text.ru', __('Russian'))->default($ruText);
            $form->text('text.de', __('German'))->default($deText);
        } else {
            if($page){
                $form->text('group', __('Page'))->default($page);
            }else{
                $form->text('group', __('Page'));
            }
            $form->text('key', __('Key'));
            $form->text('text.en', __('English'))->default('');
            $form->text('text.ru', __('Russian'))->default('');
            $form->text('text.de', __('German'))->default('');
        }

        return $form;
    }


    public function edit($id, Content $content)
    {
        return $content
            ->title('Edit')
            ->description('Edit language')
            ->body($this->form($id)->edit($id));
    }

    public function update($id, Request $request)
    {
        // Get all the request data
        $data = $request->except(['_token', '_method']);

        // Encode the 'text' field as JSON
        $data['text'] = json_encode($data['text']);

        // Update the record in the database
        LanguageLine::where('id', $id)->update($data);

        $languageLine = LanguageLine::findOrFail($id);
        return redirect()->route('admin.languages.pagesGR', $languageLine->group);
    }

    public function destroy($id)
    {
        LanguageLine::findOrFail($id)->delete();
        return redirect()->route('admin.language.index');
    }

    public function create(Content $content){
        $page = request()->input('page');
        return $content
            ->title('Edit')
            ->description('Edit language')
            ->body($this->form(null, $page));
    }


    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['text'] = json_encode($data['text']);
        $data['key'] = Str::slug($data['key'], '_');
        LanguageLine::create($data);

        return redirect()->route('admin.language.index');
    }
}
