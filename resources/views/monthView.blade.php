<!-- Needs variables: events, date -->

@extends('layouts.master')
@section('title')
{{ $date['monthName'] . " " . $date['year'] }}
@stop
@section('content')

        <!-- prev/next month -->
<div class="col-xs-12 col-md-5 btn-group">

    <a class="btn btn-default hidden-print"
       href="{{ Request::getBasePath() }}/calendar/{{ date("Y/m",
                        strtotime("previous month", $date['startStamp'])) }}">
        &lt;&lt;
    </a>

                <span class="btn btn-lg disabled" style="text-align: center !important;">
                    {{ $date['monthName'] . " " . $date['year'] }}
                </span>

    <a class="btn btn-default hidden-print"
       href="{{ Request::getBasePath() }}/calendar/{{ date("Y/m",
                        strtotime("next month", $date['startStamp'])) }}">
        &gt;&gt;
    </a>

</div>

<!-- create button -->
<div class="col-xs-12 col-md-3">
    &nbsp;
</div>

<!-- filter -->
<div class="col-xs-12 col-md-4 pull-right">
    @include('partials.filter')
</div>

<!--Mont Table-->
<div class="row bgWhite">
    <div class="col-md-1">
    </div>
    <div class="col-md-11 calendarWrapper">
        <div class=" hidden-xs" id="ContentRow" >
            <div class=" kalenderWoche">
                KW
            </div>
            <div class="wochenTag">
                Mo
            </div>
            <div class="wochenTag">
                Di
            </div>
            <div class="wochenTag">
                Mi
            </div>
            <div class="wochenTag">
                Do
            </div>
            <div class="wochenTag">
                Fr
            </div>
            <div class="wochenTag">
                Sa
            </div>
            <div class="wochenTag">
                So
            </div>
        </div>

        <!--Print Weeks on left side-->
        <?php $simpleDate = 1; ?>
        @for($i = 1; $i <= $date['daysOfMonth'] + ($date['startDay'] - 1) + (7 - $date['endDay']); $i++)
                <!--define row-->
        @if($i == 1)
            <div class="calendarRow clearfix group height10vh">
        @elseif( $i == 8 || $i == 15 || $i == 22 || $i == 29 || $i == 36)
               <div class="calendarRow clearfix group">
        @endif
                <!--End define row at bottom-->

        <!-- Weeks on left side -->
        @if(date("N", strtotime($i - $date['startDay'] . " day", $date['startStamp'])) == 1)
            @if ( date('W', strtotime($i - $date['startDay'] . ' day', $date['startStamp'])) === date("W") )
                <div class="custom-md-85 Tag WeekMarker" >
                @else
                        <div class=" custom-md-85 Tag">
            @endif
            <a href="{!! Request::getBasePath() !!}/calendar/{!! $date['year'] !!}/KW{{ date('W', strtotime($i - $date['startDay'] . ' day', $date['startStamp'])) }}">
                KW {{ date("W", strtotime($i - $date['startDay'] . " day", $date['startStamp'])) }}
            </a>
    </div>
    @endif


            <!-- Show Days  -->
    @if($i - $date['startDay'] >= 0 AND $i-$date['startDay'] < $date['daysOfMonth'])
            <!-- color current week gray -->
    @if(date("Y-m-d", strtotime($i - $date['startDay']." day", $date['startStamp'])) === date( "Y-m-d" ) )
        <div class="thisMonth today-marker-today custom-md-85">
            @elseif ( date('W', strtotime($i - $date['startDay'] . ' day', $date['startStamp'])) === date("W") )
                <div class="thisMonth today-marker custom-md-85">
                    @else
                        <div class="thisMonth custom-md-85">
                            @endif
                            <div class="cell10">
                                {!! $simpleDate !!}
                                <?php $simpleDate++; ?>
                            </div>
                            <div class="cell90">
                                @include( 'partials.monthCell', $date)
                            </div>
                        </div>
                        @else
                            <div class="otherMonth custom-md-85 empty">
                                <!-- date("j", strtotime($i-$date['startDay']." day", $date['startStamp'])) -->
                            </div>
                            @endif

                                    <!-- if sunday then end this line -->
                            @if(date("N",date("j", strtotime($i-$date['startDay']." day", $date['startStamp']))) == 7)

                            @endif

                            @if($i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35 || $i == 42)
                                </div>
                            @endif

                            @endfor

                </div>
        </div>
@stop
