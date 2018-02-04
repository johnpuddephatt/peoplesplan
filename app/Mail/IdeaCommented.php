<?php

namespace App\Mail;

use App\User;
use App\Models\Idea;
use App\Models\Comment;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IdeaCommented extends Mailable
{

  use Queueable, SerializesModels;

  public $idea;
  public $comment;

  /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct(Idea $idea, Comment $comment)
   {
       $this->idea = $idea;
       $this->comment = $comment;
   }


  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
    {
      return $this->markdown('emails.ideacommented');
    }
}
