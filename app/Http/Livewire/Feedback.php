<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Feedback extends Component
{

    public $name = '';
    public $email = '';
    public $feedback = '';
    
    public $rules = [
        'name' => 'string|min:3|max:255|required',
        'email' => 'email|min:3|max:255|required',
        'feedback' => 'string|min:3|max:255|required',
    ];

    public function save()
    {
        $this->validate();

        /// Feedback::create()....

        session()->flash('message', 'Thank you for your feedback');

        return redirect('/feedbacks');
    }

    public function render()
    {
        return view('livewire.feedback');
    }
}
