<x-guest-layout>
    <h1 class="text-white">Edit Tag</h1>

    <form method="POST" action="{{ route('tags.update', $tag) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="text-white">Name</label>
            <input name="name" value="{{ $tag->name }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary text-white">Update</button>
    </form>
</x-guest-layout>
