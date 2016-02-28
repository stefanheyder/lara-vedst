<div class="panel panel-default">

	@if ($clubEvent->getPlace->plc_title == "bc-Club" AND $clubEvent->evnt_is_private )
		<div class="panel panel-heading calendar-internal-event-bc-club white-text">
	@elseif ($clubEvent->getPlace->plc_title == "bc-Café" AND $clubEvent->evnt_is_private)
		<div class="panel panel-heading calendar-internal-event-bc-cafe white-text">
	@elseif ($clubEvent->getPlace->plc_title == "bc-Club")
		<div class="panel panel-heading calendar-public-event-bc-club white-text">
	@elseif ($clubEvent->getPlace->plc_title == "bc-Café")
		<div class="panel panel-heading calendar-public-event-bc-cafe white-text">
	@else
		<div class="panel panel-heading calendar-task white-text">
	@endif

			<h4 class="panel-title">
				<a href="{{ URL::route('event.show', $clubEvent->id) }}"> 
					<span class="name">{{{ $clubEvent->evnt_title }}}</span>
				</a>
			</h4>
			
			{{ utf8_encode(strftime("%a, %d. %b", strtotime($clubEvent->evnt_date_start))) }} 
			&nbsp;
			DV: {{ date("H:i", strtotime($clubEvent->getSchedule->schdl_time_preparation_start)) }}
			&nbsp;
			<i class="fa fa-clock-o"></i> {{ date("H:i", strtotime($clubEvent->evnt_time_start)) }}
			-
			{{ date("H:i", strtotime($clubEvent->evnt_time_end)) }}
			&nbsp;
			<i class="fa fa-map-marker">&nbsp;</i>{{{ $clubEvent->getPlace->plc_title }}}

		</div>

		<div class="panel-body">

			@if (!is_null($clubEvent->getSchedule))	

				{{-- Show password input if schedule needs one --}}
				@if( $clubEvent->getSchedule->schdl_password != '')
				    <div class="well no-padding hidden-print">
				        {!! Form::password('password', array('required', 
				                                             'class'=>'col-md-12 col-xs-12',
				                                             'placeholder'=>'Passwort hier eingeben')) !!}
				        <br />
				    </div> 
				@endif 

				{{-- Show schedule entries --}}
				@foreach($clubEvent->getSchedule->getEntries as $entry)
				    <div class="row">
				        {!! Form::open(  array( 'route' => ['entry.update', $entry->id],
				                                'id' => $entry->id, 
				                                'method' => 'put', 
				                                'class' => 'scheduleEntry')  ) !!}

				        {{-- SPAMBOT HONEYPOT - this field will be hidden, so if it's filled, then it's a bot or a user tampering with page source --}}
				        <div id="welcome-to-our-mechanical-overlords">
				            <small>If you can read this this - refresh the page to update CSS styles or switch CSS support on.</small>
				            <input type="text" id="{!! 'website' . $entry->id !!}" name="{!! 'website' . $entry->id !!}" value="" />
				        </div>

				        {{-- ENTRY TITLE --}}
				        <div class="col-xs-3 col-md-3">
				            @include("partials.scheduleEntryTitle")
				        </div>

				        {{-- if entry occupied by member and the user is not logged in - show only the info without inputs --}}
				        @if(isset($entry->getPerson->prsn_ldap_id))

				            @include('partials.jobsByScheduleIdSmallProtected')

				        @else

				            {{-- ENTRY STATUS, USERNAME, DROPDOWN USERNAME and LDAP ID --}}
				            <div class="col-xs-5 col-md-5 input-append btn-group">      
				                @include("partials.scheduleEntryName")
				            </div> 

				            {{-- ENTRY CLUB and DROPDOWN CLUB --}}
				            <div class="col-xs-3 col-md-3 no-padding">
				                @include("partials.scheduleEntryClub")                 
				            </div>   

				            {{-- SMALL COMMENT ICON: divs handled inside the partial, col-md/xs-1 for the icon; col-md/xs-12 for the comment input --}}
				            @include("partials.scheduleEntryCommentHidden")

				        @endif    
				            
				        {!! Form::submit( 'save', array('id' => 'btn-submit-changes' . $entry->id, 'hidden') ) !!}
				        {!! Form::close() !!}

				    </div>

				    <br class="visible-xs">

				@endforeach

			@endif
			
		</div>

</div>
	  

