<div class="modal fade" id="deleteModal{{$companyData->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">本当に削除してもよろしいですか?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">会社を削除する場合は、以下の「削除」を選択してください。</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('company-delete-form{{$companyData->id}}').submit();">
                    削除
                </a>
                <form id="company-delete-form{{$companyData->id}}" method="GET" action="{{ route('admin.company.destroy', ['company' => $companyData->id]) }}">
                    @csrf
                    {{-- @method('DELETE') --}}
                </form>
            </div>
        </div>
    </div>
</div>
