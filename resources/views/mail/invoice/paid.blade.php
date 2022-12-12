<x-mail::message>
<h1 class="title">Hello {{$name}}</h1>
<img src="https://trello.com/1/cards/63914f002dd14e009adc8b8c/attachments/63919e9239954404972ba07f/previews/63919e9239954404972ba0aa/download/email.webp" alt="none">
<h1 class="ceter-text">Please Verify your email</h1>
<h5 class="ceter-text">Amazing deals, updates, interesting news right in your inbox</h5>
<x-mail::button :url="$url">
Verify
</x-mail::button>
</x-mail::message>
