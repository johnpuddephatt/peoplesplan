<?php

namespace App\Http\Controllers\Admin;

use Mail;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\IdeaRequest as StoreRequest;
use App\Http\Requests\IdeaRequest as UpdateRequest;
use App\Mail\IdeaApproved;


use App\Models\Idea;


class IdeaCrudController extends CrudController
{
  public function setup()
  {

    /*
    |--------------------------------------------------------------------------
    | BASIC CRUD INFORMATION
    |--------------------------------------------------------------------------
    */
    $this->crud->setModel('App\Models\Idea');
    $this->crud->setRoute(config('backpack.base.route_prefix') . '/ideas');
    $this->crud->setEntityNameStrings('idea', 'ideas');
    $this->crud->enableExportButtons();


    /*
    |--------------------------------------------------------------------------
    | BASIC CRUD INFORMATION
    |--------------------------------------------------------------------------
    */
    $this->crud->removeButton('create');

    $userArray = [
      'label' => "User",
      'type' => 'select',
      'name' => 'user_id', // the db column for the foreign key
      'entity' => 'user', // the method that defines the relationship in your Model
      'attribute' => 'name', // foreign key attribute that is shown to user
      'model' => "App\User" // foreign key model
    ];

    $themeArray = [
      'label' => "Theme",
      'type' => 'select',
      'name' => 'theme_id', // the db column for the foreign key
      'entity' => 'theme', // the method that defines the relationship in your Model
      'attribute' => 'title', // foreign key attribute that is shown to user
      'model' => "App\Models\Theme" // foreign key model
    ];
    $titleArray = [
      'name' => 'title',
      'label' => 'Title',
      'type' => 'text'
    ];
    $whyArray = [
      'name' => 'description_why',
      'label' => 'Why you think this should happen',
      'type' => 'textarea',
      'priority' => 2,
    ];
    $whatArray = [
      'name' => 'description_what',
      'label' => 'What you think should happen',
      'type' => 'textarea',
      'priority' => 2,
    ];

    $approvedField = [
      'name' => 'approved',
      'label' => 'Approved?',
      'type' => 'checkbox',
    ];

    $approvedCol = [
      'name' => 'approved',
      'label' => 'Approved?',
      'type' => 'check',
    ];

    $dateCol = [
      'name' => 'created_at',
      'label' => 'Submitted',
      'type' => 'datetime',
    ];

    // $featuredField = [
    //   'name' => 'featured',
    //   'label' => 'Featured?',
    //   'type' => 'checkbox',
    // ];
    //
    // $featuredCol = [
    //   'name' => 'featured',
    //   'label' => 'Featured?',
    //   'type' => 'check',
    // ];

    $this->crud->addFields([$approvedField,$titleArray,$userArray,$themeArray,$whatArray,$whyArray,], 'both');
    $this->crud->addColumns([$userArray,$themeArray,$titleArray,$whyArray,$whatArray,$approvedCol,$dateCol]);

  }




  public function store(StoreRequest $request)
  {
    // your additional operations before save here
    $request['slug'] = str_slug($request->title);

    $redirect_location = parent::storeCrud($request);
    // your additional operations after save here
    // use $this->data['entry'] or $this->crud->entry
    return $redirect_location;
  }

  public function update(UpdateRequest $request)
  {
    // your additional operations before save here
    $idea = Idea::where('id',$request->id)->with('user')->firstOrFail();

    if ($idea->approved == false && $request->approved == true) {
      // Send confirmation email.
      if( $idea->user->email ) {
        $email = new IdeaApproved($idea);
        Mail::to($idea->user->email)->send($email);
      }
    }
    $request['slug'] = str_slug($request->title);
    $redirect_location = parent::updateCrud($request);
    // your additional operations after save here
    // use $this->data['entry'] or $this->crud->entry
    return $redirect_location;
  }
}