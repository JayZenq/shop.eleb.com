@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('menucategories.store')}}" class="form-horizontal" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">菜品分类名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="菜品分类名" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="菜品分类描述" name="description" value="{{old('description')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否是默认分类</label>
            <div class="col-sm-10">
                    <label>
                        <input type="radio" name="is_selected" value="1">是
                    </label>
                    <label>
                        <input type="radio" name="is_selected" value="0">否
                    </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">添加</button>
            </div>
        </div>
    </form>
@endsection