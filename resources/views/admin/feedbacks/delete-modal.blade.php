
<div class="modal fade" id="deleteModel-{{ $feedback->id }}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Delete Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure you want to delete this feedback?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('deleteFeedback-{{ $feedback->id }}').submit();">Confirm</button>
                <form id="deleteFeedback-{{ $feedback->id }}" action="{{ route('admin.feedback.delete', ['id' => $feedback->id]) }}" method="GET" style="display:none;" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
