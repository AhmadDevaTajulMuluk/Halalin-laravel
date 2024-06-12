<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Chat;
use App\Models\Profile;
use App\Models\Relations;
use App\Models\User;
use App\Models\Ustadz;
use Illuminate\Support\Facades\Auth;

class ChatRoom extends Component
{
    public $relation;
    public $message;
    public $chats;
    public $sender;
    public $user;

    protected $rules = [
        'message' => 'required|string|max:255',
    ];

    public function mount($relation)
    {
        $this->relation = $relation;
        $this->sender = Auth::user()->username;
        $this->user = Auth::user();
        $this->loadChats();
    }

    public function send()
    {
        $this->validate();

        Chat::create([
            'hubungan_id' => $this->relation->hubungan_id,
            'send_by' => $this->sender,
            'messages' => $this->message,
        ]);

        $this->message = '';
        $this->loadChats();
        $this->loadRelation();
        $this->loadSender();
        $this->loadUser();
    }

    public function loadChats()
    {
        $this->chats = Chat::where('hubungan_id', $this->relation->hubungan_id)->get();
    }

    public function loadRelation()
    {
        $this->relation = Relations::where('hubungan_id', $this->relation->hubungan_id)->first();
        $this->relation->maleUser = Profile::where('user_id', $this->relation->maleuser_id)->first();
        $this->relation->femaleUser = Profile::where('user_id', $this->relation->femaleuser_id)->first();
        $this->relation->ustadz = Ustadz::where('ustadz_id', $this->relation->ustadz_id)->first();
    }

    public function loadSender()
    {
        if (auth('web')->id() == $this->relation->maleuser_id || auth('web')->id() == $this->relation->femaleuser_id) {
            $sender = User::where('id', auth()->id())->first();
            $sender = $sender->username;
        } else if (auth('ustadz')->check()) {
            $sender = "ustadz";
        }
    }

    public function loadUser()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $relation = Relations::where('hubungan_id', $this->relation->hubungan_id)->first();
        $maleUser = Profile::where('user_id', $this->relation->maleuser_id)->first();
        $femaleUser = Profile::where('user_id', $this->relation->femaleuser_id)->first();
        $ustadz = Ustadz::where('ustadz_id', $this->relation->ustadz_id)->first();
        if (auth('web')->id() == $this->relation->maleuser_id || auth('web')->id() == $this->relation->femaleuser_id) {
            $sender = User::where('id', auth()->id())->first();
            $sender = $sender->username;
        } else if (auth('ustadz')->check()) {
            $sender = "ustadz";
        }
        $user = User::where('id', auth()->id())->first();
        $chats = Chat::where('hubungan_id', $this->relation->hubungan_id)->get();
        // dd($relation->maleUser->fullname);
        return view('livewire.chat-room', ['chats' => $chats, 'relation' => $relation, 'sender' => $sender, 'user' => $user, 'maleUser' => $maleUser, 'femaleUser' => $femaleUser, 'ustadz' => $ustadz]);
    }
}
