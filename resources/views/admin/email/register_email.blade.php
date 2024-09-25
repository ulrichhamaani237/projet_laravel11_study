@component('mail::message')
    HI, {{ $save->username }}, please new account password set
    <p>it happends, Clieck the link below ...</p>
    @component('mail::button', ['url' => url('set_new_password/'.$save->remember_token)])
        Set you password
    @endcomponent
    thank you
@endcomponent