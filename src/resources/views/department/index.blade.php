
        <table id="table" style="padding-top: 2em;"
               data-toggle="table"
               data-show-refresh="true"
               data-pagination="false"
               data-buttons-align="left"
               data-buttons-class="primary"
               data-toolbar="#myToolbar"
               data-unique-id="id"
               data-search="true"
               data-escape="true"
               data-url="{{ route($crud->route . '.indexJson') }}"

               data-id-field="id"
               {{--data-editable-mode="inline"--}}
               data-editable-emptytext="空"
        >
            <thead>
            <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th data-formatter="rownumberFormatter" data-align="center">序号</th>
                <th data-field="title" data-formatter="titleFormatter">单位名称</th>
                <th data-field="pinyin" class="hidden">拼音</th>
                <th data-field="class_list" class="hidden">class_list</th>
                <th data-field="sort_id">排序
                </th>
                <th data-formatter="actionFormatter">动作</th>
                {{--<th data-formatter="actionFormatter">操作</th>--}}
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

@push('js')
<script type="text/javascript">

    function rownumberFormatter(value, data, index) {
        return 1 + index;
    }

    function actionFormatter(value, data, index) {
        return '<button class="btn btn-xs btn-primary" name="editBtn" data-id=' + data.id + '>编辑</button>'
    }

    function titleFormatter(value, data, index) {
        value = '<span class="folder-open"></span>' + value;
        var step = parseInt(data.class_layer) - 1;
        if (step > 0) {
            value = '<span class="folder-line"></span>' + value;
        }
        if (step > 1)
            value = '<span style="display:inline-block;width:' + 24 * (step - 1) + 'px;"></span>' + value;

        return value;
    }

    function bindLink(){
        $('button[name=editBtn]').click(function () {
            var that = $(this);
                window.location.href = "{{ route($crud->route . '.edit',':id') }}".replace(':id', that.data('id'));
        })
    }

</script>
@endpush