<x-guest-layout>
    <h1 class="text-white">Tags</h1>

    <table>
        <thead>
            <tr>
                <th class="text-white">Name</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td class="text-white">{{ $tag->name }}</td>
                    <td>
                        <a class="text-white" href="{{ route('tags.edit', $tag) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="text-white" href="{{ route('tags.create') }}">Create Tag</a>
</x-guest-layout>
