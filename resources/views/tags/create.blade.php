<x-app-layout>
    <div style="display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;">
        <h1 class="text-white">Create Tag</h1>

        <form style="    display: flex;
        flex-direction: column;
        align-items: center;
    }" method="POST" action="{{ route('tags.store') }}">
            @csrf

            <div class="form-group">
                <label class="text-white">Name</label>
                <input name="name" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary text-white">Create</button>
        </form>
    </div>
</x-app-layout>
