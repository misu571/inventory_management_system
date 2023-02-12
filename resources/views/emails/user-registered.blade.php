<x-mail::message>
# Welcome, {{ $user }}

<div style="margin-top: 36px">
    <p style="margin-bottom: 8px">Your login credential:</p>
    <p style="margin: 0">Login ID: <span style="color: black">{{ $login }}</span></p>
    <p style="margin: 0">Password: <span style="color: black">{{ $pass }}</span></p>
</div>
</x-mail::message>