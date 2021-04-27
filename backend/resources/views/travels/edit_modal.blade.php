<!-- Button trigger modal -->

<button type="submit" class="btn btn-outline-dark pt-0 pb-0"
                style="position: absolute; right: 60px; top: 10px"
                data-mdb-toggle="modal" data-mdb-target="#editModal">
                <i class="fas fa-edit"></i>
            </button>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#f4f2908a">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">編集</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('travels.update', ['travel' => $travel]) }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="タイトル" value="{{ $travel->name ?? old('name') }}"required>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button> --}}
                    <button type="submit" class="btn" style="background-color: #f11e766e;">完了</button>
                </div>
            </form>
        </div>
    </div>
</div>
