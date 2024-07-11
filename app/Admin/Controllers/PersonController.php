<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Person;
use Illuminate\Http\Request;

use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;
use Illuminate\Support\Facades\Storage;

class PersonController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Person';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Person());

        $grid->column('id', __('Id'));
        $grid->column('firstname', __('Firstname'));
        $grid->column('lastname', __('Lastname'));
        $grid->column('surname', __('Surname'));
        $grid->column('image', __('Image'))->image();
        $grid->column('birth_year', __('Birth year'));
        $grid->column('birth_place', __('Birth place'));

        $grid->filter(function($filter) {
            $filter->like('firstname', 'Firstname');
            $filter->like('lastname', 'Lastname');
            $filter->like('surname', 'Surname');
            $filter->like('birth_place', 'Birth place');
            $filter->like('birth_year', 'Birth year');
        });

        $grid->tools(function ($tools) {
            $tools->append('<a href="'.route('admin.import.person').'" class="btn btn-sm btn-danger me-1 grid-create-btn" title="Import">
                                <i class="icon-plus"></i><span class="hidden-xs">Import</span>
                            </a>');
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
        $show = new Show(Person::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('firstname', __('Firstname'));
        $show->field('lastname', __('Lastname'));
        $show->field('surname', __('Surname'));
        $show->field('image', __('Image'));
        $show->field('birth_year', __('Birth year'));
        $show->field('birth_place', __('Birth place'));
        $show->field('nationality', __('Nationality'));
        $show->field('citizenship', __('Citizenship'));
        $show->field('social_status', __('Social status'));
        $show->field('education', __('Education'));
        $show->field('party_affiliation', __('Party affiliation'));
        $show->field('repression_type', __('Repression type'));
        $show->field('work_place', __('Work place'));
        $show->field('mobilization_date', __('Mobilization date'));
        $show->field('termination_date', __('Termination date'));
        $show->field('residence_place', __('Residence place'));
        $show->field('profession', __('Profession'));
        $show->field('mobilized_by', __('Mobilized by'));
        $show->field('reason', __('Reason'));
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
        $form = new Form(new Person());

        $form->text('firstname', __('Firstname'));
        $form->text('lastname', __('Lastname'));
        $form->text('surname', __('Surname'));
        $form->image('image', __('Image'));
        $form->text('birth_year', __('Birth year'));
        $form->text('birth_place', __('Birth place'));
        $form->text('nationality', __('Nationality'));
        $form->text('citizenship', __('Citizenship'));
        $form->text('social_status', __('Social status'));
        $form->text('education', __('Education'));
        $form->text('party_affiliation', __('Party affiliation'));
        $form->text('repression_type', __('Repression type'));
        $form->text('work_place', __('Work place'));
        $form->text('mobilization_date', __('Mobilization date'));
        $form->text('termination_date', __('Termination date'));
        $form->text('residence_place', __('Residence place'));
        $form->text('profession', __('Profession'));
        $form->text('mobilized_by', __('Mobilized by'));
        $form->text('reason', __('Reason'));

        return $form;
    }

    public function import(Content $content, Request $request)
    {
        $form = new Form(new Person());

        // Define the form fields
        $form->html('<a href="/uploads/example/person.csv" target="_blank" download="person.csv">Download Example File</a>');
        $form->file('import_file', __('File'))  // Use 'import_file' as the name
            ->removable()
            ->move('files');

        $form->tools(function (Form\Tools $tools) {
            $tools->disableList();
        });

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        return $content
            ->title('Person')
            ->description('Import')
            ->body($form);
    }



    public function processImport(Request $request)
    {
        // Validate and process the uploaded file
        $request->validate([
            'import_file' => 'required|file|mimes:csv',
        ]);

        if ($request->hasFile('import_file')) {
            $file = $request->file('import_file');
            $filePath = $file->store('files');

            $csvFile = fopen(storage_path('app/' . $filePath), 'r');
            $header = fgetcsv($csvFile);

            while (($line = fgetcsv($csvFile)) !== false) {
                $data = array_combine($header, $line);

                Person::updateOrInsert([
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'surname' => $data['surname'],
                    'birth_year' => $data['birth_year'],
                    'birth_place' => $data['birth_place'],
                ], $data);
            }

            // Close the CSV file
            fclose($csvFile);

            // Redirect after import
            return redirect()->route('admin.people.index');
        }

        // Redirect if no file was uploaded
        return redirect()->route('admin.people.index');
    }


}
