
<form method="POST" action="{{URL::to('/honeycombs/login')}}">
    {{ csrf_field() }}
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit">
</form>
