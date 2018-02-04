<?php

namespace App\Mail;

use App\User;
use App\Models\Idea;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IdeaApproved extends Mailable
{

  use Queueable, SerializesModels;

  public $idea;

  /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct(Idea $idea)
   {
       $this->idea = $idea;
   }


  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
    {
      return $this->markdown('emails.ideaapproved');
    }
}
