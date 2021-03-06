@extends('layout')

@section('title', __('general.tags'))

@section('body')
    <div class="wrapper my-3">
        <div class="row mb-3">
            <div class="row__column row__column--middle">
                <h2>{{ __('general.tags') }}</h2>
            </div>
            <div class="row__column row__column--compact row__column--middle">
                <a href="/tags/create" class="button">Create Tag</a>
            </div>
        </div>
        <div class="box">
            <div class="box__section box__section--header row">
                <div class="row__column">Name</div>
                <div class="row__column row__column--double" style="flex: 2;">Spendings</div>
            </div>
            @foreach ($tags as $tag)
                <div class="box__section row">
                    <div class="row__column">{{ $tag->name }}</div>
                    <div class="row__column">{{ $tag->spendings->count() }}</div>
                    <div class="row__column row__column--middle row row--right">
                        <div class="row__column row__column--compact">
                            <a href="/tags/{{ $tag->id }}/edit">
                                <i class="far fa-pencil"></i>
                            </a>
                        </div>
                        <div class="row__column row__column--compact ml-2">
                            @if ($tag->spendings->count())
                                <i class="far fa-trash-alt"></i>
                            @else
                                <form method="POST" action="/tags/{{ $tag->id }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="button link">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
