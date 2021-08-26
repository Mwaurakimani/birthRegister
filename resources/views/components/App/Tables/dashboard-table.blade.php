


<table class="table table-sm">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Sirname</th>
        <th scope="col">otherName</th>
        <th scope="col">gender</th>
        <th scope="col">hospital</th>
        <th scope="col">D.O.B</th>
    </tr>
    </thead>
    <tbody>

    @foreach($records as $record)
        <tr onclick="window.location.href='/Entries/{{$record->id}}'">
            <th scope="row"> {{ ($loop->index) + 1 }}</th>
            <td>{{ $record->childLastNam }}</td>
            <td>{{ $record->childFirstName }} {{ $record->childMiddleName }}</td>
            <td>{{ $record->gender }}</td>
            <td>{{ $record->Hospital->Name }}</td>
            <td>{{ $record->dateOfBirth }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
