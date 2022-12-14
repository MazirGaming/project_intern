<x-mail::message>
<h1 class="title">Hello {{$name}}</h1>
<img src="{{asset('/assets/img/email.webp')}}" alt="none">
<h1 class="ceter-text">Please Verify your email</h1>
<h5 class="ceter-text">Amazing deals, updates, interesting news right in your inbox</h5>
<x-mail::button :url="$url">
Verify
</x-mail::button>
</x-mail::message>
