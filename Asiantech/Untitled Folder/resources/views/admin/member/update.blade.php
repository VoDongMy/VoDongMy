@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Members :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/member">{{ trans('cpanel.manage_member')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/member/update'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs">{{ trans('cpanel.add_new')}}</span>
            <ul class="nav panel-tabs-border panel-tabs">

            @if (count($languages) > 0)
                <?php $i = 1; ?>
                @foreach ($languages->all() as $language)
                <li {!! $i == 1 ? 'class="active"' : '' !!}>
                    <a href="#tab_{!! $i !!}" data-toggle="tab">{!! $language->language_name !!}</a>
                </li>
                <?php $i++; ?>
                @endforeach
            @else
                <li class="active">
                    <a href="#tab1" data-toggle="tab">{{ trans('cpanel.language_default')}}</a>
                </li>
            @endif  
            
            </ul>
        </div>
        <?php
            // Get avatar
            $avatar = $info_member->avatar;
            if($avatar){
                $url_avatar = 'src='.config('custom.path_view_member').$avatar;
            }else{
                $url_avatar = '';
            }
        ?>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                <div class="section row mbn">
                    <div class="col-md-3">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <img data-src="holder.js/100%x200" alt="holder" {{ $url_avatar }}>
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">{{ trans('cpanel.change')}}</span>
                                <span class="fileupload-exists">{{ trans('cpanel.change')}}</span>
                                <input type="file" name="avatar">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-9 pr15">
                        <div class="section row mb15">
                            <div class="col-md-12">
                                <label class="form-control-static text-muted" for="service_name">Fullname</label>
                            </div>
                            <div class="col-xs-6">
                                <label for="name1" class="field prepend-icon">
                                    {!! Form::text("fullname", $info_member->fullname, array('class' => 'event-name gui-input br-light light', 'placeholder' => 'Full Name')) !!}
                                    <label for="name1" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="section row mb15">
                            <div class="col-md-12">
                                <label class="form-control-static text-muted" for="service_name">Team</label>
                            </div>
                            <div class="col-xs-6">
                                <label for="name1" class="select">
                                    <select name="team_id">
                                        {!! $teams !!}
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end section row -->
                @if (count($languages) > 0)
                    <?php $i = 1; ?>
                    @foreach ($languages->all() as $language)
                    <div id="tab_{!! $i !!}" class="tab-pane {!! $i == 1 ? 'active' : '' !!}">
                        <div class="col-12 pt20">
                            <?php
                            $list_question = $member_details->where('member_id', '=', $member_id)
                                                            ->where('language_code', '=', $language->code)
                                                            ->get();
                            $count_question = count($list_question);
                            $left_question = $items_for_question - $count_question;
                            $y=1;
                            ?>
                            @if($list_question)
                            @foreach($list_question as $info_question)
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="question{{ $y }}" class="field prepend-icon">
                                        {!! Form::text("question[".$language->code."][$info_question->id]", $info_question->question, array('class' => 'gui-input br-light light', 'placeholder' => "Questions $y")) !!}
                                        <label for="question" class="field-icon">
                                            <i class="fa fa-question"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-12">
                                    <label for="name1" class="field prepend-icon">
                                        {!! Form::textarea("answer[".$language->code."][$info_question->id]", $info_question->answer, array('class' => 'gui-textarea br-light', 'placeholder' => "Answer $y")) !!}
                                        <label for="name1" class="field-icon">
                                            <i class="fa fa-quote-left"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            <?php
                            $y++;
                            ?>
                            @endforeach
                            @endif
                            @if($left_question)
                            @for ($y; $y <= $items_for_question; $y++)
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="name1" class="field prepend-icon">
                                        {!! Form::text("question[".$language->code."][]", '', array('class' => 'gui-input br-light light', 'placeholder' => "Questions $y")) !!}
                                        <label for="question" class="field-icon">
                                            <i class="fa fa-question"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-12">
                                    <label for="name1" class="field prepend-icon">
                                        {!! Form::textarea("answer[".$language->code."][]", null, array('class' => 'gui-textarea br-light', 'placeholder' => "Answer $y")) !!}
                                        <label for="name1" class="field-icon">
                                            <i class="fa fa-quote-left"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            @endfor
                            @endif
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                @else
                    <div id="tab_{!! $i !!}" class="tab-pane {!! $i == 1 ? 'active' : '' !!}">
                        <div class="col-12 pt20">
                            @for ($y = 1; $y <= 5; $y++)
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="name1" class="field prepend-icon">
                                        {!! Form::text("question[$y][]", '', array('class' => 'event-name gui-input br-light light', 'placeholder' => "Questions $y")) !!}
                                        <label for="question" class="field-icon">
                                            <i class="fa fa-question"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-12">
                                    <label for="name1" class="field prepend-icon">
                                        {!! Form::textarea("answer[$y][]", null, array('class' => 'gui-textarea br-light', 'placeholder' => "Answer $y")) !!}
                                        <label for="name1" class="field-icon">
                                            <i class="fa fa-quote-left"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> {{ trans('cpanel.update')}} </button>
            <button class="button btn-danger btn btn-sm" type="reset"> {{ trans('cpanel.cancel')}} </button>
            {!! Form::hidden('member_id', $member_id) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection
