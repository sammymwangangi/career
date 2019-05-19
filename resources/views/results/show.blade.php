@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.view-result')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            @if(Auth::user()->isAdmin())
                            <tr>
                                <th>@lang('quickadmin.results.fields.user')</th>
                                <td>{{ $test->user->name or '' }} ({{ $test->user->email or '' }})</td>
                            </tr>
                            @endif
                            <tr>
                                <th>@lang('quickadmin.results.fields.date')</th>
                                <td>{{ $test->created_at or '' }}</td>
                            </tr>
                            <!-- <tr>
                                <th>@lang('quickadmin.results.fields.result')</th>
                                <td>{{ $test->result }}/10</td>
                            </tr> -->
                        </table>
                    <?php $i = 1 ?>
                    @foreach($results as $result)
                        <table class="table table-bordered table-striped">
                            <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                                <th style="width: 10%">Question #{{ $i }}</th>
                                <th>{{ $result->question->question_text or '' }}</th>
                            </tr>
                            @if ($result->question->code_snippet != '')
                                <tr>
                                    <td>Code snippet</td>
                                    <td><div class="code_snippet">{!! $result->question->code_snippet !!}</div></td>
                                </tr>
                            @endif
                            <tr>
                                <td>Options</td>
                                <td>
                                    <ul>
                                    @foreach($result->question->options as $option)
                                        <li style="@if ($option->correct == 1) font-weight: bold; @endif
                                            @if ($result->option_id == $option->id) text-decoration: underline @endif">{{ $option->option }}
                                            @if ($option->correct == 1) <em>(correct answer)</em> @endif
                                            @if ($result->option_id == $option->id) <em>(your answer)</em> @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Answer Explanation</td>
                                <td>
                                {!! $result->question->answer_explanation  !!}
                                    @if ($result->question->more_info_link != '')
                                        <br>
                                        <br>
                                        Read more:
                                        <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    <?php $i++ ?>
                    @endforeach
                    </div>
                </div>

                <p>&nbsp;</p>
                @if ( ($test->result) == 0)
                <a href="{{ route('tests.index') }}" class="btn btn-default">Take another quiz</a>
                @endif
                {{-- <a href="{{ route('results.index') }}" class="btn btn-default">See all my results</a> --}}
                {{-- <a href="{{ url('careers') }}" class="btn btn-default">See suggested careers</a> --}}
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Recommended Careers
            </div>
            
            <div class="panel-body">
            <!-- Choleric -->
                @if ( ($test->result) >= 7)
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Engineer</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Business Manager</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Lawyer</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Computer Scientist</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Security</h3>
                    </div>
                  </div>
                </div>
                <!-- Phlagmetics -->
                @elseif ( ($test->result) == 6)
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Nursing</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Clinical Officer</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Psychologist</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Teacher</h3>
                    </div>
                  </div>
                </div>
                <!-- Melanchonic -->
                @elseif ( ($test->result) == 5)
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Accountant</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Graphics Designer</h3>
                    </div>
                  </div>
                </div>
                <!-- Sanguine -->
                @else ( ($test->result) <= 4)
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Public Relations Officer</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Marketing Manager</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Actor</h3>
                    </div>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <div class="media-body">
                      <h3 class="mt-0 mb-1">Producer or Director</h3>
                    </div>
                  </div>
                </div>
                @endif
            </div>
        </div>
      </div> 
    </div>
@stop
