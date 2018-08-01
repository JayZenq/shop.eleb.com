@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('menucategories.update',[$menucategory])}}" class="form-horizontal" method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">菜品分类名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="菜品分类名" name="name" value="{{$menucategory->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="菜品分类描述" name="description" value="{{$menucategory->description}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否是默认分类</label>
            <div class="col-sm-10">
                    <label>
                        <input type="radio" name="is_selected" value="1" @if($menucategory->is_selected) checked @endif>是
                    </label>
                    <label>
                        <input type="radio" name="is_selected" value="0" @if(!$menucategory->is_selected) checked @endif>否
                    </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">修改</button>
            </div>
        </div>
    </form>
@endsection