<div class="modal fade" id="deleteModal{{$reviewData->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">本当に削除してもよろしいですか?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">レビューを削除する場合は、以下の「削除」を選択してください。</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('review-delete-form{{$reviewData->id}}').submit();">
                    削除
                </a>
                <form id="review-delete-form{{$reviewData->id}}" method="GET" action="{{ route('admin.review.destroy', ['review' => $reviewData->id]) }}">
                    @csrf
                    {{-- @method('DELETE') --}}
                </form>
            </div>
        </div>
    </div>
</div>
