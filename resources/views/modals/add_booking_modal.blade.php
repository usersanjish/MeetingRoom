<div class="modal fade" tabindex="-1" role="dialog" id="addBookingModal">
  @include('errors.errors')
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Загаловок</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="title">
              <span class="vtitle text-danger"></span>
            </div>
            <label for="exampleInputFile">Начало</label>
            <div class="input-group">
              <span class="input-group-addon" id="set_start">
                <i class="glyphicon glyphicon-calendar"></i>
              </span>
              <input type="text" class="form-control date_start" id="exampleInputFile" name="start" readonly aria-describedby="set_start clear_start" data-option="start">
              <span class="input-group-addon danger" id="clear_start">
                <i class="glyphicon glyphicon-remove"></i>
              </span>
            </div>
            <div class="input-group"><span class="vstart text-danger"></span></div>
            <label for="exampleInputFile">Конец</label>
            <div class="input-group">
              <span class="input-group-addon" id="set_end">
                <i class="glyphicon glyphicon-calendar"></i>
              </span>
              <input type="text" class="form-control date_end" id="exampleInputFile" name="end" readonly aria-describedby="set_end clear_end" data-option="end">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-remove" id="clear_end"></i>
              </span>
            </div>
            <span class="vend text-danger"></span>
            <div class="form-group">
              <label for="exampleInputFile">Описание</label>
              <textarea class="form-control" rows="10" cols="45" name="description"></textarea>
              <span class="vdescription text-danger"></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отменить</button>
          <button id="submit" class="btn btn-success pull-right">Добавить</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->