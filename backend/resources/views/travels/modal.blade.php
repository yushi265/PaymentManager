<!-- Button trigger modal -->
<button type="button" class="btn w-100 mb-3 pt-3 pb-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="background-color:#f11e766e;">
    追加
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#f4f2908a">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">追加</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('travels.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="タイトル" value="{{ old('name') }}"required>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button> --}}
                    <button type="submit" class="btn" style="background-color: #f11e766e;">追加</button>
                </div>
            </form>
        </div>
    </div>
</div>
