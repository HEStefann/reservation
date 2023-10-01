<form action="{{ route('promotions.store', ['restaurant' => $restaurantId]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="file" name="image">
    <button type="submit">Create Promotion</button>
</form>
