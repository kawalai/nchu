@if ($result)
<div class="modal fade" id="componentModal" tabindex="-1" role="dialog" aria-labelledby="componentModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="component-modal-title" id="componentModalLabel">{{$otherData['modalTitle']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="component-modal-body">
        <form action="" method="POST">
          <div>標題<input name="title" type="text" value="{{$result->title}}" /></div>
          <div>日期<input name="date" type="date" value="{{$result->date}}" /></div>
          <div>觀看數<input name="views" type="number" value="{{$result->views}}" /></div>
          <div>圖片<input name="img" type="text" value="{{$result->img}}" /></div>
          <div>內文<textarea name="content" name="" id="" cols="30" rows="10">{{$result->content}}</textarea></div>
        </form>
      </div>
      <div class="component-modal-footer">
        <button id="component-modal-btn-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">{{$otherData['cancelBtn']}}</button>
        <button id="component-modal-btn-sumbit" type="button" class="btn btn-primary">{{$otherData['mainBtn']}}</button>
      </div>
    </div>
  </div>
</div>
@else
<div class="modal fade" id="componentModal" tabindex="-1" role="dialog" aria-labelledby="componentModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="component-modal-title" id="componentModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="component-modal-body">
        ...
      </div>
      <div class="component-modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endif