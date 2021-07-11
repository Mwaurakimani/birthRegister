<nav>
    <p>{{$name}}</p>
    <form action="/logout" method="POST">
        {{csrf_field()}}
        <button type="submit" name="submit" value="submit"> Log Out</button>
    </form>
</nav>

