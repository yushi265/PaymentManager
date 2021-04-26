<!-- Button trigger modal -->
<button type="button" class="btn w-100 mb-4 pt-3 pb-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="background-color:#f11e766e;">
    追加
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content" style="background-color:#f4f2908a">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">イベント登録</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('payments.store') }}" method="post">
                @csrf
                <input type="hidden" name="travel_id" value="{{ $travel_id }}">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="title" placeholder="イベント名" value="{{ old('title') }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="price" placeholder="使った金額" value="{{ old('price') }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" name="payer_id" required>
                            <option selected>会計した人</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}"
                                    @if (old('payer_id') == $member->id) selected @endif>
                                        {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button> --}}
                    <button type="submit" class="btn" style="background-color: #f11e766e;">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
