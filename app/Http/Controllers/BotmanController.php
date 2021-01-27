<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    /**
     * @var string
     */
    private $firstname;

    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'hi') {
               $this->askName($botman);
            }
            elseif ($message == 'navigation') {
                $this->ShowNavigationOptions($botman);
            }
            elseif ($message == 'help') {
                $this->help($botman);
            }else{
                $this->error($botman);
            }
        });
        $botman->listen();
    }
    public function askName($botman)
    {
        $botman->ask('Hello! What is your firstname? 👋', function (Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();
            $this->say('Nice to meet you ' . $this->firstname.' 🥳');

            $this->say('Okay '. $this->firstname." type '<b>help</b>' ✋ to see all my options or type '<b>navigation</b>' 📍  to let me show you some navigation options 😁");
        });
        return;
    }

    public function  ShowNavigationOptions($botman){
        $value=Question::create('Where would you like to go? 🚗')->addButton(Button::create('Courses')->value('course'))->addButton(Button::create('Profile page')->value('profile'))->addButton(Button::create('Contact')->value('contact'));
        $botman->ask($value,function(Answer $answer){
            $text = $answer->getText();
            if ($text == 'course'){
               $this->say('<a class="btn btn-primary" href="/courses">Go to courses</a>');
            }elseif($text=='profile'){
                $this->say('<a class="btn btn-primary" href="/profile">Go to your personal page</a>');
            }elseif($text=='contact'){
                $this->say('<a class="btn btn-primary" href="/contact">Go to the contact page</a>');
            }
            else{
                $this->say("Select 1 of the 3 buttons");
            }
        });
    }
    
    public function help($botman){
        $botman->ask("Would you like to see the options ⚙️ I got? <br> answer with <b>'yes'</b> or <b>'no'</b>",function(Answer $answer) {
            if ($answer=='yes'){
                $this->say("Here are my options:");
                $this->say("type <b>'hi'</b> to give your name");
            }else{
                $this->say("It's a shame to see you go :(");
                return;
            }
        });
        return;
    }

    public function error($botman){
        $botman->say("⚠️I dont understand, try '<b>help</b>' to see all my commands'⚠️",function(Answer $answer){
        });
    }


}
