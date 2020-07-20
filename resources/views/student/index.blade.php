<div class="container">
    <div class="container text-center h2">
        您好，{{ Auth::user()->department }} {{ Auth::user()->class }} 的 {{ Auth::user()->name }}
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-sm table-striped table-hover table-condensed">
                <thead>
                <tr>
                    <th class="text-center align-middle"><strong>服裝 / 配件</strong></th>
                    <th class="text-center align-middle"><strong>尺寸 / 顏色</strong></th>
                    <th class="text-center align-middle"><strong>剩餘數量</strong></th>
                </tr>
                </thead>
                <tbody>
                {!! $cloth_table !!}
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addNewData">
                新增訂單
            </button>
            <div class="modal fade text-center" id="addNewData" data-backdrop="static" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                新增訂單
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="#">
                            @csrf

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="content">時間段名稱</label>
                                    <input type="text"
                                           class="form-control @error('content') is-invalid @enderror"
                                           id="content" name="content">

                                    @error('content')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="start_time">開始時間</label>
                                    <input type="date"
                                           class="form-control @error('start_time') is-invalid @enderror"
                                           id="start_time" name="start_time">

                                    @error('start_time')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="end_time">結束時間</label>
                                    <input type="date"
                                           class="form-control @error('end_time') is-invalid @enderror"
                                           id="end_time" name="end_time">

                                    @error('end_time')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    取消
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    新增資料
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
