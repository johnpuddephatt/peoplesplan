<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ThemeRequest as StoreRequest;
use App\Http\Requests\ThemeRequest as UpdateRequest;

use App\Models\Theme;


class ThemeCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Theme');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/themes');
        $this->crud->setEntityNameStrings('theme', 'themes');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();
        $titleArray = [   // Browse
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'tab' => 'Overview',
            'attributes' => [
              'class' => 'form-control form-control-lg'
            ]
        ];

        $descArray = [   // Browse
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'tab' => 'Overview'
        ];

        $dateCol = [
          'label' => 'Month',
          'type' => 'model_function',
          'function_name' => 'getMonth',
          'tab' => 'Overview'
        ];

        $dateField = [
          'name' => 'date',
          'label' => 'Date',
          'type' => 'date',
          'tab' => 'Overview'
        ];

        $iconField = [ // image
          'label' => "Icon",
          'name' => "icon",
          'type' => 'image',
          'upload' => true,
          'crop' => true, // set to true to allow cropping, false to disable
          'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
          // 'prefix' => 'uploads/images/profile_pictures/' // in case you only store the filename in the database, this text will be prepended to the database value
          'tab' => 'Overview'
        ];

        $wptitleArray = [   // Browse
            'name' => 'whitepaper_title',
            'label' => 'Whitepaper title',
            'type' => 'text',
            'tab' => 'Whitepaper'
        ];

        $wpsummaryArray = [   // Browse
            'name' => 'whitepaper_summary',
            'label' => 'Whitepaper summary',
            'type' => 'textarea',
            'tab' => 'Whitepaper'
        ];

        $wpbodyArray = [   // Browse
            'name' => 'whitepaper_body',
            'label' => 'Whitepaper body',
            'type' => 'quill',
            'tab' => 'Whitepaper'
        ];

        $wpfileArray = [   // Browse
            'name' => 'whitepaper_file',
            'label' => 'Whitepaper PDF',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'uploads', // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
            'tab' => 'Whitepaper'
        ];


        $this->crud->addFields([$titleArray,$descArray,$dateField, $iconField, $wptitleArray, $wpsummaryArray, $wpbodyArray, $wpfileArray], 'both');

        $this->crud->addColumns([$titleArray, $descArray, $dateCol]);


        // $titleArray = [   // Browse
        //     'name' => 'title',
        //     'label' => 'Title',
        //     'type' => 'text',
        //     'attributes' => [
        //       'class' => 'form-control form-control-lg'
        //     ]
        // ];
        //
        // $bodyArray = [   // Browse
        //     'name' => 'body',
        //     'label' => 'Content',
        //     'type' => 'quill'
        // ];
        //
        // $dateArray = [
        //   'name' => 'created_at',
        //   'label' => 'Date created',
        //   'type' => 'date'
        // ];



        // $this->crud->addFields([$titleArray,$bodyArray], 'both');

        // $this->crud->addColumns([$titleArray, $dateArray]);

        // $this->crud->removeColumn('body'); // remove a column from the stack
        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }




    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $request['slug'] = str_slug($request->title);
        // $request['icon'] = Theme::storeImage($request['icon']);

        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $request['slug'] = str_slug($request->title);
        // if($request['icon']) {
        //   $request['icon'] = Theme::storeImage($request['icon']);
        // }
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

}
