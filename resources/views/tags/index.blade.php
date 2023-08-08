<x-guest-layout>
    <h1>Tags</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('tags.create') }}">Create Tag</a>
</x-guest-layout>