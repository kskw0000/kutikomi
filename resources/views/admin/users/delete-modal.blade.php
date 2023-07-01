<div class="modal fade" id="deleteModal{{$userData->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">本当に削除してもよろしいですか?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">ユーザーを削除したい場合は、以下の「削除」を選択してください。</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('user-delete-form{{$userData->id}}').submit();">
                    削除
                </a>
                <form id="user-delete-form{{$userData->id}}" method="GET" action="{{ route('admin.users.destroy', ['user' => $userData->id]) }}">
                    @csrf
                    {{-- @method('DELETE') --}}
                </form>
            </div>
        </div>
    </div>
</div>
