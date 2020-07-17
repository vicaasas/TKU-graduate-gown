<div class="container">
    <div class="text-center h2">
        主畫面
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-header text-center">
                    時間設定
                </div>
                <div class="card-body text-right">
                    <div class="container-fluid">
                        <table class="table table-sm table-striped table-hover table-condensed">
                            <thead>
                            <tr>
                                <th class="text-center align-middle"><strong>時間段</strong></th>
                                <th class="text-center align-middle"><strong>開始時間</strong></th>
                                <th class="text-center align-middle"><strong>結束時間</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($time_list as $key => $data)
                                <tr>
                                    <th class="text-center align-middle">{{ $data->content }}</th>
                                    <th class="text-center align-middle">{{ $data->start_time }}</th>
                                    <th class="text-center align-middle">{{ $data->end_time }}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-primary">
                            新增時間段
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header text-center">
                    歸還地點設定
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update.location') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">
                                歸還地點
                            </label>

                            <div class="col-md-6">
                                <input id="location" type="text" value="{{ $location }}"
                                       class="form-control @error('location') is-invalid @enderror"
                                       name="location" required autocomplete="location">

                                @error('location')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    更新
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-header text-center">
                    物品數量設定
                </div>
                <div class="card-body text-right">
                    <table class="table table-sm table-striped table-hover table-condensed">
                        <thead>
                        <tr>
                            <th class="text-center align-middle"><strong>學制</strong></th>
                            <th class="text-center align-middle"><strong>服裝 / 配件</strong></th>
                            <th class="text-center align-middle"><strong>尺寸 / 顏色</strong></th>
                            <th class="text-center align-middle"><strong>數量</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cloth_list as $key=>$list_1)
                            <tr>
                                <td class="text-center table-light align-middle"
                                    rowspan="{{ count($list_1) }}"><strong>{{ $key }}</strong></td>
                                @foreach($list_1->groupBy('name') as $key=>$data)
                                    <td class="text-center table-light align-middle"
                                        rowspan="{{ count($data) }}">{{ $key }}</td>
                                    @foreach($data as $meow)
                                        <td class="text-center align-middle">{{ $meow->property }}</td>
                                        <td class="text-center align-middle">{{ $meow->quantity }}</td>
                            </tr>
                        @endforeach
                        @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <a href="#" class="btn btn-primary">
                        新增物品
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
