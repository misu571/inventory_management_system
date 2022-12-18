<x-mail::message>
# Notice: Change Password

<div style="margin-top: 36px">
    <p style="margin: 0">Hello, <span style="color: black">{{ $user }}</span></p>
    <p style="margin: 0">Your password has been updated by admin. Use below information to login.</p>
</div>
<div style="margin-top: 24px">
    <p style="margin-bottom: 8px">Your login credential:</p>
    <p style="margin: 0">Login ID: <span style="color: black">{{ $login }}</span></p>
    <p style="margin: 0">Password: <span style="color: black">{{ $pass }}</span></p>
</div>
</x-mail::message>
