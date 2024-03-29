@extends('marketing::layouts.app')

@section('title', __('Articles | Imported'))

@section('heading')
    {{ __('Article ') }}
@endsection

@section('content')
    <!-- Insert here a partials !-->
    @include('feeds::partials.nav')
    <!-- Cards !-->
    <div class="card">
        <div class="card-table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Feed') }}</th>
                    <th>{{ __('Sentiment Positivity') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <a href="{{ route('feeds.article', [$article->id]) }}">{{ $article->title }}</a>
                            </td>
                            <td>
                                <a href="{{ route('feeds.articles', [$article->feed->id]) }}">{{ $article->feed->title }}</a>
                            </td>
                            <td>
                                {{ @$article->sentiment }}
                            </td>
                            <td>
                                {{ $article->created_at }}
                            </td>
                            <td>
                                <a href="#">Edit & Publish</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('marketing::layouts.partials.pagination', ['records' => $articles])

@endsection
