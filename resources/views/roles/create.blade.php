<form action="{{route('roles.store')}}" method="POST">
    @csrf
    <input name="name" type="text">
    <button type="submit">Save</button>
</form>
