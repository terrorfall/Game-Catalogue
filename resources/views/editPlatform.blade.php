@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a Game</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ Form::open(array('url' => 'edit/platform')) }}
                        <div class="form-group">
                            <label for="title">Platform</label>
                            <input type="text" class="form-control" id="platform" placeholder="Platform" name="platform" value="<?= $platform->platform_neat; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="imgurl">Image Folder</label>
                            <input type="text" class="form-control" id="imgfolder" placeholder="Folder" name="imgfolder" value="<?= $platform->platform_id; ?>" />
                        </div>
                            <input type="hidden" name="id" value="<?= $platform->id; ?>" />
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection