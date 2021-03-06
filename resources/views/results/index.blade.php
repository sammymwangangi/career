@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.results.title')</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.list')
    </div>

    <div class="panel-body">
        <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                @if(Auth::user()->isAdmin())
                    <th>@lang('quickadmin.results.fields.user')</th>
                @endif
                    <th>@lang('quickadmin.results.fields.date')</th>
                    <!-- <th>Result</th> -->
                    <th>IQ</th>
                    <th>Personality Type</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @if (count($results) > 0)
                    @foreach ($results as $result)
                        <tr>
                        @if(Auth::user()->isAdmin())
                            <td>{{ $result->user->name or '' }} ({{ $result->user->email or '' }})</td>
                        @endif
                            <td>{{ $result->created_at or '' }}</td>
                            <!-- <td>{{ $result->result }}/ {{ (count($questions)) }}</td> -->
                            <td>{{ (($result->result) * 200) / (count($questions)) }}</td>
                            @if ( ($result->result) >= 7)
                            <td>Choleric</td>
                            @elseif ( ($result->result) <= 2)
                            <td>Sanguine</td>
                            @elseif ( ($result->result) == 6)
                            <td>Phlegmatic</td>
                            @else ( ($result->result) == 4)
                            <td>Melancholic</td>
                            @endif
                            <td>
                                <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if(Auth::user()->isAdmin())
        <a class="btn btn-info" href="{{url('/print-results')}}">Print</a>
        @endif
    </div>
</div>
@stop
