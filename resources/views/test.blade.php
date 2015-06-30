@include('UEditor::head')

<form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <!-- 加载编辑器的容器 -->
    <textarea id="container" name="content">这里写你的初始化内容</textarea>
    <input type="submit" value="提交">
</form>

<script type="text/javascript">
    var ue = UE.getEditor('container', {
            initialFrameWidth : 500,
            initialFrameHeight : 450,
    });
    ue.ready(function() {
            //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值. 
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');   
    });
</script>