@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Platforms</div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Platform</th>
                                <th>Icon</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($platforms as $game) { ?>
                            <tr>
                                <td><?= $game->platform_neat; ?></td>
                                <td><img src="assets/img/platforms/<?= $game->platform_id; ?>/32x32.png" /></td>
                                <td><a href="platforms/edit/<?= $game->id;?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> | <a href="platforms/delete/<?= $game->id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                            </tr>
                            <?php }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-md-offset-10">
            <a href="{{ url('/add/platform') }}" class="pull-right"><button type="button" class="btn btn-primary">Add Platform</button></a>
        </div>
    </div>
</div>
@endsection
