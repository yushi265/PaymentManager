<div class="card mb-2" style="background-color:#f11e766e;">
    <div class="card-body mb-0 p-2 pl-3">
        <form action="{{ route('travels.destroy', ['travel' => $travel]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark pt-0 pb-0"
                style="position: absolute; right: 20px; top: 10px">
                <i class="fas fa-times"></i>
            </button>
        </form>
        @include('travels.edit_modal')
        <a href="{{ route('travels.show', ['travel' => $travel]) }}" style="color: black;">
            <h5 class="card-title mb-0">{{ $travel->name }}</h5>
            <p class="card-text">
                {{ $travel->created_at }}
            </p>
        </a>
    </div>
</div>
