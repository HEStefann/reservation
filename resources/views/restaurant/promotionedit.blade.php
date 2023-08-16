<form action="{{ route('promotions.update', ['restaurant' => $restaurant->id, 'promotion' => $promotion->id]) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $promotion->title }}">
    <textarea name="description">{{ $promotion->description }}</textarea>
    <input type="file" name="image">
    <button type="submit">Update Promotion</button>
</form>
