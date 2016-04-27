@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add a Game</div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'edit')) }}
                        <div class="form-group">
                            <label for="title">Game Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?= $game['title']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="title">Platform</label>
                            <select class="form-control" name="platform">
                                @foreach($platforms as $platform)
                                    <option value="<?= $platform['attributes']['platform_id']; ?>" <?php if($game['platform'] == $platform['attributes']['platform_id']) { echo 'selected'; } ?>><?= $platform['attributes']['platform_neat']; ?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="copies">Number of copies</label>
                            <input type="text" class="form-control" id="copies" placeholder="Copies" name="copies" value="<?= $game['copies']; ?>" />
                        </div>
                    <input type="hidden" name="id" value="<?= $game['id']; ?>" />
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection