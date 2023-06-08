<form action="{{ $action ?? '' }}" method="post" class="d-inline delete">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>
